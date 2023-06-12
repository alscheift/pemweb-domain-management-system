<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class SessionsController extends Controller
{

    public function create(): View
    {
        return view('sessions.create');
    }

    /**
     * @throws ValidationException
     */
    public function store(): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $attributes = request()->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'username' => 'Username atau password salah. Silahkan coba lagi.'
            ]);
        }


        session()->regenerate(); // session fixation
        return redirect('/')->with('success', 'Welcome Back!');
    }

    public function destroy(): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye!');
    }

    public function test(): View
    {
        return view('sessions.test');
    }
}
