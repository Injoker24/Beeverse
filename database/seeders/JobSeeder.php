<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::create([
            'title' => 'Logo Designer',
            'path' => 'img/job/Logo Design.jpg',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'user_id' => 1,
        ]);

        Job::create([
            'title' => 'UI Designer',
            'path' => 'img/job/UI Design.jpg',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'user_id' => 1,
        ]);

        Job::create([
            'title' => 'CSS Developer',
            'path' => 'img/job/CSS Developer.jpeg',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'user_id' => 1,
        ]);
    }
}
