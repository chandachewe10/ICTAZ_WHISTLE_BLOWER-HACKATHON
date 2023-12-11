<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('is_reporter', function ($user) {
            return $user->is_reporter();
        });

        Gate::define('is_security_agency', function ($user) {
            return $user->is_security_agency();
        });

        Gate::define('is_super_admin', function ($user) {
            return $user->is_super_admin();
        });
        Gate::define('is_other_agency', function ($user) {
            return $user->is_other_agency();
        });

    }
}
