<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SolutionController;
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

Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');


// Login
Route::get('login', [SessionsController::class, 'create'])->name('login');
Route::post('login', [SessionsController::class, 'store']);
Route::post('logout', [SessionsController::class, 'destroy']);

Route::get('test', [SessionsController::class, 'test']);

Route::middleware('auth')->group(function () {
    Route::middleware('admin')->group(function () {
        // Users
        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

        // Units
        Route::get('/units', [UnitController::class, 'index'])->name('units');
        Route::get('/units/create', [UnitController::class, 'create'])->name('units.create');
        Route::post('/units', [UnitController::class, 'store'])->name('units.store');
        Route::get('/units/{unit}/edit', [UnitController::class, 'edit'])->name('units.edit');
        Route::patch('/units/{unit}', [UnitController::class, 'update'])->name('units.update');
        Route::delete('/units/{unit}', [UnitController::class, 'destroy'])->name('units.destroy');
    });


    // Servers
    Route::get('/servers', [ServerController::class, 'index'])->name('servers');

    Route::middleware('pic')->group(function () {
        Route::get('/servers/create', [ServerController::class, 'create'])->name('servers.create');
        Route::post('/servers', [ServerController::class, 'store'])->name('servers.store');
        Route::get('/servers/{server}/edit', [ServerController::class, 'edit'])->name('servers.edit');
        Route::patch('/servers/{server}', [ServerController::class, 'update'])->name('servers.update');
        Route::delete('/servers/{server}', [ServerController::class, 'destroy'])->name('servers.destroy');
    });

    // Domains
    Route::get('/domains', [DomainController::class, 'index'])->name('domains');

    Route::middleware('pic')->group(function () {
        Route::get('/domains/create', [DomainController::class, 'create'])->name('domains.create');
        Route::post('/domains', [DomainController::class, 'store'])->name('domains.store');
        Route::get('/domains/{domain}/edit', [DomainController::class, 'edit'])->name('domains.edit');
        Route::patch('/domains/{domain}', [DomainController::class, 'update'])->name('domains.update');
        Route::delete('/domains/{domain}', [DomainController::class, 'destroy'])->name('domains.destroy');
    });
    Route::get('/domains/{domain}', [DomainController::class, 'show'])->name('domains.show');

    // Route::get('/domains/export-excel', [DomainController::class, 'viewExcel'])->name('domains.export');

    Route::post('/domains/export-excel', [DomainController::class, 'exportExcel'])->name('domains.export-excel');

    // Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');

    Route::middleware('admin')->group(function () {
        Route::get('/notifications/create', [NotificationController::class, 'create'])->name('notifications.create');
        Route::post('/notifications', [NotificationController::class, 'store'])->name('notifications.store');
        Route::get('/notifications/{notification}/edit', [NotificationController::class, 'edit'])->name('notifications.edit');
        Route::patch('/notifications/{notification}', [NotificationController::class, 'update'])->name('notifications.update');
        Route::delete('/notifications/{notification}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
    });

    // Solutions
    Route::get('/solutions', [SolutionController::class, 'index'])->name('solutions');

    Route::middleware('pic')->group(function () {
        Route::get('/solutions/create', [SolutionController::class, 'create'])->name('solutions.create');
        Route::post('/solutions', [SolutionController::class, 'store'])->name('solutions.store');
        Route::get('/solutions/{solution}/edit', [SolutionController::class, 'edit'])->name('solutions.edit');
        Route::patch('/solutions/{solution}', [SolutionController::class, 'update'])->name('solutions.update');
        Route::post('/solutions/{solution}', [SolutionController::class, 'marksAsDone'])->name('solutions.done');
        Route::delete('/solutions/{solution}', [SolutionController::class, 'destroy'])->name('solutions.destroy');
    });

    // Reports
    Route::get('/reports', [ReportController::class, 'index'])->name('reports');

    // Profile
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');

    Route::get('/profile/{user}/edit', [UserController::class, 'profileEdit'])->name('profile.edit');
    Route::patch('/profile/{user}', [UserController::class, 'profileUpdate'])->name('profile.update');
});

// Others
// 403
Route::get('403', function () {
    return view('dashboard.403');
})->middleware('auth')->name('403');
