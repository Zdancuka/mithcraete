@extends('layouts.app')

@section('title', 'Login')

@section('content')
<h1 class="text-3xl font-bold mb-6 text-black">Login</h1>

<form method="POST" action="{{ route('login') }}" class="max-w-md mx-auto bg-white p-6  shadow-md text-black">
    @csrf

    <div class="mb-4">
        <label for="login" class="block mb-1 font-semibold">Email or Username</label>
        <input type="text" id="login" name="login" value="{{ old('login') }}" required autofocus
               class="w-full border border-black rounded px-3 py-2 text-black bg-white">
        @error('login')<div class="text-red-600 mt-1">{{ $message }}</div>@enderror
    </div>

    <div class="mb-4">
        <label for="password" class="block mb-1 font-semibold">Password</label>
        <input type="password" id="password" name="password" required
               class="w-full border border-black rounded px-3 py-2 text-black bg-white">
        @error('password')<div class="text-red-600 mt-1">{{ $message }}</div>@enderror
    </div>

    <button type="submit" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800 transition">
        Login
    </button>

    <div class="max-w-md mx-auto mt-6">
    <a href="{{ route('auth.google') }}"
       class="w-full inline-block bg-red-600 text-white text-center py-2 rounded hover:bg-red-700 transition">
        Login with Google
    </a>
</div>
</form>
@endsection
