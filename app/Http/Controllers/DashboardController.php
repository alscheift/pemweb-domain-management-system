<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {

        if (auth()->user()->can('admin')) {


            return view('dashboard.index');
        } else {
            return view('dashboard.index');
        }
    }
}
