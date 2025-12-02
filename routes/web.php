<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaticPageController;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\ChirpController;

Route::get('/', [StaticPageController::class, 'home'])
    ->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])
        ->name('dashboard');
});

Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [AdminController::class, 'index'])
            ->name('index');

        Route::post('users/{user}/delete', [UserManagementController::class, 'delete'])
            ->name('users.delete');

        Route::resource('users',
            UserManagementController::class);
        //        Route::get('users', [UserManagementController::class, 'index'])->name('users');
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/**
 * Table of the HTTP VERBs, the ENDPOINT URIs,
 * CONTROLLER ACTIONs and the ROUTEs
 * interpreted when using route('ROUTE_NAME')
 * in code.
 *
 * | Verb       |  URI                       |  Action   |  Route Name          |
 * |------------|----------------------------|-----------|----------------------|
 * | GET        |  /chirps                   |  index    |  chirps.index        |
 * | POST       |  /chirps                   |  store    |  chirps.store        |
 * | GET        |  /chirps/{chirp}/edit      |  edit     |  chirps.edit         |
 * | PUT/PATCH  |  /chirps/{chirp}           |  update   |  chirps.update       |
 * | DELETE     |  /chirps/{chirp}           |  destroy  |  chirps.destroy      |
 */
Route::resource('/chirps', ChirpController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth','verified']);

//Route::get('/chirps', [ChirpController::class, 'index'])
//    ->name('chirps.index')
//    -> middleware(['auth']);
//
//Route::post('/chirps', [ChirpController::class, 'store'])
//    ->name('chirps.store')
//    -> middleware(['auth']);


require __DIR__.'/auth.php';
