<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spell;


class SpellController extends Controller
{
    public function index(Request $request)
    {
        $query = Spell::query();

        // Применение фильтров
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('level')) {
            $query->where('level', $request->level);
        }

        if ($request->filled('casting_time')) {
            $query->where('casting_time', $request->casting_time);
        }

        if ($request->filled('components')) {
            $query->where('components', $request->components);
        }

        if ($request->filled('school')) {
            $query->where('school', $request->school);
        }

        // Пагинация
        $spells = $query->paginate(20);

        $levels = Spell::select('level')->distinct()->orderBy('level')->pluck('level');

        $castingTimes = Spell::select('casting_time')
            ->whereNotNull('casting_time')
            ->distinct()
            ->orderBy('casting_time')
            ->pluck('casting_time');

        $components = Spell::select('components')
            ->whereNotNull('components')
            ->distinct()
            ->orderBy('components')
            ->pluck('components');

        $schools = Spell::select('school')
            ->whereNotNull('school')
            ->distinct()
            ->orderBy('school')
            ->pluck('school');

        return view('spells.index', compact('spells', 'castingTimes', 'components', 'schools', 'levels'));
    }

    /**
     * Display the specified spell.
     *
     * @param  \App\Models\Spell  $spell
     * @return \Illuminate\View\View
     */
public function show(Spell $spell, Request $request)
{
    $filters = $request->query(); // Получаем все параметры запроса (фильтры)
    return view('spells.show', compact('spell', 'filters'));
}

    public function store(Request $request)
    {
        // Валидация данных
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|integer|min:0',
            'school' => 'nullable|string|max:255',
            'components' => 'nullable|string|max:255',
            'casting_time' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Создаем новое заклинание
        Spell::create($validated);

        // Перенаправляем, например, на список заклинаний с сообщением
        return redirect()->route('spells.index')->with('success', 'Spell created successfully.');
    }

        public function create()
    {
        return view('spells.create');
    }

}
