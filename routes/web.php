<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
// routes/web.php
Route::get('/', function () {
    return "Hello World!";
});
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
//company
Route::middleware('auth')->group(function () {
    Route::get('/company', [CompanyController::class, 'show'])->name('company.show');
    Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
    Route::post('/company', [CompanyController::class, 'store'])->name('company.store');
    Route::get('/company/edit', [CompanyController::class, 'edit'])->name('company.edit');
    Route::put('/company', [CompanyController::class, 'update'])->name('company.update');
});    
//job
Route::middleware('auth')->group(function () {
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
    Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
    Route::get('/jobs/{id}/edit', [JobController::class, 'edit'])->name('jobs.edit');
    Route::put('/jobs/{id}', [JobController::class, 'update'])->name('jobs.update');
    Route::delete('/jobs/{id}', [JobController::class, 'destroy'])->name('jobs.destroy');
    Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');
});