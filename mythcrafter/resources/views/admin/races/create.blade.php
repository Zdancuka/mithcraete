@extends('layouts.app')

@section('content')
<div class="bg-white text-black p-6 max-w-md mx-auto">
    <h1 class="text-2xl font-bold mb-4">Create Race</h1>

    <form action="{{ route('admin.races.store') }}" method="POST" class="space-y-4" autocomplete="off" novalidate>
        @csrf

        <div class="mb-2">
            <label for="name" class="block font-semibold mb-1">Name</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}"
                   class="w-full border border-black rounded p-2 bg-white text-black @error('name') border-red-600 @enderror" autocomplete="name">
            @error('name')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="mb-2">
            <label for="description" class="block font-semibold mb-1">Description</label>
            <textarea id="description" name="description"
                      class="w-full border border-black rounded p-2 bg-white text-black @error('description') border-red-600 @enderror" autocomplete="off">{{ old('description') }}</textarea>
            @error('description')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <button type="submit" class="btn btn-dark px-4 py-2">
            Create
        </button>
    </form>
</div>
@endsection
