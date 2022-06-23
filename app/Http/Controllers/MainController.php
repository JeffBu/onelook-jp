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

    public function post_list()
    {
        $user = Auth::user();
        $data = array(
            'user' => $user,
        );

        return view('post_list', $data);
    }

    public function membership_info()
    {
        $user = Auth::user();
        $data = array(
            'user' => $user,
        );

        return view('membership_info', $data);
    }

    public function change_membership_plan()
    {
        $user = Auth::user();
        $data = array(
            'user' => $user,
        );

        return view('subscription', $data);
    }

    public function update_cancel_plan()
    {
        $user = Auth::user();
        $data = array(
            'user' => $user,
        );

        return view('subscription_2', $data);
    }

    public function edit_member_info()
    {
        $user = Auth::user();
        $data = array(
            'user' => $user,
        );

        return view('edit_member_info', $data);
    }

    public function edit_personal_info()
    {
        $user = Auth::user();
        $data = array(
            'user' => $user,
        );

        return view('edit_personal_info', $data);
    }

    public function payment_history()
    {
        $user = Auth::user();
        $data = array(
            'user' => $user,
        );

        return view('payment_history', $data);
    }

    public function payment_history_2()
    {
        $user = Auth::user();
        $data = array(
            'user' => $user,
        );

        return view('payment_history_2', $data);
    }

    public function admin_home()
    {
        $user = Auth::user();
        $data = array(
            'user' => $user,
        );

        return view('admin_home', $data);
    }

    public function admin_member_list()
    {
        $user = Auth::user();
        $data = array(
            'user' => $user,
        );

        return view('admin_member_list', $data);
    }

    public function admin_member_info()
    {
        $user = Auth::user();
        $data = array(
            'user' => $user,
        );

        return view('admin_member_info', $data);
    }
}
