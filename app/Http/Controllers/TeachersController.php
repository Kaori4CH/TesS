<?php

namespace App\Http\Controllers;

class TeachersController extends Controller
{
    /**
     * Sumber data dummy guru.
     */
    private function teachers(): array
    {
        return [
            [
                'id' => 1,
                'nip' => '198501012024',
                'name' => 'Budi Santoso',
                'gender' => 'L',
                'subject' => 'Akuntansi Dasar',
                'phone_number' => '081234560001',
                'status' => 'Aktif',
            ],
            [
                'id' => 2,
                'nip' => '198703152024',
                'name' => 'Siti Aminah',
                'gender' => 'P',
                'subject' => 'Jaringan Komputer',
                'phone_number' => '081234560002',
                'status' => 'Aktif',
            ],
        ];
    }

    private function findTeacher(string $id): array
    {
        $teacher = collect($this->teachers())->firstWhere('id', (int) $id);

        abort_if($teacher === null, 404);

        return $teacher;
    }

    public function index()
    {
        return view('teachers.index', [
            'title' => 'Sistem Sekolah - Daftar Guru',
            'teachers' => $this->teachers(),
        ]);
    }

    public function show(string $id)
    {
        return view('teachers.show', [
            'title' => 'Sistem Sekolah - Detail Guru',
            'teacher' => $this->findTeacher($id),
        ]);
    }

    public function create()
    {
        return view('teachers.create', [
            'title' => 'Sistem Sekolah - Tambah Guru',
        ]);
    }

    public function edit(string $id)
    {
        return view('teachers.edit', [
            'title' => 'Sistem Sekolah - Edit Guru',
            'teacher' => $this->findTeacher($id),
        ]);
    }

    public function store()
    {
        return 'menambah data guru baru';
    }

    public function update(string $id)
    {
        return "mengubah data guru dengan ID: {$id}";
    }

    public function destroy(string $id)
    {
        return "menghapus data guru dengan ID: {$id}";
    }
}
