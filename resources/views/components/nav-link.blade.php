@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs xl:text-sm font-semibold text-slate-900 bg-slate-100 border border-slate-200 transition-colors'
            : 'inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs xl:text-sm font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-50 transition-colors';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
