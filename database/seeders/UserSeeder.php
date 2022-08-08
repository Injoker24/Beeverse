<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'sinatraa',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'age' => 25,
            'coin' => 999999,
            'linkedin_link' => 'https://www.linkedin.com/in/sinatraa',
            'phone_num' => '0812345678',
            'register_price' => rand(100000, 125000),
            'avatar_id' => 1,
            'job_position' => 'Graphic Designer',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet hendrerit lacus, ac ultricies magna. Proin gravida nibh sed tristique aliquet. Vivamus sit amet metus ac diam vehicula dignissim.'
        ]);

        User::create([
            'username' => 'tenz',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'age' => 23,
            'coin' => 999999,
            'linkedin_link' => 'https://www.linkedin.com/in/tenz',
            'phone_num' => '0812345678',
            'register_price' => rand(100000, 125000),
            'avatar_id' => 1,
            'job_position' => 'Marketing Manager',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet hendrerit lacus, ac ultricies magna. Proin gravida nibh sed tristique aliquet. Vivamus sit amet metus ac diam vehicula dignissim.'
        ]);
    }
}
