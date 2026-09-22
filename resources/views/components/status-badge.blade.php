{{-- View untuk class-based component App\View\Components\StatusBadge --}}
<span
    {{ $attributes->merge(['class' => 'inline-block rounded-full border px-3 py-1 text-xs font-medium ' . $classes]) }}>
    {{ $status }}
</span>
