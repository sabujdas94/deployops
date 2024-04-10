<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServerConnectionStatusController;
use App\Http\Controllers\ServersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('servers', ServersController::class);

    Route::get('connection-status/{server}', ServerConnectionStatusController::class)->name('connection-status');
});

require __DIR__.'/auth.php';
