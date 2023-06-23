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
Route::get('/units/create', [UnitController::class, 'create'])->middleware('can:admin')->name('units.create');
Route::post('/units', [UnitController::class, 'store'])->middleware('can:admin')->name('units.store');
Route::get('/units/{unit}/edit', [UnitController::class, 'edit'])->middleware('can:admin')->name('units.edit');
Route::patch('/units/{unit}', [UnitController::class, 'update'])->middleware('can:admin')->name('units.update');
Route::delete('/units/{unit}', [UnitController::class, 'destroy'])->middleware('can:admin')->name('units.destroy');

// Servers
Route::get('/servers', [ServerController::class, 'index'])->middleware('can:admin')->name('servers');
Route::get('/servers/create', [ServerController::class, 'create'])->middleware('can:admin')->name('servers.create');
Route::post('/servers', [ServerController::class, 'store'])->middleware('can:admin')->name('servers.store');
Route::get('/servers/{server}/edit', [ServerController::class, 'edit'])->middleware('can:admin')->name('servers.edit');
Route::patch('/servers/{server}', [ServerController::class, 'update'])->middleware('can:admin')->name('servers.update');
Route::delete('/servers/{server}', [ServerController::class, 'destroy'])->middleware('can:admin')->name('servers.destroy');

// Domains
Route::get('/domains', [DomainController::class, 'index'])->middleware('auth')->name('domains');
Route::get('/domains/create', [DomainController::class, 'create'])->middleware('auth')->name('domains.create');
Route::post('/domains', [DomainController::class, 'store'])->middleware('auth')->name('domains.store');
Route::get('/domains/{domain}/edit', [DomainController::class, 'edit'])->middleware('auth')->name('domains.edit');
Route::patch('/domains/{domain}', [DomainController::class, 'update'])->middleware('auth')->name('domains.update');
Route::delete('/domains/{domain}', [DomainController::class, 'destroy'])->middleware('auth')->name('domains.destroy');


// Users
Route::get('/users', [UserController::class, 'index'])->middleware('auth')->name('users');
Route::get('/users/create', [UserController::class, 'create'])->middleware('can:admin')->name('users.create');
Route::post('/users', [UserController::class, 'store'])->middleware('can:admin')->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('can:admin')->name('users.edit');
Route::patch('/users/{user}', [UserController::class, 'update'])->middleware('can:admin')->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->middleware('can:admin')->name('users.destroy');

// Notifications
Route::get('/notificationw', function () {
    return view('dashboard.notifications.index');
})->middleware('auth')->name('notifications');

// Completions
Route::get('/completions', function () {
    return view('dashboard.completions.index');
})->middleware('auth')->name('completions');

// Reports
Route::get('/reports', [ReportController::class, 'index'])->middleware('auth')->name('reports');
