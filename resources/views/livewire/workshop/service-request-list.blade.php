<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div class="inline-flex rounded-md shadow-sm">
            <button wire:click="$set('status', 'new')" class="px-4 py-2 text-sm font-medium border rounded-l-lg {{ $status === 'new' ? 'bg-geartrail-red text-white border-geartrail-red' : 'bg-white text-gray-700 border-gray-200 hover:bg-gray-50' }}">
                New Requests
            </button>
            <button wire:click="$set('status', 'converted')" class="px-4 py-2 text-sm font-medium border-t border-b {{ $status === 'converted' ? 'bg-geartrail-red text-white border-geartrail-red' : 'bg-white text-gray-700 border-gray-200 hover:bg-gray-50' }}">
                Converted
            </button>
            <button wire:click="$set('status', 'declined')" class="px-4 py-2 text-sm font-medium border rounded-r-lg {{ $status === 'declined' ? 'bg-geartrail-red text-white border-geartrail-red' : 'bg-white text-gray-700 border-gray-200 hover:bg-gray-50' }}">
                Declined
            </button>
        </div>
    </div>

    <x-ui.card class="p-0">
        <x-ui.table>
            <x-slot name="header">
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Equipment / Service</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </x-slot>

            @forelse($requests as $request)
                <tr class="hover:bg-gray-50 transition-colors duration-150">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $request->created_at->format('d M Y, H:i') }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $request->customer->contact_name }}</div>
                        <div class="text-xs text-gray-500">{{ $request->customer->company_name ?: 'Individual' }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900 font-medium">
                            {{ $request->equipment ? $request->equipment->equipment_name : 'New Equipment Registration' }}
                        </div>
                        <div class="text-xs text-gray-500 italic">
                            Requested: {{ $request->service ? $request->service->name : 'General Inspection' }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <x-ui.status-badge :status="$request->status" />
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex justify-end gap-2">
                            @if($request->status === 'new')
                                <x-ui.button wire:click="convertToJob({{ $request->id }})" size="xs" variant="success">
                                    Approve & Create Job
                                </x-ui.button>
                                <x-ui.button wire:click="declineRequest({{ $request->id }})" size="xs" variant="danger">
                                    Decline
                                </x-ui.button>
                            @elseif($request->status === 'converted')
                                <a href="{{ route('jobs.show', $request->converted_job_id) }}" class="text-geartrail-red hover:text-red-900">
                                    View Job
                                </a>
                            @endif
                        </div>
                    </td>
                </tr>
                <tr class="bg-gray-50/50">
                    <td colspan="5" class="px-6 py-2">
                        <div class="text-xs text-gray-600">
                            <span class="font-bold uppercase mr-1">Description:</span>
                            {{ Str::limit($request->description, 150) }}
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                        No service requests found in this category.
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
