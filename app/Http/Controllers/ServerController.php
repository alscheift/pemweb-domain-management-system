<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class ServerController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $servers = Server::query();

        if(auth()->user()->is_admin != 1){
            $servers = $servers->where('unit_id', auth()->user()->unit_id);
        }

        if($search) {
            $servers = Server::where('id', 'like', "%$search%")
                ->orWhere('name', 'like', "%$search%")
                ->orWhere('server_type', 'like', "%$search%")
                ->orWhere('status', 'like', "%$search%")
                ->orWhere('ip_address', 'like', "%$search%")
                ->orWhere('processor', 'like', "%$search%")
                ->orWhere('core_processor_count', 'like', "%$search%")
                ->orWhere('ram', 'like', "%$search%")
                ->orWhere('unit_id', 'like', "%$search%");
        }

        $servers = $servers->paginate(8);

        return view('dashboard.servers.index', compact('servers'));
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

    public function edit(Server $server): View | RedirectResponse
    {
        if (!Gate::allows('auth-servers', $server)) {
            return redirect(route('servers'))->with('error', 'You dont have authorization to edit this!');
        }

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
        if (!Gate::allows('auth-servers', $server)) {
            return redirect(route('servers'))->with('error', 'You dont have authorization to delete this!');
        }

        if($server->domains()->exists()){
            return redirect(route('servers'))->with('error', 'Server cannot be deleted because it has domains');
        }
        
        $server->delete();

        return redirect(route('servers'))->with('success', 'Server deleted successfully');
    }
}
