<?php

namespace App\Http\Controllers\classes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    use HasClassData;

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $id)
    {
        return view('classes.show', [
            'title' => 'Sistem Sekolah - Detail Kelas',
            'class' => $this->findClass($id),
        ]);
    }
}
