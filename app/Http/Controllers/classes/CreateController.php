<?php

namespace App\Http\Controllers\classes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    use HasClassData;

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('classes.create', [
            'title' => 'Sistem Sekolah - Tambah Kelas',
            'majors' => $this->majors(),
            'teachers' => $this->teachers(),
        ]);
    }
}
