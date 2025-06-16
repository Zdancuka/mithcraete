@extends('layouts.app')

@section('title', 'Races')

@section('content')
<h1 class="text-2xl font-bold mb-4">Races</h1>

@can('admin')
<a href="{{ route('admin.races.create') }}"
    class="inline-block mb-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
    Add New Race
</a>
@endcan

@if($races->isEmpty())
<p class="text-gray-500">No races available.</p>
@else
<ul class="list-disc pl-6 space-y-2">
    @foreach($races as $race)
    <li class="flex justify-between items-center">
        <a href="{{ route('races.show', $race->id) }}" class="text-blue-700 hover:underline">
            {{ $race->name }}
        </a>
    </li>
    @endforeach
</ul>
@endif

@auth
@php $user = Auth::user(); @endphp
@if($user->role === 'admin')
<div class="mt-6">
    <ul class="list-disc pl-6 space-y-2">
        <li>
            <a href="{{ route('admin.races.create') }}" class="text-blue-600 hover:underline">
                Add New Race
            </a>
        </li>
    </ul>
</div>
@endif
@endauth
@endsection

