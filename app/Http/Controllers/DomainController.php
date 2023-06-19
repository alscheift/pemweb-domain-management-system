<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DomainController extends Controller
{
    public function index(): View
    {
        return view('dashboard.domains.index');
    }

    public function store(): RedirectResponse
    {
        $attributes = request()->validate([
            'url' => 'required',
            'name' => 'required',
            'description' => 'required',
            'application_type' => 'required',
            'port' => 'required',
            'http_status' => 'required',
            'server_id' => 'required',
        ]);

        Domain::create($attributes);

        return redirect(route('domains'))->with('success', 'Domain berhasil ditambahkan');
    }

    public function create(): View
    {
        return view('dashboard.domains.create');
    }
}
