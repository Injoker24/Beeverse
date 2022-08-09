<?php

namespace Database\Seeders;

use App\Models\OwnedAvatar;
use Illuminate\Database\Seeder;

class OwnedAvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OwnedAvatar::create([
            'user_id' => 2,
            'avatar_id' => 5,
        ]);

        OwnedAvatar::create([
            'user_id' => 2,
            'avatar_id' => 6,
        ]);

        OwnedAvatar::create([
            'user_id' => 2,
            'avatar_id' => 7,
        ]);

        OwnedAvatar::create([
            'user_id' => 2,
            'avatar_id' => 8,
        ]);

        OwnedAvatar::create([
            'user_id' => 2,
            'avatar_id' => 9,
        ]);

        OwnedAvatar::create([
            'user_id' => 2,
            'avatar_id' => 10,
        ]);

        OwnedAvatar::create([
            'user_id' => 2,
            'avatar_id' => 11,
        ]);

        OwnedAvatar::create([
            'user_id' => 3,
            'avatar_id' => 7,
        ]);

        OwnedAvatar::create([
            'user_id' => 3,
            'avatar_id' => 8,
        ]);

        OwnedAvatar::create([
            'user_id' => 3,
            'avatar_id' => 11,
        ]);

        OwnedAvatar::create([
            'user_id' => 4,
            'avatar_id' => 9,
        ]);
    }
}
