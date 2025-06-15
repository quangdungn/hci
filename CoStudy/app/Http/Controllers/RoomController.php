<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function show()
    {
        return view('room.show'); // hoặc 'room' nếu bạn để file room.blade.php
    }
}
