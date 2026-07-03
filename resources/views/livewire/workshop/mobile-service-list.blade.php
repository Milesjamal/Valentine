<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div class="inline-flex rounded-md shadow-sm">
            <button wire:click="$set('status', 'pending')" class="px-4 py-2 text-sm font-medium border rounded-l-lg {{ $status === 'pending' ? 'bg-geartrail-red text-white border-geartrail-red' : 'bg-white text-gray-700 border-gray-200 hover:bg-gray-50' }}">
                Pending
            </button>
            <button wire:click="$set('status', 'assigned')" class="px-4 py-2 text-sm font-medium border-t border-b {{ $status === 'assigned' ? 'bg-geartrail-red text-white border-geartrail-red' : 'bg-white text-gray-700 border-gray-200 hover:bg-gray-50' }}">
                Assigned
            </button>
            <button wire:click="$set('status', 'in_progress')" class="px-4 py-2 text-sm font-medium border-t border-b {{ $status === 'in_progress' ? 'bg-geartrail-red text-white border-geartrail-red' : 'bg-white text-gray-700 border-gray-200 hover:bg-gray-50' }}">
                In Progress
            </button>
            <button wire:click="$set('status', 'completed')" class="px-4 py-2 text-sm font-medium border rounded-r-lg {{ $status === 'completed' ? 'bg-geartrail-red text-white border-geartrail-red' : 'bg-white text-gray-700 border-gray-200 hover:bg-gray-50' }}">
                Completed
            </button>
        </div>
    </div>

    <x-ui.card class="p-0">
        <x-ui.table>
            <x-slot name="header">
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer / Location</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Problem</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Assigned</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </x-slot>

            @forelse($requests as $req)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $req->preferred_date->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $req->customer->contact_name }}</div>
                        <div class="text-xs text-gray-500">{{ $req->serviceLocation ? $req->serviceLocation->label : 'Main Address' }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-xs text-gray-600 line-clamp-1">
                            {{ $req->problem_description }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            @if($req->assignedMechanic)
                                <span class="text-xs font-medium text-gray-900">{{ $req->assignedMechanic->user->name }}</span>
                            @else
                                <span class="text-xs text-gray-400 italic">Unassigned</span>
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <x-ui.button variant="secondary" size="xs">Manage Visit</x-ui.button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                        No mobile service requests found.
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
