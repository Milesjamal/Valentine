<div class="space-y-8">
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
        <x-ui.card class="bg-white">
            <div class="flex items-center">
                <div class="p-3 rounded-md bg-red-100 text-geartrail-red">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z" /></svg>
                </div>
                <div class="ml-5">
                    <p class="text-sm font-medium text-gray-500 truncate">Active Jobs</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['active_jobs'] }}</p>
                </div>
            </div>
        </x-ui.card>

        <x-ui.card class="bg-white">
            <div class="flex items-center">
                <div class="p-3 rounded-md bg-blue-100 text-blue-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                </div>
                <div class="ml-5">
                    <p class="text-sm font-medium text-gray-500 truncate">Total Customers</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['total_customers'] }}</p>
                </div>
            </div>
        </x-ui.card>

        <x-ui.card class="bg-white">
            <div class="flex items-center">
                <div class="p-3 rounded-md bg-green-100 text-green-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                </div>
                <div class="ml-5">
                    <p class="text-sm font-medium text-gray-500 truncate">Pending Invoices</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['pending_invoices'] }}</p>
                </div>
            </div>
        </x-ui.card>

        <x-ui.card class="bg-white">
            <div class="flex items-center">
                <div class="p-3 rounded-md bg-yellow-100 text-yellow-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                </div>
                <div class="ml-5">
                    <p class="text-sm font-medium text-gray-500 truncate">Inventory Alerts</p>
                    <p class="text-2xl font-semibold text-gray-900">3</p>
                </div>
            </div>
        </x-ui.card>
    </div>

    <!-- Recent Activity & Tools -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <x-ui.card class="p-0 overflow-hidden">
            <x-slot name="header">Recent Workshop Activity</x-slot>
            <x-ui.table>
                <x-slot name="header">
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Job</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase"></th>
                </x-slot>
                @foreach($recentJobs as $job)
                    <tr>
                        <td class="px-6 py-4">
                            <div class="text-sm font-bold text-geartrail-red">{{ $job->job_number }}</div>
                            <div class="text-xs text-gray-500">{{ $job->equipment->equipment_name }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <x-ui.status-badge :status="$job->status" />
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('jobs.show', $job) }}" class="text-sm text-gray-400 hover:text-geartrail-red">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </x-ui.table>
            <div class="p-4 bg-gray-50 border-t border-gray-200">
                <a href="{{ route('jobs') }}" class="text-sm font-medium text-geartrail-red hover:text-red-700">View all workshop jobs &rarr;</a>
            </div>
        </x-ui.card>

        <div class="space-y-6">
            <x-ui.card>
                <x-slot name="header">Quick Actions</x-slot>
                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ route('service-requests') }}" class="flex flex-col items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                        <svg class="h-8 w-8 text-geartrail-red mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" /></svg>
                        <span class="text-sm font-medium text-gray-900">New Requests</span>
                    </a>
                    <a href="{{ route('inventory') }}" class="flex flex-col items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                        <svg class="h-8 w-8 text-geartrail-red mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span class="text-sm font-medium text-gray-900">Add Stock</span>
                    </a>
                    <a href="{{ route('customers') }}" class="flex flex-col items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                        <svg class="h-8 w-8 text-geartrail-red mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span class="text-sm font-medium text-gray-900">Register Client</span>
                    </a>
                    <a href="{{ route('trucks') }}" class="flex flex-col items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                        <svg class="h-8 w-8 text-geartrail-red mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1" /></svg>
                        <span class="text-sm font-medium text-gray-900">Book Truck</span>
                    </a>
                </div>
            </x-ui.card>
        </div>
    </div>
</div>
