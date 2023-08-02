<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Training;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $training = Training::create([
            'course_name' => 'SQL',
            'description' => 'SQL Description',
        ]);

        $training = Training::create([
            'course_name' => 'Java',
            'description' => 'Java Description',
        ]);
    }
}
