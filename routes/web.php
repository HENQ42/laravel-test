<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Rotas CRUD
Route::resource('libraries', LibraryController::class);
Route::resource('books', BookController::class);
Route::resource('genres', GenreController::class);
Route::resource('loans', LoanController::class);
Route::resource('users', UserController::class);

Route::get('/', [HomeController::class, 'index'])->name('home');

// Rota adicional para devolução
Route::put('/loans/{loan}/return', [LoanController::class, 'markAsReturned'])
     ->name('loans.return');
