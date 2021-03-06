<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\VideoRecord;

use Illuminate\Support\Facades\Storage;


class MainController extends Controller
{
    public function __construct()
    {

    }

    public function unauthorized()
    {
        $data = array();
        return view('landing_temp', $data);
    }

    public function view_plans()
    {
        $data = array();
        return view('plans', $data);
    }

    public function index()
    {
        $user = Auth::user();
        $data = array(
            'user' => $user,
        );
        return view('authenticated-user.contents.dashboard', $data);
    }

    public function video_creation()
    {
        $user = Auth::user();
        $data = array(
            'user' => $user,
        );

        return view('authenticated-user.contents.video_creation', $data);
    }

    public function post_list()
    {
        $user = Auth::user();
        $video_records = VideoRecord::where('user_id', $user->id)->latest()->get();
        $data = array(
            'user' => $user,
            'video_records' => $video_records,
        );

        return view('authenticated-user.contents.post_list', $data);
    }

    public function membership_info()
    {
        $user = Auth::user();
        $data = array(
            'user' => $user,
        );

        return view('authenticated-user.contents.membership_info', $data);
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

        return view('authenticated-user.contents.subscription_2', $data);
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

    public function faq_page()
    {
        $user = Auth::user();
        $data = array(
            'user' => $user,
        );

        return view('authenticated-user.contents.faq', $data);
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

    public function admin_post_list()
    {
        $user = Auth::user();
        $data = array(
            'user' => $user,
        );

        return view('admin_post_list', $data);
    }

    public function admin_viewer()
    {
        $user = Auth::user();
        $data = array(
            'user' => $user,
        );

        return view('admin_viewer', $data);
    }

    public function test_video()
    {
        $video = VideoRecord::find(2);

        $url = $video->video_path;
        $source = Storage::disk('gcs')->url($url);
        $data = array(
            'video' => $video,
            'url' => $source
        );
        return view('test', $data);
    }

    public function registration_page() {
        return view('registration');
    }

    public function promotion_team()
    {
        return view('for-promoting-team.index');
    }

}
