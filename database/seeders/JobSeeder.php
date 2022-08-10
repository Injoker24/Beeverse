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
            'path' => '/img/job/Logo Design.jpg',
            'user_id' => 1,
        ]);

        Job::create([
            'title' => 'UI Designer',
            'path' => '/img/job/UI Design.jpg',
            'user_id' => 1,
        ]);

        Job::create([
            'title' => 'CSS Developer',
            'path' => '/img/job/CSS Developer.jpeg',
            'user_id' => 1,
        ]);

        Job::create([
            'title' => 'Public Relation',
            'path' => '/img/job/PR.jpg',
            'user_id' => 2,
        ]);

        Job::create([
            'title' => 'Marketing',
            'path' => '/img/job/Marketing.jpg',
            'user_id' => 2,
        ]);

        Job::create([
            'title' => 'Communication',
            'path' => '/img/job/Communication.png',
            'user_id' => 2,
        ]);

        Job::create([
            'title' => 'Translation',
            'path' => '/img/job/Translation.jpg',
            'user_id' => 3,
        ]);

        Job::create([
            'title' => 'Novel Writing',
            'path' => '/img/job/Novel.jpg',
            'user_id' => 3,
        ]);

        Job::create([
            'title' => 'Proofreading',
            'path' => '/img/job/Proofread.jpg',
            'user_id' => 3,
        ]);

        Job::create([
            'title' => 'Unity Developer',
            'path' => '/img/job/Unity.jpg',
            'user_id' => 4,
        ]);

        Job::create([
            'title' => 'Blender',
            'path' => '/img/job/Blender.jpg',
            'user_id' => 4,
        ]);

        Job::create([
            'title' => 'Music Composing',
            'path' => '/img/job/Music.jpg',
            'user_id' => 4,
        ]);

        Job::create([
            'title' => 'Story Writing',
            'path' => '/img/job/Story.jpg',
            'user_id' => 4,
        ]);
    }
}
