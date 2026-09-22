<?php

namespace App\Http\Controllers\classes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditController extends Controller
{
    use HasClassData;

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $id)
    {
        return view('classes.edit', [
            'title' => 'Sistem Sekolah - Edit Kelas',
            'class' => $this->findClass($id),
            'majors' => $this->majors(),
            'teachers' => $this->teachers(),
        ]);
    }
}
