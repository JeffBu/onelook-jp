<?php

namespace App\Http\Controllers;

//Models
use App\Models\User;

//Helpers
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $data = array();
        $user = User::find(1);
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->format('m');

        $subscribers = User::where('created_at', 'LIKE', $currentYear.'-'.$currentMonth.'%')->where('is_admin','<>', '1')->count();
        dd($subscribers);
    }
}
