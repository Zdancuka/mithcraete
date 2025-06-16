<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Character;
use App\Models\User;
use App\Models\Race;
use App\Models\GameClass;
use App\Models\Spell;

class CharacterSeeder extends Seeder
{
    public function run()
    {
        $user = User::find(2); // assumes you have a registered user

        $wizardClass = GameClass::where('name', 'Wizard')->first();
        $fighterClass = GameClass::where('name', 'Fighter')->first();

        $elfRace = Race::where('name', 'Elf')->first();
        $dwarfRace = Race::where('name', 'Dwarf')->first();

        // Create Elorin
        $elorin = Character::create([
            'name' => 'Elorin the Wise',
            'level' => 5,
            'user_id' => $user->id,
            'race_id' => $elfRace->id,
            'class_id' => $wizardClass->id,
            'description' => 'A wise and powerful elf wizard, known for his mastery of arcane magic.'
        ]);

        $elorin->spells()->attach(Spell::whereIn('name', [
            'Magic Missile',
            'Shield',
            'Fireball',
            'Detect Magic'
        ])->pluck('id'));

        // Create Tharok
        $tharok = Character::create([
            'name' => 'Tharok Ironfist',
            'level' => 3,
            'user_id' => $user->id,
            'race_id' => $dwarfRace->id,
            'class_id' => $fighterClass->id,
        ]);

        $tharok->spells()->attach(Spell::whereIn('name', [
            'Booming Blade',
            'Shield',
            'Absorb Elements'
        ])->pluck('id'));
    }
}
