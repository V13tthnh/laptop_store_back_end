<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            $url = 'http://localhost:3000/';
            return (new MailMessage)
                ->subject('Xác thực Email')
                ->line('Vui lòng nhấn vào nút phía dưới để xác thực địa chỉ email của bạn.')
                ->action('Verify Email Address', $url);
        });
    }
}
