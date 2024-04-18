@props([
    'backgroundColor' => null,
    'end' => null,
    'start' => null,
])

<div {{ $attributes->class([
    'flex items-center justify-between space-x-4 flex-shrink-0 pt-5 pb-4 px-5',
    'bg-gray-100' => $backgroundColor !== 'light',
    'bg-white' => $backgroundColor === 'light',
]) }}>
    <div class="flex items-center">
        {{ $start }}
    </div>

    <div class="flex items-center">
        {{ $end }}
    </div>
</div>
