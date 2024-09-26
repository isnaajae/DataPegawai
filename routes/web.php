<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;

use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('role:admin')->group(function () {
    Route::resource('pegawai', PegawaiController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [PegawaiController::class, 'dashboard'])->name('dashboard');
});

Route::get('/', function () {
    return view('welcome');
});
