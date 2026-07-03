<div class="space-y-8">
    <div class="space-y-4">
        <label class="block text-sm font-bold text-gray-400 uppercase tracking-widest">Rental Duration (Days)</label>
        <div class="flex items-center gap-6">
            <input type="range" wire:model.live="days" min="1" max="30" class="flex-1 accent-geartrail-red h-2 bg-white/10 rounded-lg appearance-none cursor-pointer">
            <span class="text-4xl font-black min-w-[3ch]">{{ $days }}</span>
        </div>
    </div>

    <div class="p-6 bg-white/5 rounded-2xl border border-white/10 space-y-4">
        <div class="flex justify-between text-sm">
            <span class="text-gray-400">Standard Daily Rate</span>
            <span class="font-bold">${{ number_format($baseRate, 2) }}</span>
        </div>
        <div class="flex justify-between text-sm">
            <span class="text-gray-400">Service Fee</span>
            <span class="font-bold">INCLUDED</span>
        </div>
        <div class="pt-4 border-t border-white/10 flex justify-between items-end">
            <span class="text-gray-400 font-bold uppercase tracking-widest">Estimated Total</span>
            <span class="text-4xl font-black text-geartrail-red">${{ number_format($total, 2) }}</span>
        </div>
    </div>

    <button class="w-full bg-white text-geartrail-dark py-4 rounded-xl font-bold hover:bg-geartrail-red hover:text-white transition shadow-xl uppercase tracking-widest text-sm">
        Request Official Quote
    </button>
    <p class="text-center text-xs text-gray-500 italic">Final rates may vary based on destination and load type.</p>
</div>
