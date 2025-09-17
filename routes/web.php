<?php

use App\Http\Controllers\Admin\AdminController;
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

        Route::get('users', [AdminController::class, 'users'])->name('users');
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

// /chirps      GET     ChirpController index method
// /chirps      POST    ChirpController store method
//Route::resource('/chirps', ChirpController::class)
//    ->only(['index', 'store'])
//    ->middleware(['auth','verified']);

Route::get('/chirps', [ChirpController::class, 'index'])
    ->name('chirps.index')
    -> middleware(['auth']);

Route::post('/chirps', [ChirpController::class, 'store'])
    ->name('chirps.store')
    -> middleware(['auth']);


require __DIR__.'/auth.php';
