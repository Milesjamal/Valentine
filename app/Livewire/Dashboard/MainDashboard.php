<?php

namespace App\Livewire\Dashboard;

use App\Models\WorkshopJob;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use Livewire\Component;

class MainDashboard extends Component
{
    public function render()
    {
        $stats = [
            'active_jobs' => WorkshopJob::whereNotIn('status', ['completed', 'closed'])->count(),
            'total_customers' => Customer::count(),
            'pending_invoices' => Invoice::where('status', 'unpaid')->count(),
            'low_stock' => Product::whereHas('inventoryTransactions', function($q) {
                // Simplified low stock check for dashboard
            })->count(), // Real check would compare sum vs reorder_level
        ];

        $recentJobs = WorkshopJob::with(['customer', 'equipment'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('livewire.dashboard.main-dashboard', [
            'stats' => $stats,
            'recentJobs' => $recentJobs,
        ])->layout('layouts.app', ['header' => 'Enterprise Overview']);
    }
}
