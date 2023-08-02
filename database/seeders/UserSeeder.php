<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'username' => 'admin',
            'password' => 'admin123',
            'first_name' => 'FirstName',
            'last_name' => 'LastName',
            'email' => 'admin@gmail.com',
            'role_id' => 1,
        ]);

        $user = User::create([
            'username' => 'teacher',
            'password' => '123',
            'first_name' => 'Teacher',
            'last_name' => 'Teacher',
            'email' => 'teacher@gmail.com',
            'role_id' => 2,
        ]);

        $user = User::create([
            'username' => 'student',
            'password' => '123',
            'first_name' => 'Student',
            'last_name' => 'Teacher',
            'email' => 'student@gmail.com',
            'role_id' => 3,
        ]);

        $user = User::create([
            'username' => 'employeer',
            'password' => '123',
            'first_name' => 'Employeer',
            'last_name' => 'Employeer',
            'email' => 'employeer@gmail.com',
            'role_id' => 4,
        ]);

    }
}
