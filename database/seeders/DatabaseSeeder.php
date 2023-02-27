<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user = new \App\Models\User(['name' => 'Jack', 'email' => 'jack@example.com', 'password' => \Hash::make('jack')]);
        $user->credits = 120.0;
        $user->save();

        $user = new \App\Models\User(['name' => 'Willy', 'email' => 'willy@example.com', 'password' => \Hash::make('willy')]);
        $user->credits = 5.0;
        $user->save();

        $user = new \App\Models\User(['name' => 'Dana', 'email' => 'dana@example.com', 'password' => \Hash::make('dana')]);
        $user->credits = 400.0;
        $user->save();

        $image_name = 'pacman.png';
        copy(__DIR__.'/'.$image_name, public_path($path = 'images/games/'.$image_name));
        \App\Models\Game::create([
            'name' => "Pac Man",
            'price' => 9.95,
            'description' => "Escape from the maze",
            'image_path' => $path,
            'release_date' => now()->subYears(30)
        ]);

        $image_name = 'Antiriad.jpg';
        copy(__DIR__.'/'.$image_name, public_path($path = 'images/games/'.$image_name));
        \App\Models\Game::create([
            'name' => "Antiriad",
            'price' => 14.99,
            'description' => "The sacred armor",
            'image_path' => $path,
            'release_date' => now()->subDays(10)
        ]);

        $image_name = 'greenberet.jpg';
        copy(__DIR__.'/'.$image_name, public_path($path = 'images/games/'.$image_name));
        \App\Models\Game::create([
            'name' => "Green Beret",
            'price' => 17.20,
            'description' => "Save the world",
            'image_path' => $path,
            'release_date' => now()->subMonths(2)
        ]);

        $image_name = 'ghostngoblins.gif';
        copy(__DIR__.'/'.$image_name, public_path($path = 'images/games/'.$image_name));
        \App\Models\Game::create([
            'name' => "Ghost'n'Goblins",
            'price' => 17.20,
            'description' => "Free the princess",
            'image_path' => $path,
            'release_date' => now()->subMonths(1)
        ]);

        $image_name = 'fzero.jpg';
        copy(__DIR__.'/'.$image_name, public_path($path = 'images/games/'.$image_name));
        \App\Models\Game::create([
            'name' => "F-Zero",
            'price' => 20.00,
            'description' => "Drive fast",
            'image_path' => $path,
            'release_date' => now()->addMinutes(10)
        ]);

        $image_name = 'BloodMoney.png';
        copy(__DIR__.'/'.$image_name, public_path($path = 'images/games/'.$image_name));
        \App\Models\Game::create([
            'name' => "Blood Money",
            'price' => 35.00,
            'description' => "Scroll to the end",
            'image_path' => $path,
            'release_date' => now()->subMonth(18)
        ]);

        $image_name = 'Shadow-of-the-Beast.jpg';
        copy(__DIR__.'/'.$image_name, public_path($path = 'images/games/'.$image_name));
        \App\Models\Game::create([
            'name' => "Shadow of the Beast",
            'price' => 29.00,
            'description' => "Found it?",
            'image_path' => $path,
            'release_date' => now()->addDays(30)
        ]);

        $image_name = 'DungeonMaster.jpg';
        copy(__DIR__.'/'.$image_name, public_path($path = 'images/games/'.$image_name));
        \App\Models\Game::create([
            'name' => "Dungeon Master",
            'price' => 39.90,
            'description' => "Zo Kath Ra",
            'image_path' => $path,
            'release_date' => now()->addDays(1)
        ]);

    }
}
