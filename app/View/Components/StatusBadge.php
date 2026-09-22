<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatusBadge extends Component
{
    public string $status;

    public string $classes;

    public function __construct(string $status = 'Aktif')
    {
        $this->status = $status;
        $this->classes = $this->resolveClasses($status);
    }

    private function resolveClasses(string $status): string
    {
        return match ($status) {
            'Aktif' => 'bg-green-100 text-green-700 border-green-300',
            'Tidak Aktif' => 'bg-red-100 text-red-700 border-red-300',
            'Cuti' => 'bg-yellow-100 text-yellow-700 border-yellow-300',
            default => 'bg-slate-100 text-slate-700 border-slate-300',
        };
    }

    public function render(): View|Closure|string
    {
        return view('components.status-badge');
    }
}
