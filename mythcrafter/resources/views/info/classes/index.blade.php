@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Classes</h1>

@can('admin')
<a href="{{ route('admin.classes.create') }}"
    class="inline-block mb-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
    Add New Class
</a>
@endcan

@if($classes->isEmpty())
<p class="text-gray-500">No available classes.</p>
@else
<ul class="list-disc pl-5 space-y-2">
    @foreach($classes as $class)
    <li class="flex justify-between items-center">
        <a href="{{ route('classes.show', $class->id) }}" class="text-blue-700 hover:underline">
            {{ $class->name }}
        </a>
    </li>
    @endforeach
</ul>
@endif
@auth
@php $user = Auth::user(); @endphp
@if($user->role === 'admin')
<div class="mt-6">
    <ul class="list-disc pl-5 space-y-2">
        <li>
            <a href="{{ route('admin.classes.create') }}" class="text-blue-600 hover:underline">
                Add New Class
            </a>
        </li>
    </ul>
</div>
@endif
@endauth
@endsection

