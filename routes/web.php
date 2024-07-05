<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('/tasks', App\Http\Controllers\TasksController::class, ['names' => 'tasks']);
