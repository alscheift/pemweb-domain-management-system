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
            ->select('notifications.*', 'domains.name AS domain_name');

        if ($search) {
            $notifications = $notifications->where('id', 'like', "%$search%")
                ->orWhere('domain_id', 'like', "%$search%")
                ->orWhere('domain_name', 'like', "%$search%")
                ->orWhere('status', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%")
                ->orWhere('created_at', 'like', "%$search%");
        }

        $notifications = $notifications->paginate(7);

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
}
