@props([
    'active' => false,
])

<li>
    <a
        @if ($active) aria-current="page" @endif
        {{ $attributes->class([
            'px-3 py-2 transition rounded-lg focus:outline-none',
            'hover:text-primary-600 focus:text-primary-600 hover:bg-primary-500/10 focus:bg-primary-500/10 focus:ring-2 focus:ring-primary-500 focus:ring-inset' => ! $active,
            'text-primary-600 bg-primary-50 ring-2 ring-primary-500 ring-inset' => $active,
        ]) }}
    >
        {{ $slot }}
    </a>
</li>