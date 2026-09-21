@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center gap-3 w-full px-4 py-2.5 rounded-lg text-start text-sm font-semibold text-slate-900 bg-slate-100 border-l-4 border-slate-900 transition-colors'
            : 'flex items-center gap-3 w-full px-4 py-2.5 rounded-lg text-start text-sm font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-50 transition-colors';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
