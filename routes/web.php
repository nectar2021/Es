<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// routes/web.php
Route::view('/', 'layouts.app')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/dashboard', 'dashboard.index')->name('dashboard'); // ensure this file exists
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
