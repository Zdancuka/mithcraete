@extends('layouts.app')

@section('content')
<div class="bg-white text-black p-6  max-w-2xl mx-auto">
    <h1 class="text-3xl font-bold mb-4">{{ $class->name }}</h1>

    <p class="mb-2"><strong>Description:</strong> {{ $class->description }}</p>

    @if($class->hit_dice)
    <p class="mb-2"><strong>Hit Die:</strong> {{ $class->hit_dice }}</p>
    @endif

    @if($class->abilities)
    <p class="font-semibold">Core Abilities:</p>
    <ul class="list-disc list-inside mb-4">
        @foreach(explode(',', $class->abilities) as $ability)
        <li>{{ trim($ability) }}</li>
        @endforeach
    </ul>
    @endif


    @auth
    @php $user = Auth::user(); @endphp
    @if($user->role === 'admin')
    <div class="flex space-x-4 mb-4">
        <a href="{{ route('admin.classes.edit', $class->id) }}"
            class="px-3 py-1 my-2 border border-black rounded bg-white text-black no-underline hover:bg-gray-100 ">
            Edit
        </a>

        <form action="{{ route('admin.classes.destroy', $class->id) }}"
            method="POST"
            onsubmit="return confirm('Are you sure you want to delete this class?');"
            class="inline">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="px-3 py-1 my-2 border border-black rounded bg-white text-black no-underline hover:bg-gray-100">
                Delete
            </button>
        </form>
    </div>
    @endif
    @endauth
    <a href="{{ route('classes.index') }}"
        class="inline-block px-3 py-1 bg-white text-black no-underline hover:bg-gray-100">
        &larr; Back to class list
    </a>
</div>
@endsection