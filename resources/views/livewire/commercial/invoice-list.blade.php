<div>
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <div class="flex-1 w-full sm:max-w-md relative">
            <input
                wire:model.live.debounce.300ms="search"
                type="text"
                placeholder="Search invoices or customers..."
                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:ring-geartrail-red focus:border-geartrail-red sm:text-sm"
            >
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>

        <div class="flex items-center gap-4 w-full sm:w-auto">
            <select wire:model.live="status" class="block w-full sm:w-48 text-sm border-gray-300 focus:ring-geartrail-red focus:border-geartrail-red rounded-md">
                <option value="">All Statuses</option>
                <option value="unpaid">Unpaid</option>
                <option value="partially_paid">Partially Paid</option>
                <option value="paid">Paid</option>
                <option value="overdue">Overdue</option>
                <option value="void">Void</option>
            </select>
        </div>
    </div>

    <x-ui.card class="p-0">
        <x-ui.table>
            <x-slot name="header">
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Invoice #</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Due Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Amount</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </x-slot>

            @forelse($invoices as $invoice)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="text-sm font-bold text-geartrail-dark uppercase">{{ $invoice->invoice_number }}</span>
                        @if($invoice->job)
                            <div class="text-[10px] text-gray-400">Job: {{ $invoice->job->job_number }}</div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $invoice->customer->contact_name }}</div>
                        <div class="text-xs text-gray-500">{{ $invoice->customer->company_name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $invoice->due_date->format('d M Y') }}
                        @if($invoice->status === 'unpaid' && $invoice->due_date->isPast())
                            <span class="ml-1 text-red-600 font-bold uppercase text-[10px]">Overdue</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-bold text-gray-900">${{ number_format($invoice->total, 2) }}</div>
                        <div class="text-[10px] text-gray-500">Paid: ${{ number_format($invoice->amount_paid, 2) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <x-ui.status-badge :status="$invoice->status" />
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" class="text-geartrail-red hover:text-red-900 mr-3">View PDF</a>
                        <x-ui.button variant="secondary" size="xs">Record Payment</x-ui.button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                        No invoices found.
                    </td>
                </tr>
            @endforelse
        </x-ui.table>

        @if($invoices->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $invoices->links() }}
            </div>
        @endif
    </x-ui.card>
</div>
