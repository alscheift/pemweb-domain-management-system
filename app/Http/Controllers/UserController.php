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
        return view('dashboard.admin.users.index');
    }

    public function create(): View
    {
        return view('dashboard.admin.users.create');
    }

    public function store(): RedirectResponse
    {
        $attributes = request()->validate([
            'username' => 'required',
            'password' => 'required',

            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'unit_id' => ''
        ]);

        User::create($attributes);

        return redirect(route('users'))->with('success', 'User berhasil ditambahkan');
    }
}
