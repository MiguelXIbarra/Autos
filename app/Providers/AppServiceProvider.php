<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        View::composer('*', function ($view) {
            if ($view->getName() === 'auth.reset-password') {
                $view->setPath(resource_path('views/auth/passwords/reset.blade.php'));
            }
            if ($view->getName() === 'auth.forgot-password') {
                $view->setPath(resource_path('views/auth/passwords/email.blade.php'));
            }
        });

        ResetPassword::toMailUsing(function ($notifiable, $token) {
            $url = url(route('password.reset', [
                'token' => $token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));

            return (new MailMessage)
                ->subject('Solicitud de Restablecimiento de Contraseña')
                ->view('auth.passwords.reset', ['url' => $url]);
        });
    }
}