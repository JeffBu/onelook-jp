<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $user = Auth::user();
        $data = array(
            'user' => $user,
        );
        return view('dashboard_temp', $data);
    }

    public function video_creation()
    {
        $user = Auth::user();
        $data = array(
            'user' => $user,
        );

        return view('video_creation', $data);
    }
}
