<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // dữ liệu mẫu
        $studyRooms = [
            [
                'name' => 'Phòng học tập chung 1',
                'online' => 20,
                'avatars' => ['1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg']
            ],
            [
                'name' => 'Phòng học tập chung 2',
                'online' => 16,
                'avatars' => ['6.jpg', '6.jpg', '6.jpg', '6.jpg']
            ],
            [
                'name' => 'Phòng học tập chung 3',
                'online' => 16,
                'avatars' => ['7.jpg', '7.jpg', '7.jpg']
            ],
        ];

        return view('home', compact('studyRooms'));
    }
}