<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        $this->registerPolicies();

        Gate::define('access-kitchen', function ($user) {
            return $user->name === 'kitchen';
        });

        Gate::define('IsEmployee', function ($user) {
            return $user->role == 'employee';
        });

        Gate::define('IsBuyer', function ($user) {
            return $user->role == 'buyer';
        });
    }
}
