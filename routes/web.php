<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KomikController;

Route::get('/', [KomikController::class, 'index'])->name('index');
Route::get('/index', [KomikController::class, 'index'])->name('komik.index');
Route::get('/komik/create', [KomikController::class, 'create'])->name('komik.create');
Route::get('/komik/table', [KomikController::class, 'table'])->name('komik.table');
Route::post('/komik', [KomikController::class, 'store'])->name('komik.store');

Route::get('/komik/{id}/edit-name', [KomikController::class, 'editName'])->name('komik.editName');
Route::put('/komik/{id}/update-name', [KomikController::class, 'updateName'])->name('komik.updateName');

Route::get('/komik/{id}/edit-genre', [KomikController::class, 'editGenre'])->name('komik.editGenre');
Route::put('/komik/{id}/update-genre', [KomikController::class, 'updateGenre'])->name('komik.updateGenre');

Route::get('/komik/{id}/edit-cover', [KomikController::class, 'editCover'])->name('komik.editCover');
Route::put('/komik/{id}/update-cover', [KomikController::class, 'updateCover'])->name('komik.updateCover');

Route::delete('/komik/{id}', [KomikController::class, 'destroy'])->name('komik.destroy');

Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);
