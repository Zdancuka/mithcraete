@extends('layouts.app')
@section('title', 'Profile')

@section('content')
<div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-lg shadow-md text-black">
    <h1 class="text-3xl font-bold mb-6">Your Profile</h1>

    <ul class="mb-4 space-y-2">
        <li><strong>Username:</strong> {{ $user->name }}</li>
        <li><strong>Email:</strong> {{ $user->email }}</li>
        <li><strong>Registered at:</strong> {{ $user->created_at->format('d M Y') }}</li>
    </ul>

    <div class="flex space-x-2">
        <a href="{{ route('profile.edit') }}"
           class="bg-blue-600 text-black px-2 py-2 mx-2  my-2 rounded border border-black hover:bg-blue-700 transition no-underline">
            Edit Profile
        </a>

        <form action="{{ route('profile.destroy') }}" method="POST"
              onsubmit="return confirm('Are you sure you want to delete your profile? This action cannot be undone.')" class="">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="bg-red-600 text-black px-2 py-2 mx-2 my-2 rounded border border-black hover:bg-red-700 transition no-underline">
                Delete Profile
            </button>
        </form>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
@endsection
