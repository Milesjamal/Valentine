<div {{ $attributes->merge(['class' => 'bg-white overflow-hidden shadow sm:rounded-lg border border-gray-200']) }}>
    @if(isset($header))
        <div class="px-4 py-5 border-b border-gray-200 sm:px-6 bg-gray-50">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                {{ $header }}
            </h3>
        </div>
    @endif
    <div class="px-4 py-5 sm:p-6">
        {{ $slot }}
    </div>
    @if(isset($footer))
        <div class="px-4 py-4 sm:px-6 bg-gray-50 border-t border-gray-200">
            {{ $footer }}
        </div>
    @endif
</div>
