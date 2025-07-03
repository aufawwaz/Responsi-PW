<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KomikController;
use App\Http\Controllers\ProfileController;

Route::get('/', [KomikController::class, 'index'])->name('index');
Route::get('/index', [KomikController::class, 'index'])->name('komik.index');
Route::get('/komik/table', [KomikController::class, 'table'])->name('komik.table');

Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/komik/create', [KomikController::class, 'create'])->name('komik.create');
    Route::post('/komik', [KomikController::class, 'store'])->name('komik.store');
    Route::get('/komik/{id}/edit', [KomikController::class, 'edit'])->name('komik.edit');
    Route::put('/komik/{id}', [KomikController::class, 'update'])->name('komik.update');
    Route::delete('/komik/{id}', [KomikController::class, 'destroy'])->name('komik.destroy');
});

Route::get('/komik/{id}', [KomikController::class, 'show'])->name('komik.show');
