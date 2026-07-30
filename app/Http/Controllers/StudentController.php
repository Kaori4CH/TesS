<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $title = "Sistem Sekolah - Daftar Siswa";
        $students =
            [
                [
                    'id' => 1,
                    'nis' => '1001',
                    'name' => 'Andi',
                    'Class' => 'XII TKJ 1',
                    'Major' => 'TKJ',
                ],
                [
                    'id' => 2,
                    'nis' => '1002',
                    'name' => 'Budi',
                    'Class' => 'XII AKL 1',
                    'Major' => 'AKL',
                ],
            ];
        return view(
            'students.index',
            [
                'title' => $title,
                'students' => $students
            ]
        );
    }

    public function show(string $id)
    {
        $title = "Sistem Sekolah - Detail Siswa";
        return view(
            'students.show',
            [
                'title' => $title
            ]
        );
    }

    public function create()
    {
        $title = "Sistem Sekolah - Tambah Siswa";
        return view(
            'students.create',
            [
                'title' => $title
            ]
        );
    }

    public function edit(string $id)
    {
        $title = "Sistem Sekolah - Ubah Siswa";
        return view(
            'students.edit',
            [
                'title' => $title
            ]
        );
    }

    public function store()
    {
        return "menambah data siswa baru";
    }

    public function update(string $id)
    {
        return "mengubah data siswa dengan ID: {$id}";
    }

    public function destroy(string $id)
    {
        return "menghapus data siswa dengan ID: {$id}";
    }

}
