<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\VerifikasiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LeaderboardController::class, 'index'])->name('beranda');

Route::middleware('guest')->group(function () {
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store'); });

Route::middleware(['auth', 'role'])->group(function () {
Route::get('/dashboard', [LeaderboardController::class, 'index'])->name('dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); });

Route::middleware(['auth', 'role:2'])->group(function () {
Route::get('/history', [HistoryController::class, 'index'])->name('history.index'); });
