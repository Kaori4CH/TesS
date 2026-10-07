<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Models\Student; 
use Illuminate\Http\Request;
use Laravel\Boost\Console\UpdateCommand;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Sistem Sekolah - Daftar Siswa';
        $search= $request->query('search');
        $class= $request->query('class');
        $major= $request->query('major');

        $students = Student::select(['id','nis','name','gender','major','class'])
        ->when($search,function($query,$search){
            $query->where(function($query)use ($search){
        $query->where('name','like',"%{$search}%")
        ->orWhere('nis','like',"%{$search}%");
            });
        })
// ->when($class,function($query,$class){
       
// $query->where('class','=','$class');
// })
->when($class,fn($query,$class)=>$query->where('class','=',$class))
->when($major,fn($query,$major)=>$query->where('major','=',$major))
->simplePaginate(10)
->withQueryString();

        $classes = ['10 AKL 1','10 AKL 2', '10 BiD', '10 TKJ 1', '10 TKJ 2', '11 TKJ 1', '11 TKJ 2', '11 AKL', '11 BiD', '12 AKL', '12 BiD', '12 TKJ 1', '12 TKJ 2', '12 TKJ 3'];
        $majors = ['AKL','TKJ','BiD'];
        

        return view('students.index', [
            'title' => $title,
            'students' => $students,
            'classes'=>$classes,
            'majors'=>$majors,
        ]);
    }

    public function show(Student $student)
    {
        $title = 'Sistem Sekolah - Detail Siswa';

        return view('students.show', [
            'title' => $title,
            'student'=>$student
        ]);
    }

    public function create()
    {
        $title = 'Sistem Sekolah - Tambah Siswa';

        return view('students.create', [
            'title' => $title,
        ]);
    }

    public function edit(Student $student)
    {
        $title = 'Sistem Sekolah - Edit Siswa';

        return view('students.edit', [
            'title' => $title,
            'student'=>$student
        ]);
    }

    public function store(StoreRequest $request)
    {
 
        $validatedRequest = $request->validated()
        ;

 
    Student::create($validatedRequest);

        return redirect()->route('students.index');
    }

    public function update(Student $student, UpdateRequest $request)
    {
            $validatedRequest = $request->validated();

        $student->update($validatedRequest);

        return redirect()->route('students.index');

    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');

    }
}