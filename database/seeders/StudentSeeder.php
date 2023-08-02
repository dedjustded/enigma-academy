<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = Student::create([
            'first_name' => 'Borislav',
            'last_name' => 'Pavlov',
            'email' => 'mymail@gmail.com',
            'phone' => '1111111111',
            'country' => 'Bulgaria',
            'city' => 'Pleven',
            'language' => 'Bulgarian',    
            'repository' => null,   
            'info' => null,
            'link' => null,
            'web_page_name' => null,
            'messenger_name' => null,
            'username' => 'bpavlov',
            'hoby' => null,
            'skils' => null,
        ]);

        $student = Student::create([
            'first_name' => 'Imran',
            'last_name' => 'Petkov',
            'email' => 'mymail_1@gmail.com',
            'phone' => '2222222222',
            'country' => 'Bulgaria',
            'city' => 'Pleven',
            'language' => 'Bulgarian',    
            'repository' => null,   
            'info' => null,
            'link' => null,
            'web_page_name' => null,
            'messenger_name' => null,
            'username' => 'imran',
            'hoby' => null,
            'skils' => null,
        ]);
    }
}
