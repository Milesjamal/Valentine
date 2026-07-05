<?php

namespace App\Providers;

use App\Models\Branch;
use App\Models\Customer;
use App\Models\User;
use App\Models\CompanyProfile;
use App\Observers\BranchObserver;
use App\Observers\CustomerObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

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
        // Model Observers
        Branch::observe(BranchObserver::class);
        Customer::observe(CustomerObserver::class);
        User::observe(UserObserver::class);

        // Share Company Profile globally with all views
        if (Schema::hasTable('company_profiles')) {
            View::share('company', CompanyProfile::first() ?? new CompanyProfile([
                'company_name' => 'GearTrail Machinery',
                'motto' => 'Powering Performance, Delivering Reliability.',
                'email' => 'geartrailmachinery@gmail.com',
                'physical_address' => 'Zvishavane, Zimbabwe',
                'phone_numbers' => [],
            ]));
        }
    }
}
