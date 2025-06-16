<?php

namespace App\Http\Controllers;

use App\Models\GameClass;
use App\Models\Race;

class InfoController extends Controller
{
    public function classesIndex()
    {
        $classes = GameClass::all();
        return view('info.classes.index', ['classes' => $classes]);
    }

    public function showClass($id)
    {
        $class = GameClass::findOrFail($id);
        return view('info.classes.show', ['class' => $class]);
    }

    public function racesIndex()
    {
        $races = Race::all();
        return view('info.races.index', ['races' => $races]);
    }

    public function showRace($id)
    {
        $race = Race::findOrFail($id);
        return view('info.races.show', ['race' => $race]);
    }

    public function license()
    {
        return view('info.license');
    }

    
}