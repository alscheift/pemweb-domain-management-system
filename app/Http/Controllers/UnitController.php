<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UnitController extends Controller
{
    public function index(): View
    {
        return view('dashboard.units.index');
    }

    public function store(): RedirectResponse
    {
        $attributes = request()->validate([
            'name' => 'required',
            'description' => 'required',
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
