<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Trang chủ (Home)
Route::view('/', 'home')->name('home');

// Trang danh sách nhóm
Route::get('/groups', function () {
    // Dữ liệu demo nhóm
    $groups = [
        ['id'=>1,'name'=>'Nhóm tương tác người máy','avatar'=>'avatar1.jpg','description'=>'Nhóm của lớp 64KTPM5 học Tương tác người máy 1…'],
        ['id'=>2,'name'=>'Nhóm X','avatar'=>'avatar2.jpg','description'=>'Mô tả nhóm X…'],
        // ... thêm nhóm khác nếu cần
    ];
    return view('groups', compact('groups'));
});

// Trang chi tiết nhóm (kênh chat & thoại)
Route::get('/groups/{id}', function ($id) {
    // Dữ liệu demo theo id
    $all = [
        1=>['id'=>1,'name'=>'Nhóm tương tác người máy','avatar'=>'avatar1.jpg'],
        2=>['id'=>2,'name'=>'Nhóm X','avatar'=>'avatar2.jpg'],
    ];
    $group = $all[$id] ?? $all[1];
    return view('group', compact('group'));
});

// Trang Tin nhắn
Route::view('/messages', 'messages');

// Trang Pomodoro
Route::view('/pomodoro', 'pomodoro');

// Trang Lịch
Route::view('/calendar', 'calendar');

// Trang Profile
Route::view('/profile', 'profile');

// Trang “Show” với chat + participants
Route::view('/room/show', 'show')->name('room.show');

// Trang full-screen “Focus”
Route::view('/room', 'focus')->name('room.focus');