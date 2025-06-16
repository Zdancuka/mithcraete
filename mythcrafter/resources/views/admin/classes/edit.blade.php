@extends('layouts.app')

@section('title', 'Edit Class')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Class</h1>

    <form action="{{ route('admin.classes.update', $class->id) }}" method="POST" class="space-y-4" autocomplete="off">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block font-medium my-2">Name</label>
            <input type="text" name="name" id="name"
                class="w-full border border-black rounded px-3 py-2 bg-white text-black @error('name') border-red-600 @enderror"
                value="{{ old('name', $class->name) }}" required>
            @error('name')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div style="margin-top: 1rem;">
            <label for="description" class="block font-medium my-2">Description</label>
            <textarea name="description" id="description" rows="4"
                class="w-full border border-black rounded px-3 py-2 bg-white text-black @error('description') border-red-600 @enderror"
                required>{{ old('description', $class->description) }}</textarea>
            @error('description')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="hit_dice" class="block font-medium my-2">Hit Dice</label>
            <input type="text" name="hit_dice" id="hit_dice"
                class="w-full border border-black rounded px-3 py-2 bg-white text-black @error('hit_dice') border-red-600 @enderror"
                value="{{ old('hit_dice', $class->hit_dice) }}">
            @error('hit_dice')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="abilities" class="block font-medium my-2">Abilities (comma separated)</label>
            <input type="text" name="abilities" id="abilities"
                class="w-full border border-black rounded px-3 py-2 bg-white text-black @error('abilities') border-red-600 @enderror"
                value="{{ old('abilities', $class->abilities) }}"
                placeholder="e.g. Strength, Dexterity, Intelligence">
            @error('abilities')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <button type="submit"
            class="btn btn-dark px-4 py-2">
            Update Class
        </button>
    </form>
@endsection