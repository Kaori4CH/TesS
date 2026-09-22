<?php

namespace App\Http\Controllers\classes;

/**
 * Sumber data dummy bersama untuk modul Kelas.
 * Ganti isinya dengan query Eloquent bila sudah memakai database.
 */
trait HasClassData
{
    protected function majors(): array
    {
        return [
            ['id' => 1, 'name' => 'AKL', 'full_name' => 'Akuntansi dan Keuangan Lembaga'],
            ['id' => 2, 'name' => 'TKJ', 'full_name' => 'Teknik Komputer dan Jaringan'],
            ['id' => 3, 'name' => 'BD', 'full_name' => 'Bisnis Digital'],
        ];
    }

    protected function teachers(): array
    {
        return [
            ['id' => 1, 'name' => 'Budi Santoso'],
            ['id' => 2, 'name' => 'Siti Aminah'],
            ['id' => 3, 'name' => 'Agus Prasetyo'],
        ];
    }

    protected function classes(): array
    {
        $majors = collect($this->majors());
        $teachers = collect($this->teachers());

        $rows = [
            ['id' => 1, 'name' => 'XII AKL 1', 'grade' => 'XII', 'major_id' => 1, 'teacher_id' => 1],
            ['id' => 2, 'name' => 'XII TKJ 1', 'grade' => 'XII', 'major_id' => 2, 'teacher_id' => 2],
        ];

        return collect($rows)
            ->map(function (array $row) use ($majors, $teachers) {
                $row['major'] = $majors->firstWhere('id', $row['major_id'])['name'] ?? '-';
                $row['homeroom_teacher'] = $teachers->firstWhere('id', $row['teacher_id'])['name'] ?? '-';

                return $row;
            })
            ->all();
    }

    protected function findClass(string $id): array
    {
        $class = collect($this->classes())->firstWhere('id', (int) $id);

        abort_if($class === null, 404);

        return $class;
    }
}
