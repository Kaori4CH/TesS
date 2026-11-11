<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $title = "Sistem Sekolah - Daftar Siswa";
        $search = $request->query('search');
        $class = $request->query('class');
        $major = $request->query('major');

        $students = Student::select('id', 'nis', 'name', 'gender', 'class', 'major')
        ->when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('nis', 'like', "%{$search}%");
         })
        ->when($class, fn ($query, $class) => $query->where('class','=', $class))
        ->when($major, fn ($query, $major) => $query->where('major', '=', $major))
        ->paginate(10)
        ->withQueryString();
        
    $schoolClasses = ['10 AKL 1', '11 AKL 1', '12 AKL 1', '10 TKJ 1', '11 TKJ 1', '12 TKJ 1', '10 BiD 1', '11 BiD 1', '12 BiD 1', '10 AKL 2', '11 AKL 2', '12 AKL 2', '10 TKJ 2', '11 TKJ 2', '12 TKJ 2', '10 BiD 2', '11 BiD 2', '12 BiD 2'];
    $majors = ['AKL', 'TKJ', 'BiD'];

        return view('students.index', [
            'title' => $title,
            'students' => $students,
            'schoolClasses' => $schoolClasses,
            'majors' => $majors
        ]);
    }
    public function show(Student $student)
    {
         $title = "Sistem Sekolah - Detail Siswa";

        return view('students.show', [
            'title' => $title,
            'student' => $student
        ]);
    }
    public function create()
    {
        
         $title = "Sistem Sekolah - Tambah Siswa";
        return view('students.create', [
            'title' => $title
        ]);          
    }
    public function edit(Student $student)
    {
        $title = "Sistem Sekolah - Edit Siswa";

        return view('students.edit', [
            'title' => $title,
            'student' => $student
        ]);
    }
    public function store(StoreRequest $request)
    {
        //vlaidasi data
        $validatedRequest = $request->validated();

        //Tambahkan data ke database
        Student::create($validatedRequest);

        //handle if success
        return redirect()->route('students.index');
    }
    public function update(Student $student, UpdateRequest $request)
    {
        //vlaidasi data
        $validatedRequest = $request->validated();

        //Update data 
        $student->update($validatedRequest);

        //handle if success
        return redirect()->route('students.index');
    }
    public function destroy(Student $student)
    {
        //Hapus data
        $student->delete();

        //handle if success
        return redirect()->route('students.index');
    }
}
