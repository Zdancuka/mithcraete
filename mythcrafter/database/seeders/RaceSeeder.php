<?php

namespace Database\Seeders;

use App\Models\Race;
use Illuminate\Database\Seeder;

class RaceSeeder extends Seeder
{
    public function run()
    {
        $races = [
            ['name' => 'Human', 'description' => 'Versatile and ambitious beings.'],
            ['name' => 'Elf', 'description' => 'Graceful and long-lived, attuned to nature and magic.'],
            ['name' => 'Dwarf', 'description' => 'Stout and resilient, masters of stone and metal.'],
            ['name' => 'Halfling', 'description' => 'Small and cheerful, known for their luck and stealth.'],
            ['name' => 'Orc', 'description' => 'Strong and fierce warriors.'],
            ['name' => 'Tiefling', 'description' => 'Descendants of infernal heritage, marked by horns and tails.'],
            ['name' => 'Dragonborn', 'description' => 'Proud dragon-kin with breath weapons.'],
            ['name' => 'Gnome', 'description' => 'Inventive and energetic, lovers of magic and science.'],
            ['name' => 'Half-Orc', 'description' => 'Powerful hybrids with orcish blood.'],
            ['name' => 'Half-Elf', 'description' => 'Blending human versatility and elven grace.'],
            ['name' => 'Aasimar', 'description' => 'Celestial-blooded mortals with radiant power.'],
            ['name' => 'Tabaxi', 'description' => 'Cat-like humanoids driven by curiosity and wanderlust.'],
        ];

        foreach ($races as $race) {
            Race::create($race);
        }
    }
}
