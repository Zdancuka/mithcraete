<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InfoController;
use App\Http\Controllers\SpellController;
use App\Http\Controllers\CharacterController;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\RaceController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\SpellController as AdminSpellController;

use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Auth\GoogleController;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Http\Request;

Route::get('auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('auth.google');

Route::get('auth/google/callback', function (Request $request) {
    $googleUser = Socialite::driver('google')->user();

    $user = User::firstOrCreate(
        ['email' => $googleUser->getEmail()],
        ['name' => $googleUser->getName(), 'password' => bcrypt(str()->random(16))]
    );

    Auth::login($user, true);

    return redirect()->intended('/profile');
})->name('auth.google.callback');

Route::get('/', function () {
    return view('home');
});


Route::view('/data-removal', 'data-removal');

Route::get('/classes', [InfoController::class, 'classesIndex'])->name('classes.index');
Route::get('/classes/{id}', [InfoController::class, 'showClass'])->name('classes.show');

Route::get('/races', [InfoController::class, 'racesIndex'])->name('races.index');
Route::get('/races/{id}', [InfoController::class, 'showRace'])->name('races.show');

Route::get('/license', [InfoController::class, 'license'])->name('license');

Route::get('/spells', [SpellController::class, 'index'])->name('spells.index');
Route::get('/spells/{spell}', [SpellController::class, 'show'])->name('spells.show');

Route::get('/auth', function () {
    return view('auth.choice');
})->name('auth.choice');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

    Route::prefix('admin')->name('admin.')->group(function () {
        // Classes admin routes
        Route::get('/classes/{class}/edit', [ClassController::class, 'edit'])->name('classes.edit');
        Route::put('/classes/{class}', [ClassController::class, 'update'])->name('classes.update');
        Route::delete('/classes/{class}', [ClassController::class, 'destroy'])->name('classes.destroy');
        Route::get('/classes/create', [ClassController::class, 'create'])->name('classes.create');
        Route::post('/classes', [ClassController::class, 'store'])->name('classes.store');

        // Races admin routes
        Route::get('/races/{race}/edit', [RaceController::class, 'edit'])->name('races.edit');
        Route::put('/races/{race}', [RaceController::class, 'update'])->name('races.update');
        Route::delete('/races/{race}', [RaceController::class, 'destroy'])->name('races.destroy');
        Route::get('/races/create', [RaceController::class, 'create'])->name('races.create');
        Route::post('/races', [RaceController::class, 'store'])->name('races.store');

        // Spells admin routes

    });

    Route::get('admin/spells/{spell}/edit', [AdminSpellController::class, 'edit'])->name('admin.spells.edit');
    Route::put('admin/spells/{spell}', [AdminSpellController::class, 'update'])->name('spells.update');
    Route::delete('admin/spells/{spell}', [AdminSpellController::class, 'destroy'])->name('admin.spells.destroy');
    Route::resource('characters', CharacterController::class)->except(['edit', 'update']);
    Route::get('/admin/spells/create', [AdminSpellController::class, 'create'])->name('admin.spells.create');
    Route::post('spells', [SpellController::class, 'store'])->name('spells.store');

    // Раздельно edit и update (если нужно)
    Route::get('/characters/{character}/edit', [CharacterController::class, 'edit'])->name('characters.edit');
    Route::put('/characters/{character}', [CharacterController::class, 'update'])->name('characters.update');
    Route::get('/characters/{character}', [CharacterController::class, 'show'])->name('characters.show');
    Route::get('/characters', [CharacterController::class, 'index'])->name('characters.index');
    Route::post('/characters/{character}/spells', [CharacterController::class, 'add'])->name('characters.spells.add');
    Route::delete('/characters/{character}/spells/{spell}', [CharacterController::class, 'remove'])->name('characters.spells.remove');

    Route::get('/my-characters', [CharacterController::class, 'myCharacters'])->name('characters.my');

    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/characters/create', [CharacterController::class, 'create'])->name('characters.create');
    Route::post('/characters', [CharacterController::class, 'store'])->name('characters.store');
});
