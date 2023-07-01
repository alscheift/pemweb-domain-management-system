<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Unit;
use App\Models\Domain;

class ReportController extends Controller
{
    public function index(): View
    {
        $units = Unit::all();

        if(auth()->user()->is_admin != 1){
            $units = $units->where('id', auth()->user()->unit_id)->first();
        }

        return view('dashboard.reports.index', compact('units'));
    }
}
