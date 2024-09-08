<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});

// Route halaman login
Route::get('login', [LoginController::class, 'LoginPage'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('todos', TodoController::class);
// Route yang dilindungi oleh middleware checkLogin
/*Route::middleware(['checkLogin'])->group(function () {
    Route::resource('todos', TodoController::class);
});*/
