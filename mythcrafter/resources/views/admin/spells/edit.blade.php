@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Spell</h1>

<form method="POST" action="{{ route('spells.update', $spell) }}">
    @csrf
    @method('PUT')
    @include('admin.spells.partials.form', ['spell' => $spell])
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
