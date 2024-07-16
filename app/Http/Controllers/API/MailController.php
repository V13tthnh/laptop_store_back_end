<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Auth\ForgotPasswordRequest;
use App\Mail\ForgotPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Str;

class MailController extends Controller
{
    public function sendResetPasswordMail(ForgotPasswordRequest $request)
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
            // DB::table('password_reset_tokens')->create(
            //     ['email' => $request->email],
            //     ['token' => $token]
            // );
            Mail::to('thanhlklk909@gmail.com')->send(new ForgotPasswordMail($token));

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

    public function verifyEmail( $email)
    {
        $user = User::where('email', $email)->whereNull('email_verified_at')->firstOrFail();

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }
        $user->email_verified_at = date('Y-m-d');
        $user->status = 1;
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Xác thực Email thành công.'
        ]);
    }

    public function resendEmail(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return response()->json(['message' => 'Email đã được xác thực.'], 300);
        }

        $request->user()->sendEmailVerificationNotification();

        return response()->json([
            'status' => true,
            'message' => 'Liên kết xác thực đã được gửi.'
        ]);
    }
}
