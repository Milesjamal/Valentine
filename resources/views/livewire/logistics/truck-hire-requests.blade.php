<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div class="inline-flex rounded-md shadow-sm">
            <button wire:click="$set('status', 'pending')" class="px-4 py-2 text-sm font-medium border rounded-l-lg {{ $status === 'pending' ? 'bg-geartrail-red text-white border-geartrail-red' : 'bg-white text-gray-700 border-gray-200 hover:bg-gray-50' }}">
                Pending
            </button>
            <button wire:click="$set('status', 'approved')" class="px-4 py-2 text-sm font-medium border-t border-b {{ $status === 'approved' ? 'bg-geartrail-red text-white border-geartrail-red' : 'bg-white text-gray-700 border-gray-200 hover:bg-gray-50' }}">
                Approved
            </button>
            <button wire:click="$set('status', 'declined')" class="px-4 py-2 text-sm font-medium border rounded-r-lg {{ $status === 'declined' ? 'bg-geartrail-red text-white border-geartrail-red' : 'bg-white text-gray-700 border-gray-200 hover:bg-gray-50' }}">
                Declined
            </button>
        </div>
    </div>

    <x-ui.card class="p-0">
        <x-ui.table>
            <x-slot name="header">
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Destination</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Duration</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </x-slot>

            @forelse($requests as $request)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $request->customer->contact_name }}</div>
                        <div class="text-xs text-gray-500">{{ $request->customer->company_name }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">{{ $request->destination }}</div>
                        <div class="text-xs text-gray-500 italic">{{ Str::limit($request->job_description, 50) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $request->requested_start_date->format('d M') }} - {{ $request->requested_end_date->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <x-ui.status-badge :status="$request->status" />
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        @if($request->status === 'pending')
                            <x-ui.button wire:click="approveRequest({{ $request->id }})" size="xs" variant="success">Approve</x-ui.button>
                        @endif
                        <x-ui.button variant="secondary" size="xs">View Detail</x-ui.button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                        No hire requests found.
                    </td>
                </tr>
            @endforelse
        </x-ui.table>

        @if($requests->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $requests->links() }}
            </div>
        @endif
    </x-ui.card>
</div>
