<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FocusController extends Controller
{
    public function focus()
    {
        return view('room.focus'); // hoặc 'room' nếu bạn để file room.blade.php
    }
}
