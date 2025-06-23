<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

if (!function_exists('has_access')) {
    function has_access(): bool
    {
        $user = Auth::user();
        if (!$user || !$user->role) {
            return false;
        }

        $routeName = Route::currentRouteName();

        // Daftar akses yang tersedia
        $accessFields = [
            'menu_access',
            'news_access',
            'gallery_access',
            'slider_gallery_access',
            'users_access',
            'about_us_access',
            'about_us_gallery_access',
            'contact_access',
            'business_information_access',
        ];

        if ($routeName === 'dashboard') {
            return true;
        }

        // Cek apakah nama route ada di daftar akses
        if (in_array($routeName, $accessFields)) {
            return (bool) $user->role->$routeName;
        }

        return false;
    }
}
