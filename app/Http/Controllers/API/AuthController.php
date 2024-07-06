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
            $cookie = cookie('token', $token, 60 * 24, null, null, false, true);
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
            DB::table('password_reset_tokens')->create(
                ['email' => $request->email],
                ['token' => $token]
            );
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
            $user = auth()->user();
            $user->password = Hash::make($request->new_password);
            $user->save();

            return response()->json([
                'status' => true,
                'message' => 'Mật khẩu mới đã được cập nhật',
            ], 200);
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
            $userInfo = Socialite::driver($provider)->user();
            $user = $this->createUser($userInfo, $provider);
            $token = $user->createToken('token')->plainTextToken;

            return response()->json([
                'status' => true,
                'user' => $user,
                'token' =>  $token,
                'token_type' => 'Bearer',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'redirect_url' => "http://localhost:3000/login"
            ], 500);
        }
    }

    public function createUser($userInfo, $provider)
    {
        $user = User::where('provider_id', $userInfo->id)->first();
        if (!$user) {
            $user = User::updateOrCreate([
                'email' => $userInfo->email,
            ], [
                'name' => $userInfo->name,
                'email_verified_at' => now(),
                'provider_id' => $userInfo->token,
                'provider' => $provider,
            ]);

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
