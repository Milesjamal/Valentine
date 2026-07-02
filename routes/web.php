<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\Branches\BranchList;
use App\Livewire\Customers\CustomerList;
use App\Livewire\Auth\TwoFactorSetup;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware([
    'auth',
    'verified',
    'branch.context',
])->group(function () {

    // Mandatory 2FA for Staff
    Route::get('/2fa-setup', TwoFactorSetup::class)->name('2fa.setup');

    Route::middleware(['2fa.mandatory'])->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');

        Route::get('/branches', BranchList::class)->name('branches')->middleware('permission:manage branches');
        Route::get('/customers', CustomerList::class)->name('customers')->middleware('permission:view customers');
    });
});
