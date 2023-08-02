<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'user_id' => 2,
            'training_id' => 1

        ]);
        Permission::create([
            'user_id' => 3,
            'training_id' => 1

        ]);
    }
}
