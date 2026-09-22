<?php

namespace App\Http\Controllers\classes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    use HasClassData;

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('classes.index', [
            'title' => 'Sistem Sekolah - Daftar Kelas',
            'classes' => $this->classes(),
        ]);
    }
}
