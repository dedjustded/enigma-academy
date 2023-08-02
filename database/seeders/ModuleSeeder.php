<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Module::create([
            'training_id' => 1,
            'name' => 'SQL Basic',
            'description' => 'Some description',

        ]);

        Module::create([
            'training_id' => 2,
            'name' => 'Java OOP',
            'description' => 'Some description',
        ]);
    }
}
