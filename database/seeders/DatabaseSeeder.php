<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([AvatarSeeder::class]);
        $this->call([UserSeeder::class]);
        $this->call([JobSeeder::class]);
        $this->call([FriendSeeder::class]);
        $this->call([OwnedAvatarSeeder::class]);
    }
}
