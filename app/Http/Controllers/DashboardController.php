<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Notification;
use App\Models\Server;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {

        if (auth()->user()->can('admin')) {
            $servers = Server::all();
            $domains = Domain::all();
            $units = Unit::all();
            $pics = User::where('is_admin', false)->get();
            $notifications = Notification::where('is_done', false)->get();

            return view('dashboard.index', compact('servers', 'domains', 'units', 'pics', 'notifications'));
        } else {
            $servers = Server::where('unit_id', auth()->user()->id)->get();
            $domains = Domain::with('server')
                ->whereHas('server', function ($query) {
                    $query->where('unit_id', auth()->user()->unit->id);
                });
            $notifications = Notification::with('domain')
                ->whereHas('domain', function ($query) {
                    $query->whereHas('server', function ($query) {
                        $query->where('unit_id', auth()->user()->unit->id);
                    });
                })->where('is_done', false)->get();

            return view('dashboard.index', compact('servers', 'domains', 'notifications'));
        }
    }
}
