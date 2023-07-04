<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NotificationController extends Controller
{
    public function index(Request $request) : View
    {
        $search = $request->input('search');
        $notifications = Notification::query()
            ->join('domains', 'notifications.domain_id', '=', 'domains.id')
            ->join('servers', 'domains.server_id', '=', 'servers.id')
            ->select('notifications.*', 'domains.name AS domain_name', 'servers.name AS server_name');

        if (auth()->user()->is_admin != 1) {
            $notifications = $notifications->where('servers.unit_id', auth()->user()->unit_id);
        }

        if ($search) {
            $notifications = $notifications->where('notifications.id', 'like', "%$search%")
                ->orWhere('notifications.domain_id', 'like', "%$search%")
                ->orWhere('domains.name', 'like', "%$search%")
                ->orWhere('servers.name', 'like', "%$search%")
                ->orWhere('notifications.status', 'like', "%$search%")
                ->orWhere('notifications.description', 'like', "%$search%")
                ->orWhere('notifications.created_at', 'like', "%$search%");
        }

        $notifications = $notifications->paginate(8);

        return view('dashboard.notifications.index', compact('notifications'));
    }

    public function create()
    {
        return view('dashboard.notifications.create');
    }

    public function store(): RedirectResponse
    {
        $attributes = request()->validate([
            'domain_id' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);

        Notification::create($attributes);

        return redirect(route('notifications'))->with('success', 'Notification added successfully');
    }

    public function edit(Notification $notification): View
    {
        return view('dashboard.notifications.edit', compact('notification'));
    }

    public function update(Notification $notification): RedirectResponse
    {
        $attributes = request()->validate([
            'domain_id' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);

        $notification->update($attributes);

        return redirect(route('notifications'))->with('success', 'Notification updated successfully');
    }

    public function destroy(Notification $notification): RedirectResponse
    {
        if($notification->solutions()->exists()) {
            return redirect(route('notifications'))->with('error', 'Notification cannot be deleted because it has solutions');
        }

        $notification->delete();

        return redirect(route('notifications'))->with('success', 'Notification deleted successfully');
    }
}
