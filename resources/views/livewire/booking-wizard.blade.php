<div>
    @if($step === 1)
        <div class="space-y-6">
            <h4 class="text-xl font-bold text-geartrail-dark">Personal Information</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Full Name *</label>
                    <input wire:model="name" type="text" class="w-full border-gray-200 rounded-xl focus:ring-geartrail-red focus:border-geartrail-red">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Company Name (Optional)</label>
                    <input wire:model="company" type="text" class="w-full border-gray-200 rounded-xl focus:ring-geartrail-red focus:border-geartrail-red">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Phone Number *</label>
                    <input wire:model="phone" type="text" class="w-full border-gray-200 rounded-xl focus:ring-geartrail-red focus:border-geartrail-red">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Email Address *</label>
                    <input wire:model="email" type="email" class="w-full border-gray-200 rounded-xl focus:ring-geartrail-red focus:border-geartrail-red">
                </div>
            </div>
            <button wire:click="nextStep" class="w-full bg-geartrail-dark text-white py-4 rounded-xl font-bold hover:bg-geartrail-red transition flex items-center justify-center gap-2">
                Continue to Service Details
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
            </button>
        </div>
    @elseif($step === 2)
        <div class="space-y-6">
            <h4 class="text-xl font-bold text-geartrail-dark">Service Details</h4>
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-4">What service do you require? *</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @foreach($services as $service)
                            <label class="relative flex items-center p-4 border rounded-xl cursor-pointer hover:bg-gray-50 transition {{ $selectedService == $service->id ? 'border-geartrail-red bg-red-50/30' : 'border-gray-100' }}">
                                <input type="radio" wire:model="selectedService" value="{{ $service->id }}" class="sr-only">
                                <span class="text-sm font-bold {{ $selectedService == $service->id ? 'text-geartrail-red' : 'text-gray-700' }}">{{ $service->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Problem Description *</label>
                    <textarea wire:model="description" rows="4" placeholder="Briefly describe the machinery issue..." class="w-full border-gray-200 rounded-xl focus:ring-geartrail-red focus:border-geartrail-red"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Preferred Date (Optional)</label>
                    <input wire:model="preferredDate" type="date" class="w-full border-gray-200 rounded-xl focus:ring-geartrail-red focus:border-geartrail-red">
                </div>
            </div>
            <div class="flex gap-4">
                <button wire:click="$set('step', 1)" class="flex-1 border border-gray-200 text-gray-600 py-4 rounded-xl font-bold hover:bg-gray-50 transition">Back</button>
                <button wire:click="submit" class="flex-[2] bg-geartrail-red text-white py-4 rounded-xl font-bold hover:bg-geartrail-dark transition shadow-lg">Submit Request</button>
            </div>
        </div>
    @elseif($step === 3)
        <div class="text-center py-12 space-y-6">
            <div class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto">
                <svg class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg>
            </div>
            <h4 class="text-3xl font-extrabold text-geartrail-dark">Request Received!</h4>
            <p class="text-gray-600 max-w-sm mx-auto">Thank you, {{ $name }}. Our workshop manager will contact you within the next 2 hours to confirm your booking.</p>
            <button onclick="window.location.reload()" class="inline-block text-geartrail-red font-bold hover:underline">Submit another request</button>
        </div>
    @endif
</div>
