<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        // Kiểm tra vai trò người dùng
        if (Auth::user()->hasRole('customer')) {
            // Logout người dùng
            Auth::guard('web')->logout();

            // Vô hiệu hóa session
            $request->session()->invalidate();

            // Tạo lại token session
            $request->session()->regenerateToken();

            // Chuyển hướng về trang đăng nhập kèm thông báo lỗi
            return redirect('/login')->withErrors([
                'role' => 'Bạn không có quyền truy cập vào hệ thống.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard.index', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
