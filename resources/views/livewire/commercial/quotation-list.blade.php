<div>
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <div class="flex-1 w-full sm:max-w-md relative">
            <input
                wire:model.live.debounce.300ms="search"
                type="text"
                placeholder="Search quotations..."
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
                <option value="draft">Draft</option>
                <option value="sent">Sent</option>
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
            </select>
        </div>
    </div>

    <x-ui.card class="p-0">
        <x-ui.table>
            <x-slot name="header">
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quote #</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </x-slot>

            @forelse($quotations as $quote)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="text-sm font-bold text-gray-900 uppercase">{{ $quote->quotation_number }}</span>
                        <div class="text-[10px] text-gray-400">Job: {{ $quote->job->job_number }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $quote->customer->contact_name }}</div>
                        <div class="text-xs text-gray-500">{{ $quote->customer->company_name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $quote->created_at->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                        ${{ number_format($quote->total, 2) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @php
                            $qStatusColors = [
                                'draft' => 'bg-gray-100 text-gray-800',
                                'sent' => 'bg-blue-100 text-blue-800',
                                'approved' => 'bg-green-100 text-green-800',
                                'rejected' => 'bg-red-100 text-red-800',
                            ];
                        @endphp
                        <span class="px-2 py-1 text-[10px] font-bold uppercase rounded-full {{ $qStatusColors[$quote->status] ?? 'bg-gray-100' }}">
                            {{ $quote->status }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <x-ui.button variant="secondary" size="xs">View</x-ui.button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                        No quotations found.
                    </td>
                </tr>
            @endforelse
        </x-ui.table>

        @if($quotations->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $quotations->links() }}
            </div>
        @endif
    </x-ui.card>
</div>
