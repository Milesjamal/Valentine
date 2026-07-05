<div {{ $attributes->merge(['class' => 'flex items-center gap-2']) }}>
    @if($company->logo_path)
        <img src="{{ Storage::url($company->logo_path) }}" alt="{{ $company->company_name }}" class="h-8 w-auto">
    @else
        <div class="bg-red-600 text-white font-black px-2 py-1 rounded italic text-xl">GT</div>
    @endif
    <span class="font-bold text-gray-900 tracking-tight">{{ $company->company_name }}</span>
</div>
