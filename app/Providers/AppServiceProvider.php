<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerRole;

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
        //
        // View Composer to inject role into all views
        View::composer('*', function ($view) {
            if (Auth::check()) {
                // Get the authenticated user
                $user = Auth::user();

                // Fetch the role from the customer_role table
                $customerRole = CustomerRole::where('user_id', $user->id)->first();

                // Set the role (default to 'vendor' if no role is found)
                $role = $customerRole ? $customerRole->role : 'vendor';

                // Share the role with all views
                $view->with('role', $role);
            } else {
                // If no user is authenticated, set a default role
                $view->with('role', 'vendor');
            }
        });
    }
}
