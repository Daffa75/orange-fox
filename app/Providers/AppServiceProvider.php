<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\PermissionPolicy;
use App\Policies\RolePolicy;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->visible(outsidePanels: true)
                ->flags([
                    'en' => asset('assets/images/us.svg'),
                    'id' => asset('assets/images/id.svg'),
                ])
                ->locales(['en', 'id']); // also accepts a closure
        });

        Gate::policy(\Spatie\Permission\Models\Permission::class, PermissionPolicy::class);
        Gate::policy(\Spatie\Permission\Models\Role::class, RolePolicy::class);

        Gate::before(function (User $user, string $ability) {
            return $user->isSuperAdmin() ? true: null;
        });
    }
}
