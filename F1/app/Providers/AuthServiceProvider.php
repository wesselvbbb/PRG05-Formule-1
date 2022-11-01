<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Admin only gate
        Gate::define('admin-only', function ($user) {
            if ($user->is_admin == 1) {
                return true;
            }
        });

        // Gate to check if user is validated
        Gate::define('is-validated', function ($user) {
            if ($user->is_validated == 1) {
                return true;
            }
        });
    }
}
