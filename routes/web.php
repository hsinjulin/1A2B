<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [BooksController::class, 'img'])->name('start');
Route::get('/books/img', [BooksController::class, 'img'])->name('img');
Route::get('/books/guess', [BooksController::class, 'guess'])->name('guess');
Route::get('/books/insert', [BooksController::class, 'insert'])->name('insert');
Route::get('/books/show', [BooksController::class, 'show'])->name('show');
Route::get('/books/clear', [BooksController::class, 'clear'])->name('clear');
