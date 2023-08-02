<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lecture;

class LectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lecture::create([
            'module_id' => 1,
            'name' => 'Variables',
            'description' => 'Declare Variables',
        ]);

        Lecture::create([
            'module_id' => 1,
            'name' => 'Procedure',
            'description' => 'Declare Procedure',
        ]);
    }
}
