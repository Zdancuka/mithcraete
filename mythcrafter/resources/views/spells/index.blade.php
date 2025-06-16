@extends('layouts.app')

@section('content')
<h1 class="mb-4">Spell List</h1>

@auth
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('admin.spells.create') }}" 
           class="inline-block mb-4 py-2 bg-blue-600 text-black rounded hover:bg-blue-700">
            + New Spell
        </a>
    @endif
@endauth

<form action="{{ route('spells.index') }}" method="GET" class="mb-4 d-flex gap-2 flex-wrap align-items-center">
    <input type="text" name="name" placeholder="Name" value="{{ request('name') }}" class="form-control" style="max-width: 200px;">

    <select name="level" class="form-select" style="max-width: 150px;">
        <option value="" @if(request('level')===null || request('level')==='' ) selected @endif>All Levels</option>
        @foreach($levels as $level)
        <option value="{{ $level }}" @if((string)request('level')===(string)$level) selected @endif>Level {{ $level }}</option>
        @endforeach
    </select>


    <select name="casting_time" class="form-select" style="max-width: 180px;">
        <option value="" @if(request('casting_time')===null || request('casting_time')==='' ) selected @endif>All Casting Times</option>
        @foreach($castingTimes as $time)
        <option value="{{ $time }}" @if(request('casting_time')===$time) selected @endif>{{ $time }}</option>
        @endforeach
    </select>

    <select name="components" class="form-select" style="max-width: 180px;">
        <option value="" @if(request('components')===null || request('components')==='' ) selected @endif>All Components</option>
        @foreach($components as $component)
        <option value="{{ $component }}" @if(request('components')===$component) selected @endif>{{ $component }}</option>
        @endforeach
    </select>

    <select name="school" class="form-select" style="max-width: 180px;">
        <option value="" @if(request('school')===null || request('school')==='' ) selected @endif>All Schools</option>
        @foreach($schools as $school)
        <option value="{{ $school }}" @if(request('school')===$school) selected @endif>{{ $school }}</option>
        @endforeach
    </select>


    <button type="submit" class="btn" style="background-color:rgb(167, 137, 82); color: black;">Filter</button>
</form>

@if($spells->isEmpty())
@if(request()->has('name') || request()->has('level'))
<p>No spells match your filter.</p>
@else
<p>No spells available.</p>
@endif
@else
<ul class="list-group mb-3">
    @foreach($spells as $spell)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="{{ route('spells.show', ['spell' => $spell->id] + request()->query()) }}" class="text-dark">{{ $spell->name }}</a>
        <span class="badge bg-secondary">Level {{ $spell->level }}</span>
    </li>
    @endforeach
</ul>

{{ $spells->appends(request()->except('page'))->links('pagination::bootstrap-5') }}
@endif

@if(session('message'))
<div class="alert alert-success mt-3">
    {{ session('message') }}
</div>
@endif
@endsection