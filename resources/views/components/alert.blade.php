@props(['status' => 'Aktif'])

@if ($status === 'Aktif')
    <span class="inline-block rounded-full px-3 py-1 text-xs font-medium bg-green-100 text-green-700 border border-green-300">
        {{ $status }}
    </span>
@else
    <span class="inline-block rounded-full px-3 py-1 text-xs font-medium bg-red-100 text-red-700 border border-red-300">
        {{ $status }}
    </span>
@endif