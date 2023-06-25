<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServerController extends Controller
{
    public function index(): View
    {
        return view('dashboard.servers.index');
    }

    public function store(): RedirectResponse
    {
        $attributes = request()->validate([
            'name' => 'required',
            'server_type' => 'required',
            'status' => 'required',
            'ip_address' => 'required',
            'processor' => 'required',
            'core_processor_count' => 'required | numeric | min:1',
            'ram' => 'required | numeric | min:1',
            'unit_id' => 'required',
        ]);

        Server::create($attributes);

        return redirect(route('servers'))->with('success', 'Server added successfully');
    }

    public function create(): View
    {
        return view('dashboard.servers.create');
    }

    public function edit(Server $server): View
    {
        return view('dashboard.servers.edit', compact('server'));
    }

    public function update(Server $server): RedirectResponse
    {
        $attributes = request()->validate([
            'name' => 'required',
            'server_type' => 'required',
            'status' => 'required',
            'ip_address' => 'required',
            'processor' => 'required',
            'core_processor_count' => 'required | numeric | min:1',
            'ram' => 'required | numeric | min:1',
            'unit_id' => 'required',
        ]);

        $server->update($attributes);

        return redirect(route('servers'))->with('success', 'Server updated successfully');
    }

    public function destroy(Server $server): RedirectResponse
    {
        $server->delete();

        return redirect(route('servers'))->with('success', 'Server deleted successfully');
    }
}
