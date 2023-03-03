<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserUpdateRequest;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all()->except(Auth::id());
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->validated());
        return to_route('admin.users.index')->with('message', 'Utilisateur mis à jour');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return to_route('admin.users.index')->with('message', 'Utilisateur supprimé');;
    }
}
