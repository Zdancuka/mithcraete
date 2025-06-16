@extends('layouts.app')
@section('title', 'Edit User')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit User</h1>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="max-w-md">
        @csrf
        @method('PUT')

        <label class="block mb-2">
            Name:
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-input mt-1 block w-full">
            @error('name') <div class="text-red-600">{{ $message }}</div> @enderror
        </label>

        <label class="block mb-2">
            Email:
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-input mt-1 block w-full">
            @error('email') <div class="text-red-600">{{ $message }}</div> @enderror
        </label>

        <label class="block mb-4">
            Role:
            <select name="role" class="form-select mt-1 block w-full">
                <option value="user" @if(old('role', $user->role) === 'user') selected @endif>User</option>
                <option value="admin" @if(old('role', $user->role) === 'admin') selected @endif>Admin</option>
            </select>
            @error('role') <div class="text-red-600">{{ $message }}</div> @enderror
        </label>

        <button type="submit" class="btn btn-dark px-4 py-2">
            Save
        </button>

        <a href="{{ route('admin.users.index') }}" class="ml-4 text-gray-600 hover:underline">
            Cancel
        </a>
    </form>
@endsection
