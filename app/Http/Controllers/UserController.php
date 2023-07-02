<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $users = User::query()->where('is_admin', false);

        if ($search) {
            $users = User::where('id', 'like', "%$search%")
                ->orWhere('username', 'like', "%$search%")
                ->orWhere('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('phone', 'like', "%$search%");
        }

        $users = $users->paginate(8);

        return view('dashboard.users.index', compact('users'));
    }

    public function store(): RedirectResponse
    {
        $attributes = request()->validate([
            'username' => 'required',
            'password' => 'required',

            'name' => 'required',
            'email' => 'required|email',
            'phone' => ['required', 'regex:/^(\+62)\d{10,12}$/'],
            'unit_id' => ''
        ]);

        User::create($attributes);

        return redirect(route('users'))->with('success', 'User added successfully');
    }

    public function create(): View
    {
        return view('dashboard.users.create');
    }

    public function edit(User $user): View
    {
        return view('dashboard.users.edit', compact('user'));
    }

    public function update(User $user): RedirectResponse
    {
        $attributes = request()->validate([
            'username' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => ['required', 'regex:/^(\+62)\d{10,12}$/'],
            'unit_id' => ''
        ]);

        $user->update($attributes);

        return redirect(route('users'))->with('success', 'User updated successfully');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect(route('users'))->with('success', 'User deleted successfully');
    }

    public function profile(User $user): View
    {
        $user = auth()->user();
        return view('profile.index', compact('user'));
    }

    public function profileEdit(User $user): View
    {
        return view('profile.edit', compact('user'));
    }

    public function profileUpdate(User $user): RedirectResponse
    {
        $attributes = request()->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'phone' => ['required', 'regex:/^(\+62)\d{10,12}$/'],
            'password' => 'required',
        ]);

        $attributes['password'] = Hash::make($attributes['password']);
        
        $user->update($attributes);

        return redirect(route('profile'))->with('success', 'Profile updated successfully');
    }
}
