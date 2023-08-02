<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Homework;
use App\Models\Task;
class HomeworkTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $homework = Homework::create([
            'lecture_id' => 1,
            'name' => 'Variables',
            'description' => 'Declare Variables',
        ]);
        
    }
}
