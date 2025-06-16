@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Create Spell</h1>

<form method="POST" action="{{ route('spells.store') }}">
    @csrf
    @include('admin.spells.partials.form')
    <button type="submit" class="btn btn-primary">Create</button>
</form>
@endsection
