@php
    $colorClass = $status === 'Aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800';
@endphp

<span class="px-2 py-1 text-xs font-semibold rounded-full {{ $colorClass }}">
    {{ $status }}
</span>