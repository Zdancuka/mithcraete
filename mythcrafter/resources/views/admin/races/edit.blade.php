@extends('layouts.app')

@section('content')
<div class="bg-white text-black p-6 max-w-md mx-auto">
    <h1 class="text-2xl font-bold mb-4">Edit Race: {{ $race->name }}</h1>

    <form action="{{ route('admin.races.update', $race) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 1rem;">
            <label for="name" class="block font-semibold my-2">Name</label>
            <input id="name" name="name" type="text" value="{{ old('name', $race->name) }}"
                   class="w-full border border-black rounded p-2 bg-white text-black @error('name') border-red-600 @enderror">
            @error('name')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="description" class="block font-semibold my-2">Description</label>
            <textarea id="description" name="description"
                      class="w-full border border-black rounded p-2 bg-white text-black @error('description') border-red-600 @enderror">{{ old('description', $race->description) }}</textarea>
            @error('description')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <button type="submit" class="btn btn-dark px-4 py-2">
            Update
        </button>
    </form>
</div>
@endsection
