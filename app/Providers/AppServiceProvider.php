<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootStrapFive();

        Gate::define('islogin',function(User $user){
            return Auth::check();
        });

        Gate::define('isAdmin',function(User $user){
            return $user->role === 'admin';
        });

        Gate::define('isNotes',function(User $user, $userid){
            return $user->id === $userid;
        });
    }
}
