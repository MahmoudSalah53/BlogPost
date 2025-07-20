<?php

namespace App\Filament\Pages;

use Filament\Pages\Auth\Login as BaseLogin;
use Illuminate\Support\Facades\Auth;

class Login extends BaseLogin
{
    protected function getRedirectUrl(): string
    {
        $user = Auth::user();

        return match ($user->role) {
            'admin' => '/admin',
            'author' => '/author',
            'reader' => '/profile',
            default => '/',
        };
    }
}

