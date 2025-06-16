@extends('layouts.app')
@section('title', 'Edit Profile')

@section('content')
<div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-lg shadow-md text-black">
    <h1 class="text-3xl font-bold mb-6">Edit Profile</h1>

    @if(session('status'))
        <div class="mb-4 text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name" class="block mb-1 font-semibold">Username:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required
               class="w-full border border-black rounded px-3 py-2 mb-3 text-black bg-white">

        <label for="email" class="block mb-1 font-semibold">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required
               class="w-full border border-black rounded px-3 py-2 mb-3 text-black bg-white">

        <label for="password" class="block mb-1 font-semibold">New Password (optional):</label>
        <input type="password" name="password" id="password" 
               class="w-full border border-black rounded px-3 py-2 mb-3 text-black bg-white">

        <label for="password_confirmation" class="block mb-1 font-semibold">Confirm Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation"
               class="w-full border border-black rounded px-3 py-2 mb-3 text-black bg-white">

        <button type="submit" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800 transition">
            Save Changes
        </button>
    </form>
</div>
@endsection
