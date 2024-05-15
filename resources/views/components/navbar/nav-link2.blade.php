@props(['active' => false])

<a {{ $attributes }} @class([
    'text-blue-500 hover:underline' => $active,
    'text-slate-50 hover:underline' => !$active,
])>{{ $slot }}</a>
