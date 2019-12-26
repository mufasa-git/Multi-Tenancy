<?php

namespace App\Providers;

use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Teams
        Gate::define('team_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('team_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('team_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('team_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('team_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Products
        Gate::define('product_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        Gate::define('product_create', function ($user) {
            return in_array($user->role_id, [2, 3]);
        });
        Gate::define('product_edit', function ($user) {
            return in_array($user->role_id, [2, 3]);
        });
        Gate::define('product_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        Gate::define('product_delete', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });

        // Auth gates for: TeamSelect
        Gate::define('team_select', function ($user) {
            return !$user->isAdmin() && ($user->teams->count() > 1);
        });

        Gate::define('assign_item_to_member', function ($user) {
            return $user->isAdmin() || $user->isTeamAdmin();
        });
    }
}
