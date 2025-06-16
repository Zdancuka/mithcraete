<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Race;
use App\Models\GameClass;
use App\Models\Spell;
use Illuminate\Support\Facades\Storage;

class CharacterController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $user = Auth::user();
        $characters = Character::where('user_id', $user->id)->get();
        return view('characters.index', ['characters' => $characters]);
    }

    public function show($id)
    {
        // Загружаем персонажа вместе с его расой, классом и заклинаниями
        $character = Character::with(['race', 'class', 'spells'])->findOrFail($id);

        $spells = Spell::all();
        // Передаем данные в шаблон
        return view('characters.show', compact('character', 'spells'));
    }

    public function edit(Character $character)
    {
        $this->authorize('update', $character);
        $character->refresh();
        // Загружаем данные для редактирования (например, списки классов, рас и т.д.)
        $races = Race::all();
        $classes = GameClass::all();
        $spells = Spell::all();
        // Заклинания, которые уже знает персонаж
        $knownSpells = $character->spells()->orderBy('name')->get();

        return view('characters.edit', compact('character', 'races', 'classes', 'spells', 'knownSpells'));
    }

    public function update(Request $request, Character $character)
    {
        $this->authorize('update', $character);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'race_id' => 'required|exists:races,id',
            'class_id' => 'required|exists:game_classes,id',
            'level' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // удалить старое (если нужно)
            if ($character->image) {
                Storage::disk('public')->delete($character->image);
            }

            // сохранить новое
            $data['image'] = $request->file('image')->store('characters', 'public');
        }

        $character->update($data);

        if ($request->has('spells')) {
            $character->spells()->sync($request->input('spells'));
        }

        return redirect()->route('characters.edit', $character->id)
            ->with('status', 'Character updated successfully!');
    }

    public function destroy(Character $character)
    {
        $this->authorize('delete', $character); // Ensure the user is authorized to delete
        $character->delete();
        return redirect()->route('characters.index')->with('status', 'Character deleted successfully.');
    }
    public function addSpell(Request $request, Character $character)
    {

        $this->authorize('update', $character);

        $request->validate([
            'spell_id' => 'required|exists:spells,id',
        ]);

        $spellId = $request->input('spell_id');

        if ($character->spells()->where('spell_id', $spellId)->exists()) {
            return response()->json(['message' => 'Spell already added'], 400);
        }

        $character->spells()->attach($spellId);

        return response()->json(['message' => 'Spell added']);
    }
    /**
     * Remove a spell from the character.
     *
     * @param  \App\Models\Character  $character
     * @param  \App\Models\Spell  $spell
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeSpell(Character $character, Spell $spell)
    {
        $character->spells()->detach($spell->id);
        $character->spells()->detach($spell->id);

        return response()->json(['message' => 'Spell removed']);
    }
    public function create()
    {
        $this->authorize('create', Character::class);
        $races = Race::all();
        $classes = GameClass::all();
        $spells = Spell::all();

        return view('characters.create', compact('races', 'classes', 'spells'));
    }
    public function store(Request $request)
    {
        $this->authorize('create', Character::class);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'race_id' => 'required|exists:races,id',
            'class_id' => 'required|exists:game_classes,id',
            'level' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png|max:2048',
        ]);


        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('characters', 'public');
            $data['image'] = $path;
        }

        $data['user_id'] = Auth::id();
        $character = Character::create($data);

        if ($request->has('spells')) {
            $character->spells()->attach($request->input('spells'));
        }


        return redirect()->route('characters.show', $character->id)
            ->with('status', 'Character created successfully!');
    }
}
