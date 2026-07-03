<div>
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <div class="flex-1 w-full sm:max-w-md relative">
            <input
                wire:model.live.debounce.300ms="search"
                type="text"
                placeholder="Search equipment by name, model or serial..."
                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:ring-geartrail-red focus:border-geartrail-red sm:text-sm"
            >
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>

        <x-ui.button>
            <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" /></svg>
            Register Equipment
        </x-ui.button>
    </div>

    <x-ui.card class="p-0">
        <x-ui.table>
            <x-slot name="header">
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Equipment Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Model / Serial</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Owner</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hours</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </x-slot>

            @forelse($equipments as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-bold text-gray-900">{{ $item->equipment_name }}</div>
                        <div class="text-[10px] text-gray-400 uppercase tracking-wider">{{ $item->category }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">{{ $item->model }}</div>
                        <div class="text-xs text-gray-500">{{ $item->serial_number ?: 'No Serial' }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $item->customer->contact_name }}</div>
                        <div class="text-xs text-gray-500">{{ $item->customer->company_name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ number_format($item->operating_hours) }} hrs
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <x-ui.button variant="secondary" size="xs">View History</x-ui.button>
                        <x-ui.button variant="secondary" size="xs">Edit</x-ui.button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                        No equipment registered.
                    </td>
                </tr>
            @endforelse
        </x-ui.table>

        @if($equipments->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $equipments->links() }}
            </div>
        @endif
    </x-ui.card>
</div>
