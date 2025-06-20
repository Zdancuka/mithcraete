<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UsersSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void

    {
        $this->call([
            UsersSeeder::class,
            RaceSeeder::class,
            ClassSeeder::class,
            SpellSeeder::class,
            CharacterSeeder::class,
        ]);
    }
}
