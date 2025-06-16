@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-3xl font-bold mb-6">Register</h1>

    <form method="POST" action="{{ route('register') }}" novalidate>
        @csrf

        <div class="mb-4">
            <label for="name" class="block mb-1 font-semibold">Username</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block mb-1 font-semibold">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
            @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block mb-1 font-semibold">Password</label>
            <input id="password" name="password" type="password" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
            @error('password')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="block mb-1 font-semibold">Confirm Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
        </div>

        <button type="submit" class="w-full bg-black text-white font-semibold py-2 rounded hover:bg-gray-800 transition">
            Register
        </button>
    </form>

    <div class="mt-6r">
        <p class="mb-2">or register with</p>
        <a href="{{ route('auth.google') }}" 
           class="inline-block bg-red-600 border border-black rounded text-black px-4 py-2 rounded hover:bg-red-700 transition">
            Google
        </a>
    </div>
</div>
@endsection
