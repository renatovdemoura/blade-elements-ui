@props([
    'size' => 'md',
    'title' => null,
    'description' => null,
    'disabled' => false,
    'id' => 'switch'
    ])

<div x-data="{ on: $wire.get('{{ $attributes->get('model') }}') }" x-on:force-switch-update-{{ $id }}.window="on = $wire.get('{{ $attributes->get('model') }}')" x-init="$watch('on', value => $wire.set('{{ $attributes->get('model') }}', value))">
    <div class="flex justify-between space-x-3">
        @if($title)
        <div class="flex flex-col flex-grow" id="availability-label">
            <h2 class="flex items-center space-x-3">
                <span class="font-medium text-gray-900">{{ $title }}</span>
                <div class="flex-grow h-px bg-gray-200"></div>
            </h2>
            @if($description)
            <p class="max-w-lg mt-1 text-sm text-gray-500">{{ $description }}</p>
            @endif
        </div>
        @endif
        <button wire:ignore @unless($disabled) x-on:click="on = !on" @endunless type="button" class="relative inline-flex @if($title) {{ $size === 'md' ? '' : '-mt-1.5' }} @endif flex-shrink-0 @if($size === 'md') h-6 w-11 @else h-8 w-16 @endif transition-colors duration-200 ease-in-out bg-blue-600 border-2 border-transparent rounded-full cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" role="switch" aria-checked="true" x-ref="switch" x-state:on="Enabled" x-state:off="Not Enabled" x-bind:class="{ 'bg-blue-600': on, 'bg-gray-200': !(on) }" aria-labelledby="availability-label" :aria-checked="on.toString()">
            <span aria-hidden="true"
            x-bind:class="{ @if($size === 'md') 'translate-x-5': on, @else 'translate-x-8': on, @endif 'translate-x-0': !on }"
            class="inline-block @if($size === 'md') w-5 h-5 translate-x-5 @else w-7 h-7 translate-x-8 @endif transition duration-200 ease-in-out transform bg-white rounded-full shadow pointer-events-none ring-0" x-state:on="Enabled" x-state:off="Not Enabled" x-bind:class="{ 'translate-x-5': on, 'translate-x-0': !(on) }"></span>
        </button>
    </div>
    {{ $slot ?? '' }}
</div>
