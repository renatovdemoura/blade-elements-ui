<span {{ $attributes }} x-data x-init="tippy($el, {
    content: '{{ $content }}',
    offset: [{{ $offset ?? '0,10' }}],
    delay: [{{ $delay ?? 'null,null' }}],
    placement: '{{ $placement ?? 'top' }}'
})">{{ $slot }}</span>
