<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Notification;
use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;


class SolutionController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $solutions = Solution::query()
            ->join('notifications', 'solutions.notification_id', '=', 'notifications.id')
            ->join('domains', 'notifications.domain_id', '=', 'domains.id')
            ->join('servers', 'domains.server_id', '=', 'servers.id')
            ->select('solutions.*', 'notifications.description as notification_description', 'domains.name AS domain_name',
                'servers.name AS server_name', 'domains.url AS domain_url', 'notifications.status AS notification_status',
                'notifications.is_done AS notification_is_done');

        if (auth()->user()->is_admin != 1) {
            $solutions = $solutions->where('servers.unit_id', auth()->user()->unit_id);
        }

        if ($search) {
            $solutions = $solutions->where('solutions.id', 'like', "%$search%")
                ->orWhere('solutions.description', 'like', "%$search%")
                ->orWhere('domains.name', 'like', "%$search%")
                ->orWhere('domains.url', 'like', "%$search%")
                ->orWhere('notifications.status', 'like', "%$search%")
                ->orWhere('solutions.status', 'like', "%$search%")
                ->orWhere('solutions.target_date', 'like', "%$search%")
                ->orWhere('solutions.date_of_solution', 'like', "%$search%");
        }

        $solutions = $solutions->paginate(8);

        return view('dashboard.solutions.index', compact('solutions'));
    }

    public function create(): View
    {
        $notifications = Notification::whereHas('domain.server', function ($query) {
            $query->where('unit_id', auth()->user()->unit_id);
        })->where('is_done', '0')->get();

        return view('dashboard.solutions.create', compact('notifications'));
    }

    public function store(): RedirectResponse
    {
        $attributes = request()->validate([
            'status' => 'required',
            'description' => 'required|string|max:255',
            'target_date' => 'required|date|after_or_equal:today',
            'notification_id' => 'required',
        ]);

        // current date if status 'done'
        if (request('status') == 'Done') {
            $date_of_solution = $this->getCurrentDate();

            $notification = Notification::find($attributes['notification_id']);

            $notification->update([
                'is_done' => '1',
            ]);
        }

        Solution::create([
            'status' => $attributes['status'],
            'description' => $attributes['description'],
            'target_date' => $attributes['target_date'],
            'date_of_solution' => $date_of_solution ?? null,
            'notification_id' => $attributes['notification_id'],
        ]);

        return redirect(route('solutions'))->with('success', 'Solution created successfully.');
    }

    public function getCurrentDate(){
        $currentDate = date('Y-m-d');
        return $currentDate;
    }

    public function edit(Solution $solution): RedirectResponse
    {
        if (! Gate::allows('auth-solutions', $solution)) {
            return redirect (route('solutions'))->with('error', 'You dont have authorization to edit this!');
        }
        
        $notifications = Notification::whereHas('domain.server', function ($query) {
            $query->where('unit_id', auth()->user()->unit_id);
        })->where('is_done', '0')->get();

        return redirect()->route('dashboard.solutions.edit', compact('solution', 'notifications'));
    }

    public function update(Solution $solution){
        $attributes = request()->validate([
            'status' => 'required',
            'description' => 'required|string|max:255',
            'target_date' => 'required|date|after_or_equal:today',
            'notification_id' => 'required',
        ]);

        // current date if status 'done'
        if (request('status') == 'Done') {
            $date_of_solution = $this->getCurrentDate();

            $notification = Notification::find($attributes['notification_id']);

            $notification->update([
                'is_done' => '1',
            ]);
        }

        $solution->update([
            'status' => $attributes['status'],
            'description' => $attributes['description'],
            'target_date' => $attributes['target_date'],
            'date_of_solution' => $date_of_solution ?? null,
            'notification_id' => $attributes['notification_id'],
        ]);

        return redirect(route('solutions'))->with('success', 'Solution updated successfully.');
    }

    public function destroy(Solution $solution): RedirectResponse
    {
        if (! Gate::allows('auth-solutions', $solution)) {
            return redirect (route('solutions'))->with('error', 'You dont have authorization to delete this!');
        }

        $solution->delete();

        return redirect(route('solutions'))->with('success', 'Solution deleted successfully.');
    }

    public function marksAsDone(Solution $solution): RedirectResponse
    {
        if (! Gate::allows('auth-solutions', $solution)) {
            return redirect (route('solutions'))->with('error', 'You dont have authorization to marks as done this!');
        }

        $solution->update([
            'status' => 'Done',
            'date_of_solution' => $this->getCurrentDate(),
        ]);

        $notification = Notification::find($solution->notification_id);

        $notification->update([
            'is_done' => '1',
        ]);

        return redirect(route('solutions'))->with('success', 'Solution marked as done successfully.');
    }
}
