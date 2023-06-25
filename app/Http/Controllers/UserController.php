<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        return view('dashboard.users.index');
    }

    public function store(): RedirectResponse
    {
        $attributes = request()->validate([
            'username' => 'required',
            'password' => 'required',

            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|phone',
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
            'phone' => 'required|phone',
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
}
