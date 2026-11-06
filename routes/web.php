<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthPageController;
use App\Http\Controllers\HistoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthPageController::class, 'login']);
Route::get('/history', [HistoryController::class, 'index']);
