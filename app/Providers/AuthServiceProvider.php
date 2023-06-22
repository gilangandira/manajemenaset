<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        View::composer('*', function ($view) {
            $view->with('currentUserName', auth()->user()->name ?? null);
        });

        View::composer('*', function ($view) {
            $view->with('currentUserAdmin', auth()->user()->is_admin ?? null);
        });

        View::composer('*', function ($view) {
            $currentUser = auth()->user();
            $currentUserImage = $currentUser->profile->image ?? null;
            $view->with('currentUserImage', $currentUserImage);
        });

        
    }
}
