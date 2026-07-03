<div class="space-y-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-gray-900">Manage Transport Fleet</h2>
        @can('manage trucks')
            <x-ui.button>
                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" /></svg>
                Add Truck
            </x-ui.button>
        @endcan
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($trucks as $truck)
            <x-ui.card class="relative">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">{{ $truck->registration_number }}</h3>
                        <p class="text-sm text-gray-500">{{ $truck->model }}</p>
                    </div>
                    @php
                        $statusColors = [
                            'available' => 'bg-green-100 text-green-800',
                            'booked' => 'bg-blue-100 text-blue-800',
                            'maintenance' => 'bg-red-100 text-red-800',
                        ];
                    @endphp
                    <span class="px-2 py-1 text-[10px] font-bold uppercase rounded-full {{ $statusColors[$truck->status] ?? 'bg-gray-100' }}">
                        {{ $truck->status }}
                    </span>
                </div>

                <div class="space-y-2 mb-6">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Capacity:</span>
                        <span class="font-medium text-gray-900">{{ $truck->capacity_tonnes }} Tonnes</span>
                    </div>
                    @if($truck->notes)
                        <div class="text-xs text-gray-600 bg-gray-50 p-2 rounded italic">
                            "{{ Str::limit($truck->notes, 60) }}"
                        </div>
                    @endif
                </div>

                <div class="flex gap-2">
                    <x-ui.button variant="secondary" size="xs" class="flex-1">View Schedule</x-ui.button>
                    <x-ui.button variant="dark" size="xs" class="flex-1">Edit</x-ui.button>
                </div>
            </x-ui.card>
        @endforeach
    </div>
</div>
