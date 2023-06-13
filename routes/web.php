<?php

use App\Http\Controllers\DomainController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/laravel', function () {
    return view('welcome.blade.php');
});

Route::get('/', function () {
    return view('dashboard.index');

})->middleware('auth')->name('dashboard');


// Login
Route::get('login', [SessionsController::class, 'create'])->name('login');
Route::post('login', [SessionsController::class, 'store']);
Route::post('logout', [SessionsController::class, 'destroy']);

Route::get('test', [SessionsController::class, 'test']);

// Units
Route::get('/units', [UnitController::class, 'index'])->middleware('can:admin')->name('units');

// Servers
Route::get('/servers', [ServerController::class, 'index'])->middleware('can:admin')->name('servers');

// Domains
Route::get('/domains', [DomainController::class, 'index'])->middleware('auth')->name('domains');

// Users
Route::get('/users', [UserController::class, 'index'])->middleware('auth')->name('users');
Route::get('/users/create', [UserController::class, 'create'])->middleware('can:admin')->name('users.create');
Route::post('/users', [UserController::class, 'store'])->middleware('can:admin')->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('can:admin')->name('users.edit');
Route::patch('/users/{user}', [UserController::class, 'update'])->middleware('can:admin')->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->middleware('can:admin')->name('users.destroy');


// Reports
Route::get('/reports', [ReportController::class, 'index'])->middleware('auth')->name('reports');
