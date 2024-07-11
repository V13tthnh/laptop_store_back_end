<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Auth\ForgotPasswordRequest;
use App\Http\Requests\API\Auth\LoginRequest;
use App\Http\Requests\API\Auth\RegisterRequest;
use App\Http\Requests\API\Auth\ResetPasswordRequest;
use App\Mail\ForgotPasswordMail;
use App\Models\User;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use Redirect;
use Str;
use DB;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        try {
            if (!Auth::attempt($request->only(['email', 'password']))) {
                return response()->json([
                    'status' => false,
                    'message' => 'Email & mật khẩu không trùng khớp',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();
            if ($user->status == 0) {
                return response()->json([
                    'status' => false,
                    'message' => 'Email người dùng chưa được kích hoạt, vui lòng kiểm tra kỹ email để kích hoạt tài khoản.',
                ], 401);
            }
            $token = $user->createToken('token')->plainTextToken;

            return response()->json([
                'status' => true,
                'message' => 'Đăng nhập thành công',
                'token' => $token
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function register(RegisterRequest $request)
    {
        try {
            $user = User::create([
                'full_name' => $request->full_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'status' => 1,
            ]);
            //event(new Registered($user));
            $user->assignRole('customer');

            return response()->json([
                'status' => true,
                'message' => 'Đăng ký thành công',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function profile()
    {
        $userProfile = auth()->user();

        return response()->json([
            'status' => true,
            'message' => 'Thông tin tài khoản',
            'data' => $userProfile,
            'id' => auth()->user()->id
        ], 200);
    }

    public function forgotPassword(ForgotPasswordRequest $request)
    {
        try {
            $token = Str::random(60);
            $email = User::where('email', $request->email)->first();
            if (empty($email)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Email của bạn không tồn tại trong hệ thống.',
                ]);
            }
            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => now(),
            ]);

            $updateRememberToken = User::where('email', $request->email)->first();
            $updateRememberToken->remember_token = $token;
            $updateRememberToken->save();

            Mail::to($request->email)->send(new ForgotPasswordMail($token));

            return response()->json([
                'status' => true,
                'message' => 'Mail xác thực đã được gửi, vui lòng kiểm tra email của bạn.',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        try {

            $passwordReset = DB::table('password_reset_tokens')
                ->where('token', $request->token)
                ->first();

            if (!$passwordReset) {
                return response()->json([
                    'status' => true,
                    'message' => 'Mã reset không tồn tại.',
                ], 200);
            }

            $user = User::where('email', $passwordReset->email)->first();

            if (!$user) {
                return response()->json([
                    'status' => true,
                    'message' => 'Email không tồn tại trong hệ thống.',
                ], 200);
            }

            $user->password = Hash::make($request->new_password);
            $user->save();

            DB::table('password_reset_tokens')->where('email', $user->email)->delete();

            return response()->json([
                'status' => true,
                'message' => "Mật khẩu mới đã được cập nhật."
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function redirect($provider)
    {
        try {
            return response()->json([
                'url' => Socialite::driver($provider)
                    ->stateless()
                    ->redirect()
                    ->getTargetUrl(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'redirect_url' => "http://localhost:3000/login"
            ], 500);
        }

    }

    public function callback($provider)
    {
        try {
            $userInfo = Socialite::driver($provider)->stateless()->user();
            $user = $this->createUser($userInfo, $provider);
            $token = $user->createToken('token')->plainTextToken;

            return response()->json([
                'status' => true,
                'user' => $user,
                'token' => $token,
                'token_type' => 'Bearer',
            ], 200);
        } catch (\Exception $e) {
            if ($e instanceof \Laravel\Socialite\Two\InvalidStateException) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid state or code has already been used.',
                    'redirect_url' => "http://localhost:3000/login"
                ], 400);
            }
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'redirect_url' => "http://localhost:3000/login"
            ], 500);
        }
    }

    public function createUser($userInfo, $provider)
    {
        if (!$userInfo) {
            throw new \Exception('Không có thông tin người dùng.');
        }

        $user = User::where('provider_id', $userInfo->id)->first();
        if (!$user) {
            $user = User::query()->firstOrCreate([
                'email' => $userInfo->getEmail(),
            ], [
                'full_name' => $userInfo->getName(),
                'password' => Hash::make('Abc@123456'),
                'email_verified_at' => now(),
                'provider_id' => $userInfo->getId(),
                'provider' => $provider,
                'status' => 1
            ]);
            Auth::login($user);
            $user->assignRole('customer');
        }
        if (!$user) {
            $user = User::query()->firstOrCreate([
                'email' => $userInfo->getEmail() ?? '', // Kiểm tra và xử lý null ở đây
            ], [
                'name' => $userInfo->getName() ?? '', // Kiểm tra và xử lý null ở đây
                'email_verified_at' => now(),
                'provider_id' => $userInfo->getId() ?? '', // Kiểm tra và xử lý null ở đây
                'provider' => $provider,
            ]);
            Auth::login($user);
            $user->assignRole('customer');
        }
        return $user;
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Đã đăng xuất',
        ], 200);
    }
}
