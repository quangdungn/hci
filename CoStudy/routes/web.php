<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\FocusController;

use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/room', [RoomController::class, 'show'])->name('room');

Route::get('/room/focus', [FocusController::class, 'focus'])->name('focus');