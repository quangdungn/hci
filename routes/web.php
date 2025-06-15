<?php

use Illuminate\Support\Facades\Route;

Route::view('/',         'home');
Route::view('/groups',   'groups');
Route::view('/messages', 'messages');
Route::view('/pomodoro', 'pomodoro');
Route::view('/calendar', 'calendar');
Route::view('/profile',  'profile');  // hoặc tên page bạn muốn
