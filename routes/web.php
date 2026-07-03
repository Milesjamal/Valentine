<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard\MainDashboard;
use App\Livewire\Branches\BranchList;
use App\Livewire\Customer\CustomerList;
use App\Livewire\Auth\TwoFactorSetup;
use App\Livewire\Equipment\EquipmentList;
use App\Livewire\Workshop\JobList;
use App\Livewire\Workshop\JobDetail;
use App\Livewire\Workshop\ServiceRequestList;
use App\Livewire\Commercial\InventoryList;
use App\Livewire\Commercial\QuotationList;
use App\Livewire\Commercial\InvoiceList;
use App\Livewire\Logistics\TruckList;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth',
    'verified',
    'branch.context',
])->group(function () {

    // Mandatory 2FA for Staff
    Route::get('/2fa-setup', TwoFactorSetup::class)->name('2fa.setup');

    Route::middleware(['2fa.mandatory'])->group(function () {
        Route::get('/dashboard', MainDashboard::class)->name('dashboard');

        // Workshop
        Route::get('/jobs', JobList::class)->name('jobs')->middleware('permission:view jobs');
        Route::get('/jobs/{job}', JobDetail::class)->name('jobs.show')->middleware('permission:view jobs');
        Route::get('/service-requests', ServiceRequestList::class)->name('service-requests')->middleware('permission:view jobs');
        Route::get('/mobile-services', \App\Livewire\Workshop\MobileServiceList::class)->name('mobile-services')->middleware('permission:view jobs');

        // Customers & Equipment
        Route::get('/customers', CustomerList::class)->name('customers')->middleware('permission:view customers');
        Route::get('/equipment', EquipmentList::class)->name('equipment')->middleware('permission:view equipment');

        // Commercial
        Route::get('/inventory', InventoryList::class)->name('inventory')->middleware('permission:view inventory|manage products');
        Route::get('/quotations', QuotationList::class)->name('quotations')->middleware('permission:view invoices'); // Reusing permission for now
        Route::get('/invoices', InvoiceList::class)->name('invoices')->middleware('permission:view invoices');

        // Logistics
        Route::get('/trucks', TruckList::class)->name('trucks')->middleware('permission:view trucks');
        Route::get('/truck-hire-requests', \App\Livewire\Logistics\TruckHireRequests::class)->name('truck-hire-requests')->middleware('permission:view trucks');

        // Settings
        Route::get('/branches', BranchList::class)->name('branches')->middleware('permission:manage branches');
    });
});
