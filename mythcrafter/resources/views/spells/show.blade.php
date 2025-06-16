@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h1 class="text-3xl font-bold mb-4">{{ $spell->name }}</h1>

        <ul class="mb-4 space-y-1">
            <li><strong>Level:</strong> {{ $spell->level }}</li>
            <li><strong>School:</strong> {{ $spell->school ?? 'Unknown' }}</li>
            <li><strong>Components:</strong> {{ $spell->components ?? 'Unknown' }}</li>
            <li><strong>Casting Time:</strong> {{ $spell->casting_time ?? 'Unknown' }}</li>
        </ul>

        @if($spell->description)
            <h2 class="mt-6 font-semibold text-xl">Description</h2>
            <p class="mt-2">{{ $spell->description }}</p>
        @else
            <p class="italic text-gray-500">No description available.</p>
        @endif

        @if(auth()->check() && auth()->user()->role === 'admin')
            <div class="flex space-x-4 mt-6">
                <a href="{{ route('admin.spells.edit', $spell->id) }}" 
                   class="text-black px-3 py-1 border border-black m-2 rounded hover:bg-gray-100">
                    Edit
                </a>

                <form action="{{ route('admin.spells.destroy', $spell->id) }}" method="POST" 
                      onsubmit="return confirm('Are you sure you want to delete this spell?');" 
                      class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="text-black px-3 py-1 border border-black m-2 rounded hover:bg-gray-100">
                        Delete
                    </button>
                </form>
            </div>
        @endif

        <a href="{{ route('spells.index', $filters) }}" 
           class="mt-6 inline-block text-black hover:underline">
            &larr; Back to Spell List
        </a>
    </div>
@endsection
