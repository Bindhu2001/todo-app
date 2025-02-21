<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

Route::get('/', [AuthController::class, 'showSignupForm'])->name('signup.form');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/dashboard', [TaskController::class, 'index'])->name('dashboard');
Route::post('/task/add', [TaskController::class, 'store'])->name('task.add');
Route::patch('/task/update/{id}', [TaskController::class, 'update'])->name('task.update');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::delete('/task/delete/{id}', [TaskController::class, 'destroy'])->name('task.delete');

