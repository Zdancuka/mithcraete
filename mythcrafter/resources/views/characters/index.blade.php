@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">My Characters</h1>

<!-- Create Button -->
<div class="mb-4">
    <a href="{{ route('characters.create') }}"
       class="inline-block bg-=primary text-black  rounded hover:bg-primary-dark transition-colors">
        + Create New Character
    </a>
</div>

@if($characters->isEmpty())
<p class="text-gray-500">You have not created any characters yet.</p>
@else



<div>
    @foreach($characters as $character)
    <div class="card border rounded">
        <div class="card-body">
            <a href="{{ route('characters.show', $character->id) }}" class="text-black">
                {{ $character->name }}
            </a>
            <p class="text-sm text-gray-500 m-0">
                Race: {{ $character->race->name ?? 'Unknown' }}, Class: {{ $character->class->name ?? 'Unknown' }}
            </p>
        </div>
        <div class="flex items-center space-x-2">
            <a href="{{ route('characters.edit', $character->id) }}" class="btn btn-primary px-3 py-1 rounded">
                Edit
            </a>

            <form action="{{ route('characters.destroy', $character->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this character?');" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger px-3 py-1 rounded">
                    Delete
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>

@endif
@endsection

<style>
    .card+.card {
        margin-top: 1rem;
    }

    .card {
        padding: 1rem;
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
    }

    .card-body {
        padding: 1rem;
    }

    .btn {
        display: inline-block;
        padding: 0.5rem 1rem;
        font-size: 1rem;
        color: #fff;
        border: none;
        border-radius: 0.25rem;
        cursor: pointer;
    }

    form {
        margin: 0;
    }
</style>