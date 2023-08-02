<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        Role::create([
            'id' => 1,
            'name' => 'admin',
            'code' => 'admin'
        ]);

        Role::create([
            'id' => 2,
            'name' => 'teacher',
            'code' => 'teacher'
        ]);

        Role::create([
            'id' => 3,
            'name' => 'student',
            'code' => 'student'
        ]);

        Role::create([
            'id' => 4,
            'name' => 'employeer',
            'code' => 'employeer'
        ]);

        Role::create([
            'id' => 5,
            'name' => 'user',
            'code' => 'user'
        ]);
    }
}
