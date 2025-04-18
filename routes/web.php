<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\ProfileController;

//login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// đăng kí
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
//logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
//profile user
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    });