<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Spell;


class SpellController extends Controller
{
    public function index()
    {
        $spells = Spell::paginate(10);
        return view('admin.spells.index', compact('spells'));
    }

    public function create()
    {
        return view('admin.spells.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|integer|min:0|max:9',
            'school' => 'nullable|string|max:255',
            'components' => 'nullable|string|max:255',
            'casting_time' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        Spell::create($validated);
        return redirect()->route('spells.index')->with('message', 'Spell created successfully.');
    }

    public function edit(Spell $spell)
    {
        return view('admin.spells.edit', compact('spell'));
    }

    public function update(Request $request, Spell $spell)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|integer|min:0|max:9',
            'school' => 'nullable|string|max:255',
            'components' => 'nullable|string|max:255',
            'casting_time' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $spell->update($validated);
        return redirect()->route('spells.index')->with('message', 'Spell updated successfully.');
    }

    public function destroy(Spell $spell)
    {
        $spell->delete();
        return redirect()->route('spells.index')->with('message', 'Spell deleted.');
    }
}
