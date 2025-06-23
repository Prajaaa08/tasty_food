<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::define('access-news', function ($user) {
            return $user->role?->news_access;
        });

        Gate::define('access-menu', function ($user) {
            return $user->role?->menu_access;
        });

        Gate::define('access-about-us', function ($user) {
            return $user->role?->about_us_access;
        });

        Gate::define('access-about-us-gallery', function ($user) {
            return $user->role?->about_us_gallery_access;
        });

        Gate::define('access-slider-gallery', function ($user) {
            return $user->role?->slider_gallery_access;
        });

        Gate::define('access-users', function ($user) {
            return $user->role?->users_access;
        });

        Gate::define('access-gallery', function ($user) {
            return $user->role?->gallery_access;
        });

        Gate::define('access-contact', function ($user) {
            return $user->role?->contact_access;
        });

        Gate::define('access-business-information', function ($user) {
            return $user->role?->business_information_access;
        });

        Gate::define('access-role', function ($user) {
            return $user->role?->role_access;
        });
    }
}
