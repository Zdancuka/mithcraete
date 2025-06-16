<?php

namespace Database\Seeders;

use App\Models\Spell;
use Illuminate\Database\Seeder;

class SpellSeeder extends Seeder
{
    public function run()
    {
        $spells = [
            // Level 0 (Cantrips)
            ['name' => 'Fire Bolt', 'level' => 0, 'casting_time' => '1 action', 'components' => 'V, S', 'school' => 'Evocation', 'description' => 'You hurl a mote of fire at a creature or object.'],
            ['name' => 'Mage Hand', 'level' => 0, 'casting_time' => '1 action', 'components' => 'V, S', 'school' => 'Conjuration', 'description' => 'A spectral, floating hand appears at a point you choose.'],
            ['name' => 'Prestidigitation', 'level' => 0, 'casting_time' => '1 action', 'components' => 'V, S', 'school' => 'Transmutation', 'description' => 'Perform minor magical tricks.'],
            ['name' => 'Ray of Frost', 'level' => 0, 'casting_time' => '1 action', 'components' => 'V, S', 'school' => 'Evocation', 'description' => 'A frigid beam of blue-white light streaks toward a creature.'],
            ['name' => 'Thaumaturgy', 'level' => 0, 'casting_time' => '1 action', 'components' => 'V', 'school' => 'Transmutation', 'description' => 'Manifest a minor wonder, a sign of supernatural power.'],
            ['name' => 'Minor Illusion', 'level' => 0, 'casting_time' => '1 action', 'components' => 'S, M', 'school' => 'Illusion', 'description' => 'Create a sound or an image of an object.'],
            ['name' => 'Guidance', 'level' => 0, 'casting_time' => '1 action', 'components' => 'V, S', 'school' => 'Divination', 'description' => 'Touch one willing creature. Once before the spell ends, the target can roll a d4.'],
            ['name' => 'Shocking Grasp', 'level' => 0, 'casting_time' => '1 action', 'components' => 'V, S', 'school' => 'Evocation', 'description' => 'Deliver a jolt of electricity.'],

            // Level 1
            ['name' => 'Magic Missile', 'level' => 1, 'casting_time' => '1 action', 'components' => 'V, S', 'school' => 'Evocation', 'description' => 'Create three glowing darts of magical force.'],
            ['name' => 'Shield', 'level' => 1, 'casting_time' => '1 reaction', 'components' => 'V, S', 'school' => 'Abjuration', 'description' => 'Invisible barrier of magical force.'],
            ['name' => 'Cure Wounds', 'level' => 1, 'casting_time' => '1 action', 'components' => 'V, S', 'school' => 'Evocation', 'description' => 'Heal a creature you touch.'],
            ['name' => 'Detect Magic', 'level' => 1, 'casting_time' => '1 action', 'components' => 'V, S', 'school' => 'Divination', 'description' => 'Sense presence of magic within 30 feet.'],
            ['name' => 'Burning Hands', 'level' => 1, 'casting_time' => '1 action', 'components' => 'V, S', 'school' => 'Evocation', 'description' => 'Cone of fire erupts from your hands.'],
            ['name' => 'Charm Person', 'level' => 1, 'casting_time' => '1 action', 'components' => 'V, S', 'school' => 'Enchantment', 'description' => 'You attempt to charm a humanoid.'],
            ['name' => 'Disguise Self', 'level' => 1, 'casting_time' => '1 action', 'components' => 'V, S', 'school' => 'Illusion', 'description' => 'Change your appearance.'],
            ['name' => 'Identify', 'level' => 1, 'casting_time' => '1 minute', 'components' => 'V, S, M', 'school' => 'Divination', 'description' => 'Learn magical properties of an item.'],

            // Level 2
            ['name' => 'Invisibility', 'level' => 2, 'casting_time' => '1 action', 'components' => 'V, S, M', 'school' => 'Illusion', 'description' => 'A creature you touch becomes invisible.'],
            ['name' => 'Misty Step', 'level' => 2, 'casting_time' => '1 bonus action', 'components' => 'V', 'school' => 'Conjuration', 'description' => 'Briefly surrounded by silvery mist, teleport up to 30 feet.'],
            ['name' => 'Mirror Image', 'level' => 2, 'casting_time' => '1 action', 'components' => 'V, S', 'school' => 'Illusion', 'description' => 'Create three illusory duplicates of yourself.'],
            ['name' => 'Hold Person', 'level' => 2, 'casting_time' => '1 action', 'components' => 'V, S, M', 'school' => 'Enchantment', 'description' => 'Paralyze a humanoid target.'],
            ['name' => 'Lesser Restoration', 'level' => 2, 'casting_time' => '1 action', 'components' => 'V, S', 'school' => 'Abjuration', 'description' => 'End one disease or condition.'],
            ['name' => 'Silence', 'level' => 2, 'casting_time' => '1 action', 'components' => 'V, S', 'school' => 'Illusion', 'description' => 'No sound can be created within a 20-foot radius sphere.'],
            ['name' => 'Flaming Sphere', 'level' => 2, 'casting_time' => '1 action', 'components' => 'V, S, M', 'school' => 'Conjuration', 'description' => 'A 5-foot-diameter sphere of fire.'],
            ['name' => 'Darkness', 'level' => 2, 'casting_time' => '1 action', 'components' => 'V, M', 'school' => 'Evocation', 'description' => 'Magical darkness spreads from a point.'],

            // Level 3
            ['name' => 'Fireball', 'level' => 3, 'casting_time' => '1 action', 'components' => 'V, S, M', 'school' => 'Evocation', 'description' => 'Explosion of fire that deals massive damage.'],
            ['name' => 'Fly', 'level' => 3, 'casting_time' => '1 action', 'components' => 'V, S, M', 'school' => 'Transmutation', 'description' => 'Touch a creature to give them flying speed.'],
            ['name' => 'Counterspell', 'level' => 3, 'casting_time' => '1 reaction', 'components' => 'S', 'school' => 'Abjuration', 'description' => 'Interrupt the casting of a spell.'],
            ['name' => 'Dispel Magic', 'level' => 3, 'casting_time' => '1 action', 'components' => 'V, S', 'school' => 'Abjuration', 'description' => 'End one spell on a creature or object.'],
            ['name' => 'Bestow Curse', 'level' => 3, 'casting_time' => '1 action', 'components' => 'V, S', 'school' => 'Necromancy', 'description' => 'Place a curse on a creature.'],
            ['name' => 'Blink', 'level' => 3, 'casting_time' => '1 action', 'components' => 'V, S', 'school' => 'Transmutation', 'description' => 'Randomly shift between the Material and Ethereal Planes.'],
            ['name' => 'Water Breathing', 'level' => 3, 'casting_time' => '1 action', 'components' => 'V, S, M', 'school' => 'Transmutation', 'description' => 'Allow creatures to breathe underwater.'],
            ['name' => 'Lightning Bolt', 'level' => 3, 'casting_time' => '1 action', 'components' => 'V, S, M', 'school' => 'Evocation', 'description' => 'Streak of lightning forms a line of damage.'],

            // Level 4
            ['name' => 'Dimension Door', 'level' => 4, 'casting_time' => '1 action', 'components' => 'V', 'school' => 'Conjuration', 'description' => 'You teleport yourself and up to one willing creature.'],
            ['name' => 'Greater Invisibility', 'level' => 4, 'casting_time' => '1 action', 'components' => 'V, S', 'school' => 'Illusion', 'description' => 'You or a creature you touch becomes invisible.'],
            ['name' => 'Polymorph', 'level' => 4, 'casting_time' => '1 action', 'components' => 'V, S, M', 'school' => 'Transmutation', 'description' => 'Transforms a creature into a different form.'],
            ['name' => 'Ice Storm', 'level' => 4, 'casting_time' => '1 action', 'components' => 'V, S, M', 'school' => 'Evocation', 'description' => 'Hailstones batter the area in a cylinder.'],
            ['name' => 'Wall of Fire', 'level' => 4, 'casting_time' => '1 action', 'components' => 'V, S, M', 'school' => 'Evocation', 'description' => 'Creates a wall of flames.'],
            ['name' => 'Control Water', 'level' => 4, 'casting_time' => '1 action', 'components' => 'V, S, M', 'school' => 'Transmutation', 'description' => 'You control freestanding water.'],
            ['name' => 'Stoneskin', 'level' => 4, 'casting_time' => '1 action', 'components' => 'V, S, M', 'school' => 'Abjuration', 'description' => 'Turns flesh to stone-like resistance.'],
            ['name' => 'Banishment', 'level' => 4, 'casting_time' => '1 action', 'components' => 'V, S, M', 'school' => 'Abjuration', 'description' => 'Banishes a creature to another plane.'],

            // Level 5
            ['name' => 'Cloudkill', 'level' => 5, 'casting_time' => '1 action', 'components' => 'V, S', 'school' => 'Conjuration', 'description' => 'Creates a cloud of poisonous gas.'],
            ['name' => 'Wall of Force', 'level' => 5, 'casting_time' => '1 action', 'components' => 'V, S, M', 'school' => 'Evocation', 'description' => 'Creates an invisible wall.'],
            ['name' => 'Teleportation Circle', 'level' => 5, 'casting_time' => '1 minute', 'components' => 'V, M', 'school' => 'Conjuration', 'description' => 'Creates a portal to a permanent teleportation circle.'],
            ['name' => 'Dominate Person', 'level' => 5, 'casting_time' => '1 action', 'components' => 'V, S', 'school' => 'Enchantment', 'description' => 'You control a humanoid.'],
            ['name' => 'Geas', 'level' => 5, 'casting_time' => '1 minute', 'components' => 'V', 'school' => 'Enchantment', 'description' => 'Compel a creature to follow your commands.'],
            ['name' => 'Wall of Stone', 'level' => 5, 'casting_time' => '1 action', 'components' => 'V, S, M', 'school' => 'Evocation', 'description' => 'Creates a stone wall.'],
            ['name' => 'Legend Lore', 'level' => 5, 'casting_time' => '10 minutes', 'components' => 'V, S, M', 'school' => 'Divination', 'description' => 'Brings legends or lore to mind.'],

            // Level 6
            ['name' => 'Disintegrate', 'level' => 6, 'casting_time' => '1 action', 'components' => 'V, S, M', 'school' => 'Transmutation', 'description' => 'Destroys creatures or objects.'],
            ['name' => 'Mass Suggestion', 'level' => 6, 'casting_time' => '1 action', 'components' => 'V, M', 'school' => 'Enchantment', 'description' => 'You suggest a course of activity to multiple targets.'],
            ['name' => 'True Seeing', 'level' => 6, 'casting_time' => '1 action', 'components' => 'V, S, M', 'school' => 'Divination', 'description' => 'Gives true sight.'],
            ['name' => 'Blade Barrier', 'level' => 6, 'casting_time' => '1 action', 'components' => 'V, S', 'school' => 'Evocation', 'description' => 'Wall of spinning blades.'],
            ['name' => 'Sunbeam', 'level' => 6, 'casting_time' => '1 action', 'components' => 'V, S, M', 'school' => 'Evocation', 'description' => 'Radiant beam damages undead.'],

            // Level 7
            ['name' => 'Teleport', 'level' => 7, 'casting_time' => '1 action', 'components' => 'V', 'school' => 'Conjuration', 'description' => 'Instantly transports you and others.'],
            ['name' => 'Etherealness', 'level' => 7, 'casting_time' => '1 action', 'components' => 'V, S', 'school' => 'Transmutation', 'description' => 'You enter the Ethereal Plane.'],
            ['name' => 'Finger of Death', 'level' => 7, 'casting_time' => '1 action', 'components' => 'V, S', 'school' => 'Necromancy', 'description' => 'Deals necrotic damage and may create undead.'],
            ['name' => 'Forcecage', 'level' => 7, 'casting_time' => '1 action', 'components' => 'V, S', 'school' => 'Evocation', 'description' => 'Invisible cube trap.'],
            ['name' => 'Reverse Gravity', 'level' => 7, 'casting_time' => '1 action', 'components' => 'V, S, M', 'school' => 'Transmutation', 'description' => 'Reverses gravity in a cylinder.'],

            // Level 8
            ['name' => 'Mind Blank', 'level' => 8, 'casting_time' => '1 action', 'components' => 'V, S', 'school' => 'Abjuration', 'description' => 'Immunity to psychic effects.'],
            ['name' => 'Power Word Stun', 'level' => 8, 'casting_time' => '1 action', 'components' => 'V', 'school' => 'Enchantment', 'description' => 'Stuns a creature.'],
            ['name' => 'Maze', 'level' => 8, 'casting_time' => '1 action', 'components' => 'V, S', 'school' => 'Conjuration', 'description' => 'Banishes creature into a labyrinth.'],
            ['name' => 'Earthquake', 'level' => 8, 'casting_time' => '1 minute', 'components' => 'V, S, M', 'school' => 'Evocation', 'description' => 'Causes a massive tremor.'],
            ['name' => 'Sunburst', 'level' => 8, 'casting_time' => '1 action', 'components' => 'V, S, M', 'school' => 'Evocation', 'description' => 'Blinding radiant explosion.'],

            // Level 9
            ['name' => 'Wish', 'level' => 9, 'casting_time' => '1 action', 'components' => 'V', 'school' => 'Conjuration', 'description' => 'Ultimate spell to alter reality.'],
            ['name' => 'Meteor Swarm', 'level' => 9, 'casting_time' => '1 action', 'components' => 'V, S', 'school' => 'Evocation', 'description' => 'Calls down fiery meteors.'],
            ['name' => 'Power Word Kill', 'level' => 9, 'casting_time' => '1 action', 'components' => 'V', 'school' => 'Enchantment', 'description' => 'Kills a creature with no save if below 100 HP.'],
        ];

        foreach ($spells as $spell) {
            Spell::create($spell);
        }
    }
}

// This seeder creates a set of spells with various attributes.