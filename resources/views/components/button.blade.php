@props([
    'color' => 'primary',
    'icon' => null,
    'iconPosition' => 'before',
    'tag' => 'button',
    'type' => 'button',
    'size' => 'md',
    'spinner' => false,
    'spinnerIconSize' => 'w-5 h-5'
])

@php
    $buttonClasses = generateClasses([
        'inline-flex items-center justify-center font-semibold tracking-tight transition rounded focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset',
        'bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700' => $color === 'primary',
        'h-9 px-4' => $size === 'md',
        'text-white shadow focus:ring-white' => $color !== 'secondary',
        'bg-danger-600 hover:bg-danger-500 focus:bg-danger-700 focus:ring-offset-danger-700' => $color === 'danger',
        'text-gray-800 bg-white border hover:bg-gray-50 focus:ring-primary-600 focus:text-primary-600 focus:bg-primary-50 focus:border-primary-600' => $color === 'secondary',
        'bg-success-600 hover:bg-success-500 focus:bg-success-700 focus:ring-offset-success-700' => $color === 'success',
        'bg-warning-600 hover:bg-warning-500 focus:bg-warning-700 focus:ring-offset-warning-700' => $color === 'warning',
        'bg-gray-800 hover:bg-gray-900 focus:bg-gray-700 focus:ring-offset-gray-700' => $color === 'black',
        'h-8 px-3 text-sm' => $size === 'sm',
        'h-11 px-6 text-xl' => $size === 'lg',
    ]);

    $iconClasses = generateClasses([
        'w-6 h-6' => $size === 'md',
        'w-7 h-7' => $size === 'lg',
        'w-5 h-5' => $size === 'sm',
        'mr-1 -ml-2' => ($iconPosition === 'before') && ($size === 'md'),
        'mr-2 -ml-3' => ($iconPosition === 'before') && ($size === 'lg'),
        'mr-1 -ml-1.5' => ($iconPosition === 'before') && ($size === 'sm'),
        'ml-1 -mr-2' => ($iconPosition === 'after') && ($size === 'md'),
        'ml-2 -mr-3' => ($iconPosition === 'after') && ($size === 'lg'),
        'ml-1 -mr-1.5' => ($iconPosition === 'after') && ($size === 'sm'),
    ]);
@endphp

@if ($tag === 'button')
    <button
        type="{{ $type }}"
        {{ $attributes->class([$buttonClasses]) }}
    >
        @if($spinner)
            @if ($icon && $iconPosition === 'before')
                <x-dynamic-component wire:target="{{ $spinner }}" wire:loading.remove :component="$icon" :class="$iconClasses" />
            @endif
        @else
            @if ($icon && $iconPosition === 'before')
                <x-dynamic-component :component="$icon" :class="$iconClasses" />
            @endif
        @endif

        <span @if($spinner) wire:target="{{ $spinner }}" wire:loading.remove @endif>{{ $slot }}</span>

        @if ($spinner)
            <svg class="animate-spin {{ $spinnerIconSize }} shrink-0 ml-2"
                wire:target="{{ $spinner }}"
                wire:loading
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                >
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            @if ($icon && $iconPosition === 'after')
                <x-dynamic-component wire:loading.remove :component="$icon" :class="$iconClasses" />
            @endif
        @else
            @if ($icon && $iconPosition === 'after')
                <x-dynamic-component :component="$icon" :class="$iconClasses" />
            @endif
        @endif
    </button>
@elseif ($tag === 'a')
    <a {{ $attributes->class([$buttonClasses]) }}>
        @if ($icon && $iconPosition === 'before')
            <x-dynamic-component :component="$icon" :class="$iconClasses" />
        @endif

        <span>{{ $slot }}</span>

        @if ($icon && $iconPosition === 'after')
            <x-dynamic-component :component="$icon" :class="$iconClasses" />
        @endif
    </a>
@endif
