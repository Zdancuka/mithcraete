<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GameClass;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Show the form for creating a new class.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.classes.create');
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request

     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'hit_dice' => 'required|string|max:255',
            'abilities' => 'nullable|string|max:255',
        ]);

        $class = GameClass::create($validated);

        if ($class) {
            return redirect()->route('classes.index')->with('success', 'Class created successfully.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to create class. Please try again.');
        }
    }

    /**
     * Show the form for editing the specified class.
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $class = GameClass::findOrFail($id);
        return view('admin.classes.edit', compact('class'));
    }

    /**
     * Update the specified class in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $class = GameClass::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'hit_dice' => 'required|string|max:255',
            'abilities' => 'nullable|string|max:255',
        ]);

        $class->update($validated);

        return redirect()->route('classes.index')->with('success', 'Class updated successfully.');
    }

    /**
     * Remove the specified class from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $class = GameClass::findOrFail($id);
        $class->delete();

        return redirect()->route('classes.index')->with('success', 'Class deleted successfully.');
    }
}
