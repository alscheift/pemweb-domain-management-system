<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UnitController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $units = Unit::query();

        if ($search) {
            $units = Unit::where('id', 'like', "%$search%")
                ->orWhere('name', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%")
                ->orWhere('higher_domain', 'like', "%$search%");
        }

        $units = $units->paginate(7);

        return view('dashboard.units.index', compact('units'));
    }

    public function store(): RedirectResponse
    {
        $attributes = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'higher_domain' => 'required',
        ]);

        Unit::create($attributes);

        return redirect(route('units'))->with('success', 'Unit added successfully');
    }

    public function create(): View
    {
        return view('dashboard.units.create');
    }

    public function edit(Unit $unit): View
    {
        return view('dashboard.units.edit', compact('unit'));
    }

    public function update(Unit $unit): RedirectResponse
    {
        $attributes = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'higher_domain' => 'required',
        ]);

        $unit->update($attributes);

        return redirect(route('units'))->with('success', 'Unit updated successfully');
    }

    public function destroy(Unit $unit): RedirectResponse
    {
        $unit->delete();

        return redirect(route('units'))->with('success', 'Unit deleted successfully');
    }
}
