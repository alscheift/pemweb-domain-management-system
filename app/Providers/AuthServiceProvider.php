<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('admin', function ($user) {
            return $user->is_admin ?? false;
        });

        Gate::define('pic', function ($user) {
            return $user->is_admin === 0 ?? false;
        });
    
        Gate::define('auth-domains', function ($user, $domain) {
            return $user->id === $domain->user_id;
        });

        Gate::define('auth-solutions', function ($user, $solution) {
            return $user->id === $solution->user_id;
        });
    }
}
