<?php

namespace Database\Seeders;

use App\Models\GameClass;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    public function run()
    {
        $classes = [
            [
                'name' => 'Wizard',
                'description' => 'Master of arcane magic.',
                'hit_dice' => '1d6',
                'abilities' => 'Spellcasting, Arcane Recovery'
            ],
            [
                'name' => 'Fighter',
                'description' => 'Martial weapon expert.',
                'hit_dice' => '1d10',
                'abilities' => 'Second Wind, Action Surge'
            ],
            [
                'name' => 'Rogue',
                'description' => 'Stealthy and dexterous adventurer.',
                'hit_dice' => '1d8',
                'abilities' => 'Sneak Attack, Evasion'
            ],
            [
                'name' => 'Cleric',
                'description' => 'Divine spellcaster and healer.',
                'hit_dice' => '1d8',
                'abilities' => 'Spellcasting, Channel Divinity'
            ],
            [
                'name' => 'Paladin',
                'description' => 'Holy warrior bound by an oath.',
                'hit_dice' => '1d10',
                'abilities' => 'Divine Smite, Lay on Hands'
            ],
            [
                'name' => 'Barbarian',
                'description' => 'Savage warrior with immense strength.',
                'hit_dice' => '1d12',
                'abilities' => 'Rage, Reckless Attack'
            ],
            [
                'name' => 'Druid',
                'description' => 'Nature-based spellcaster and shapeshifter.',
                'hit_dice' => '1d8',
                'abilities' => 'Wild Shape, Spellcasting'
            ],
            [
                'name' => 'Ranger',
                'description' => 'Tracker and hunter with nature magic.',
                'hit_dice' => '1d10',
                'abilities' => 'Favored Enemy, Natural Explorer'
            ],
            [
                'name' => 'Sorcerer',
                'description' => 'Innate arcane spellcaster.',
                'hit_dice' => '1d6',
                'abilities' => 'Spellcasting, Sorcery Points'
            ],
            [
                'name' => 'Bard',
                'description' => 'Performer whose music is magical.',
                'hit_dice' => '1d8',
                'abilities' => 'Bardic Inspiration, Spellcasting'
            ],
            [
                'name' => 'Monk',
                'description' => 'Martial artist with mystical powers.',
                'hit_dice' => '1d8',
                'abilities' => 'Martial Arts, Ki Points'
            ],
            [
                'name' => 'Warlock',
                'description' => 'Caster drawing power from a patron.',
                'hit_dice' => '1d8',
                'abilities' => 'Eldritch Invocations, Pact Magic'
            ],
        ];

        foreach ($classes as $class) {
            GameClass::create($class);
        }
    }
}
// This seeder populates the game_classes table with initial data for various game classes.