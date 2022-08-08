<?php

namespace Database\Seeders;

use App\Models\Avatar;
use Illuminate\Database\Seeder;

class AvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Avatar::create([
            'name' => 'Default',
            'path' => '/img/avatar/default.jpg',
            'price' => 0,
        ]);

        Avatar::create([
            'name' => 'Bear 1',
            'path' => '/img/avatar/bear1.jpg',
            'price' => 0,
        ]);

        Avatar::create([
            'name' => 'Bear 2',
            'path' => '/img/avatar/bear2.jpg',
            'price' => 0,
        ]);

        Avatar::create([
            'name' => 'Bear 3',
            'path' => '/img/avatar/bear3.jpg',
            'price' => 0,
        ]);

        Avatar::create([
            'name' => 'Coin',
            'path' => '/img/avatar/Coin.jpg',
            'price' => 50,
        ]);

        Avatar::create([
            'name' => 'Flame',
            'path' => '/img/avatar/Flame.jpg',
            'price' => 100,
        ]);

        Avatar::create([
            'name' => 'Hades',
            'path' => '/img/avatar/Hades.jpg',
            'price' => 500,
        ]);

        Avatar::create([
            'name' => 'Lightning',
            'path' => '/img/avatar/Lightning.jpg',
            'price' => 2000,
        ]);

        Avatar::create([
            'name' => 'Mask',
            'path' => '/img/avatar/Mask.jpg',
            'price' => 5000,
        ]);

        Avatar::create([
            'name' => 'Model',
            'path' => '/img/avatar/Model.jpg',
            'price' => 10000,
        ]);

        Avatar::create([
            'name' => 'Sage',
            'path' => '/img/avatar/Sage.jpg',
            'price' => 25000,
        ]);

        Avatar::create([
            'name' => 'Samurai',
            'path' => '/img/avatar/Samurai.jpg',
            'price' => 50000,
        ]);

        Avatar::create([
            'name' => 'Umbrella',
            'path' => '/img/avatar/Umbrella.jpg',
            'price' => 75000,
        ]);

        Avatar::create([
            'name' => 'Water',
            'path' => '/img/avatar/Water.jpg',
            'price' => 100000,
        ]);
    }
}
