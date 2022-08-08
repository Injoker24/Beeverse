<?php

namespace Database\Seeders;

use App\Models\Friend;
use Illuminate\Database\Seeder;

class FriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Friend::create([
            'friend_1' => 1,
            'friend_2' => 2,
        ]);

        Friend::create([
            'friend_1' => 1,
            'friend_2' => 3,
        ]);

        Friend::create([
            'friend_1' => 1,
            'friend_2' => 4,
        ]);
    }
}
