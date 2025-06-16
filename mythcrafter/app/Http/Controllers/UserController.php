<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Или с пагинацией: User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $authUser = Auth::user();

        // Только админ может редактировать любого пользователя
        if ($authUser->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        return view('admin.users.edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $authUser = Auth::user();

        if ($authUser->role !== 'admin' && $authUser->id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string|in:user,admin',
        ]);

        $user->update($data);

        return redirect()->route('admin.users.index')->with('status', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $authUser = Auth::user();

        $user->characters()->delete();

        $user->delete();

        if ($authUser->id === $user->id) {
            Auth::logout();
            return redirect('/')->with('status', 'Your account has been deleted.');
        }

        return redirect()->back()->with('status', 'User deleted successfully.');
    }
}
