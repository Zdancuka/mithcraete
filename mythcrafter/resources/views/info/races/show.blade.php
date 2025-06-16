@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-4">{{ $race->name }}</h1>

<p><strong>Description:</strong> {{ $race->description }}</p>


@auth
@php $user = Auth::user(); @endphp
@if($user->role === 'admin')
<div class="flex space-x-4 mb-4">
    <a href="{{ route('admin.races.edit', $race->id) }}"
        class="px-3 py-1 my-2 border border-black rounded bg-white text-black no-underline hover:bg-gray-100 ">
        Edit
    </a>

    <form action="{{ route('admin.races.destroy', $race->id) }}"
        method="POST"
        onsubmit="return confirm('Are you sure you want to delete this race?');"
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
<a href="{{ route('races.index') }}" class="text-blue-600 hover:underline">&larr; Back to race list</a>
@endsection