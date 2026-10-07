<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userTeacherEmail = 'richard@ski.sch.id';
        $userStudentEmail ='Charles@ski.sch.id';

        User::updateOrCreate(
            [ 'email' => $userStudentEmail ],
            [
                'name'=>'Charles',
                'password'=> bcrypt('password'),
                'role'=> 'student'
            ]
        );
}
}