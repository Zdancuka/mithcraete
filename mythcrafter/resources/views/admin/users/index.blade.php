@extends('layouts.app')
@section('title', 'User Management')

@section('content')
    <h1 class="text-2xl font-bold mb-4">User Management</h1>

    <table class="table-auto w-full bg-white overflow-hidden">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2 text-left">ID</th>
                <th class="px-4 py-2 text-left">Name</th>
                <th class="px-4 py-2 text-left">Email</th>
                <th class="px-4 py-2 text-left">Role</th>
                <th class="px-4 py-2 text-left">Actions</th> {{-- Колонка для кнопок --}}
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr class="@if($loop->even) bg-gray-50 @endif hover:bg-gray-100 border-t">
                    <td class="px-4 py-2">{{ $user->id }}</td>
                    <td class="px-4 py-2">{{ $user->name }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                    <td class="px-4 py-2 capitalize">{{ $user->role }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('admin.users.edit', $user->id) }}"
                           class="text-blue-600 hover:underline">Edit</a>

                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline"
                              onsubmit="return confirm('Are you sure you want to delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-dark">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
