<?php

namespace App\Providers;

use App\Models\Branch;
use App\Models\Customer;
use App\Models\User;
use App\Observers\BranchObserver;
use App\Observers\CustomerObserver;
use App\Observers\UserObserver;
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
        Branch::observe(BranchObserver::class);
        Customer::observe(CustomerObserver::class);
        User::observe(UserObserver::class);
    }
}
