<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('todolist', [TodoController::class, 'index'])->name('todolist.index');
Route::post('todolist', [TodoController::class, 'store'])->name('todolist.store');
Route::put('todolist/{todo}', [TodoController::class, 'update'])->name('todolist.update');
Route::put('todolist/{todo}/done', [TodoController::class, 'markAsDone'])->name('todolist.done');
Route::delete('todolist/{todo}', [TodoController::class, 'destroy'])->name('todolist.destroy');
