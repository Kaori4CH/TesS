@props(['type' => 'INFO'])

@php
    $styles = match (strtoupper($type)) {
        'SUCCESS' => 'bg-green-50 text-green-800 border-green-300',
        'WARNING' => 'bg-yellow-50 text-yellow-800 border-yellow-300',
        'DANGER', 'ERROR' => 'bg-red-50 text-red-800 border-red-300',
        default => 'bg-slate-50 text-slate-700 border-slate-300',
    };
@endphp

<div {{ $attributes->merge(['class' => 'mb-6 border px-4 py-3 text-sm ' . $styles]) }}>
    {{ $slot }}
</div>
