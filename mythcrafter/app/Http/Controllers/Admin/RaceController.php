<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Race;

class RaceController extends Controller
{
    public function create()
    {
        return view('admin.races.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:races,name',
            'description' => 'nullable|string',
        ]);

        Race::create($data);

        return redirect()->route('races.index')->with('status', 'Race created successfully!');
    }

    public function edit(Race $race)
    {
        return view('admin.races.edit', compact('race'));
    }

    public function update(Request $request, Race $race)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:races,name,' . $race->id,
            'description' => 'nullable|string',
        ]);

        $race->update($data);

        return redirect()->route('races.index')->with('status', 'Race updated successfully!');
    }

    public function destroy(Race $race)
    {
        $race->delete();

        return redirect()->route('races.index')->with('status', 'Race deleted successfully!');
    }
}
