<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Gate::define('patient', function (User $user) {
            return $user->role === 'patient';
        });
        Gate::define('doctor', function (User $user) {
            return $user->role === 'doctor';
        });
        Gate::define('admin', function (User $user) {
            return $user->role === 'admin';
        });

        Carbon::setLocale(app()->getLocale());
    }
}
