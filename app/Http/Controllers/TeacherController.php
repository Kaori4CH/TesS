<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $title = 'Sistem Sekolah - Daftar Guru'; //[cite: 1]
        $teachers = [
            [
                'id' => 1,
                'nip' => '198501012024',
                'name' => 'Budi Santoso',
                'gender' => 'Laki-Laki',
                'subject' => 'Akuntansi Dasar',
                'phone' => '081234560001',
                'status' => 'Aktif',
            ],
            [
                'id' => 2,
                'nip' => '198703152024',
                'name' => 'Siti Aminah',
                'gender' => 'Perempuan',
                'subject' => 'Jaringan Komputer',
                'phone' => '081234560002',
                'status' => 'Aktif',
            ]
        ]; //[cite: 1]

        return view('teachers.index', compact('title', 'teachers'));
    }

    public function show($id)
    {
        $title = 'Sistem Sekolah - Detail Guru'; //[cite: 1]
        return view('teachers.show', compact('title'));
    }

    public function create()
    {
        $title = 'Sistem Sekolah - Tambah Guru'; //[cite: 1]
        return view('teachers.create', compact('title'));
    }

    public function edit($id)
    {
        $title = 'Sistem Sekolah - Edit Guru'; //[cite: 1]
        return view('teachers.edit', compact('title'));
    }

    public function store(Request $request)
    {
        return "Proses menambah guru";
    }

    public function update(Request $request, $id)
    {
        return "Proses update guru dengan id: " . $id;
    }

    public function destroy($id)
    {
        return "Proses hapus guru dengan id: " . $id;
    }
}