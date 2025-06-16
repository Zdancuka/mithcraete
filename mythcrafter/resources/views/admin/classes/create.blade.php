@extends('layouts.app')

@section('title', 'Add New Class')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Add New Class</h1>

    <form action="{{ route('admin.classes.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block font-medium">Name</label>
            <input type="text" name="name" id="name"
                   class="w-full border rounded px-3 py-2 @error('name') border-red-500 @enderror"
                   value="{{ old('name') }}" required>
            @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="description" class="block font-medium">Description</label>
            <textarea name="description" id="description" rows="4"
                      class="w-full border rounded px-3 py-2 @error('description') border-red-500 @enderror"
                      required>{{ old('description') }}</textarea>
            @error('description')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="hit_dice" class="block font-medium">Hit Dice</label>
            <input type="text" name="hit_dice" id="hit_dice"
                   class="w-full border rounded px-3 py-2 @error('hit_dice') border-red-500 @enderror"
                   value="{{ old('hit_dice') }}">
            @error('hit_dice')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <label for="abilities" class="block font-medium">Abilities (comma separated)</label>
            <input type="text" name="abilities" id="abilities"
                   class="w-full border rounded px-3 py-2 @error('abilities') border-red-500 @enderror"
                   value="{{ old('abilities') }}"
                   placeholder="e.g. Strength, Dexterity, Intelligence">
            @error('abilities')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <button type="submit"
                class="btn btn-dark px-4 py-2">
            Create Class
        </button>
    </form>
@endsection
