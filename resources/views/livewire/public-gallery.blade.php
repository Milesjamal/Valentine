<div>
    <div class="flex flex-wrap justify-center gap-4 mb-12">
        <button
            wire:click="$set('activeCategory', 'all')"
            class="px-6 py-2 rounded-full text-sm font-bold transition-all {{ $activeCategory === 'all' ? 'bg-geartrail-red text-white shadow-lg' : 'bg-white text-gray-500 hover:bg-gray-100' }}"
        >
            All Projects
        </button>
        @foreach($categories as $cat)
            <button
                wire:click="$set('activeCategory', {{ $cat->id }})"
                class="px-6 py-2 rounded-full text-sm font-bold transition-all {{ $activeCategory == $cat->id ? 'bg-geartrail-red text-white shadow-lg' : 'bg-white text-gray-500 hover:bg-gray-100' }}"
            >
                {{ $cat->name }}
            </button>
        @endforeach
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse($images as $img)
            <div class="group relative aspect-square overflow-hidden rounded-2xl bg-gray-200">
                <img src="https://images.unsplash.com/photo-1517524206127-48bbd363f3d7?auto=format&fit=crop&q=80&w=800" alt="{{ $img->title }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-geartrail-dark/80 via-transparent opacity-0 group-hover:opacity-100 transition-opacity flex flex-col justify-end p-6">
                    <p class="text-white font-bold">{{ $img->title }}</p>
                    <p class="text-xs text-gray-300 uppercase font-bold tracking-widest mt-1">{{ $img->category?->name }}</p>
                </div>
            </div>
        @empty
            @foreach(range(1,4) as $i)
                <div class="aspect-square overflow-hidden rounded-2xl bg-gray-100 border border-gray-200 flex items-center justify-center">
                    <svg class="w-12 h-12 text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                </div>
            @endforeach
        @endforelse
    </div>
</div>
