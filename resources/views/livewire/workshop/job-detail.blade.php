<div class="space-y-6">
    <!-- Top Header / Quick Actions -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 bg-white p-4 rounded-lg shadow-sm border border-gray-200">
        <div>
            <div class="flex items-center gap-3">
                <h2 class="text-2xl font-bold text-gray-900">{{ $job->job_number }}</h2>
                <x-ui.status-badge :status="$job->status" class="text-sm px-3 py-1" />
            </div>
            <p class="text-sm text-gray-500 mt-1">Created on {{ $job->created_at->format('d M Y, H:i') }}</p>
        </div>

        <div class="flex flex-wrap gap-3">
            @can('manage jobs')
                <div class="flex items-center gap-2">
                    <select wire:model="newStatus" class="text-sm border-gray-300 rounded-md focus:ring-geartrail-red focus:border-geartrail-red">
                        @foreach($availableStatuses as $status)
                            <option value="{{ $status->value }}">{{ $status->label() }}</option>
                        @endforeach
                    </select>
                    <x-ui.button wire:click="updateStatus" variant="secondary" size="sm">Update</x-ui.button>
                </div>
            @endcan

            <x-ui.button variant="primary">Generate Quote</x-ui.button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Column: Details -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Customer & Equipment Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <x-ui.card>
                    <x-slot name="header">Customer Information</x-slot>
                    <div class="space-y-3">
                        <div>
                            <label class="text-xs font-semibold text-gray-500 uppercase">Contact Name</label>
                            <p class="text-sm font-medium text-gray-900">{{ $job->customer->contact_name }}</p>
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-gray-500 uppercase">Company</label>
                            <p class="text-sm font-medium text-gray-900">{{ $job->customer->company_name ?: 'N/A' }}</p>
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-gray-500 uppercase">Phone / Email</label>
                            <p class="text-sm text-gray-900">{{ $job->customer->phone }}</p>
                            <p class="text-sm text-gray-600">{{ $job->customer->email }}</p>
                        </div>
                    </div>
                </x-ui.card>

                <x-ui.card>
                    <x-slot name="header">Equipment Details</x-slot>
                    <div class="space-y-3">
                        <div>
                            <label class="text-xs font-semibold text-gray-500 uppercase">Name / Model</label>
                            <p class="text-sm font-medium text-gray-900">{{ $job->equipment->equipment_name }} ({{ $job->equipment->model }})</p>
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-gray-500 uppercase">Serial Number</label>
                            <p class="text-sm font-medium text-gray-900">{{ $job->equipment->serial_number ?: 'N/A' }}</p>
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-gray-500 uppercase">Manufacturer</label>
                            <p class="text-sm text-gray-900">{{ $job->equipment->manufacturer }}</p>
                        </div>
                    </div>
                </x-ui.card>
            </div>

            <!-- Issue Description -->
            <x-ui.card>
                <x-slot name="header">Issue Description</x-slot>
                <div class="prose prose-sm max-w-none text-gray-700">
                    {{ $job->issue_description }}
                </div>
            </x-ui.card>

            <!-- Notes Section -->
            <div class="space-y-4">
                <h3 class="text-lg font-bold text-gray-900 px-1">Job Notes & Updates</h3>

                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <div class="p-4 bg-gray-50 border-b border-gray-200">
                        <textarea
                            wire:model="newNote"
                            rows="3"
                            placeholder="Add a progress update or internal note..."
                            class="w-full border-gray-300 rounded-md focus:ring-geartrail-red focus:border-geartrail-red text-sm"
                        ></textarea>
                        <div class="flex justify-between items-center mt-3">
                            <label class="flex items-center text-sm text-gray-600">
                                <input type="checkbox" wire:model="isPublicNote" class="rounded text-geartrail-red focus:ring-geartrail-red mr-2">
                                Visible to Customer
                            </label>
                            <x-ui.button wire:click="addNote" size="sm">Add Note</x-ui.button>
                        </div>
                    </div>

                    <div class="divide-y divide-gray-100 max-h-96 overflow-y-auto">
                        @forelse($job->notes as $note)
                            <div class="p-4 {{ $note->is_customer_visible ? 'bg-blue-50/30' : '' }}">
                                <div class="flex justify-between items-start mb-1">
                                    <div class="flex items-center gap-2">
                                        <span class="text-sm font-bold text-gray-900">{{ $note->author->name }}</span>
                                        @if(!$note->is_customer_visible)
                                            <span class="text-[10px] bg-gray-200 text-gray-600 px-1.5 py-0.5 rounded uppercase font-bold tracking-tight">Internal</span>
                                        @else
                                            <span class="text-[10px] bg-blue-100 text-blue-600 px-1.5 py-0.5 rounded uppercase font-bold tracking-tight">Public</span>
                                        @endif
                                    </div>
                                    <span class="text-xs text-gray-400">{{ $note->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-sm text-gray-700 whitespace-pre-line">{{ $note->note }}</p>
                            </div>
                        @empty
                            <div class="p-8 text-center text-gray-400 italic">No notes added yet.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Sidebar Actions -->
        <div class="space-y-6">
            <!-- Assignment Card -->
            <x-ui.card>
                <x-slot name="header">Personnel</x-slot>
                <div class="space-y-4">
                    <div>
                        <label class="text-xs font-semibold text-gray-500 uppercase mb-2 block">Assigned Mechanic</label>
                        @can('manage jobs')
                            <div class="flex gap-2">
                                <select wire:model="assignedMechanicId" class="flex-1 text-sm border-gray-300 rounded-md focus:ring-geartrail-red focus:border-geartrail-red">
                                    <option value="">Unassigned</option>
                                    @foreach($mechanics as $mechanic)
                                        <option value="{{ $mechanic->id }}">{{ $mechanic->user->name }}</option>
                                    @endforeach
                                </select>
                                <x-ui.button wire:click="assignMechanic" variant="secondary" size="sm">Save</x-ui.button>
                            </div>
                        @else
                            <div class="flex items-center gap-2 p-2 bg-gray-50 rounded-md">
                                <div class="h-8 w-8 rounded-full bg-geartrail-red flex items-center justify-center text-white font-bold">
                                    {{ $job->mechanic ? substr($job->mechanic->user->name, 0, 1) : '?' }}
                                </div>
                                <span class="text-sm font-medium">{{ $job->mechanic ? $job->mechanic->user->name : 'Unassigned' }}</span>
                            </div>
                        @endcan
                    </div>
                </div>
            </x-ui.card>

            <!-- Status Timeline -->
            <x-ui.card>
                <x-slot name="header">History</x-slot>
                <div class="flow-root">
                    <ul class="-mb-8">
                        @foreach($job->statusHistory as $history)
                            <li>
                                <div class="relative pb-8">
                                    @if(!$loop->last)
                                        <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                    @endif
                                    <div class="relative flex space-x-3">
                                        <div>
                                            <span class="h-8 w-8 rounded-full bg-gray-100 flex items-center justify-center ring-8 ring-white">
                                                <svg class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4" />
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                            <div>
                                                <p class="text-sm text-gray-500">Status changed to <span class="font-medium text-gray-900">{{ str_replace('_', ' ', $history->to_status) }}</span></p>
                                                <p class="text-xs text-gray-400">by {{ $history->user->name }}</p>
                                            </div>
                                            <div class="whitespace-nowrap text-right text-xs text-gray-400">
                                                <time datetime="{{ $history->changed_at }}">{{ $history->changed_at->format('d M') }}</time>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </x-ui.card>
        </div>
    </div>
</div>
