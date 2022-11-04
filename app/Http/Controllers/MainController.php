<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\VideoRecord;
use App\Models\News;
use App\Models\PostHistory;
use App\Models\CustomerCard;
use App\Models\Subscription;
use App\Models\Subscribers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Mail;
use App\Mail\InquiryMail;
use DB;
use Carbon\carbon;
class MainController extends Controller
{
    public function login_test()
    {
        $data = array();
        return view('login', $data);
    }

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

        if($user->is_admin == 1)
        {
            return redirect()->route('admin-home');
        }

        $news = News::where('target_user', null)->latest()->get();
        $history = PostHistory::where('user_id', $user->id)->latest()->get();
        $data = array(
            'user' => $user,
            'news' => $news,
            'history' => $history,
        );

        return view('authenticated-user.contents.dashboard', $data);
    }

    public function send_inquiry(Request $request)
    {
        Mail::to('info@onelook.jp')->send(new InquiryMail(Auth::user(), $request->content));

        return 1;
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
        if(auth()->user()->subscription){
            $noOfDaysToBeExpire = '7';
        }else{
            $noOfDaysToBeExpire = '3';
        }
        
        $user = Auth::user();
        $video_records = VideoRecord::where('user_id', $user->id)
                        ->where('created_at','>',Carbon::today()->subDay($noOfDaysToBeExpire))
                        // ->whereRaw('created_at between created_at AND DATE_ADD(created_at, INTERVAL 3 DAYS)')
                        ->latest()->get();
        $data = array(
            'user' => $user,
            'video_records' => $video_records,
        );
        return view('authenticated-user.contents.post_list', $data);
    }

    public function membership_info()
    {
        $user = Auth::user();
        $card_info = CustomerCard::where('user_id', $user->id)->latest()->first();
        $data = array(
            'user' => $user,
            'card' => $card_info
        );

        return view('authenticated-user.contents.membership_info', $data);
    }

    public function change_membership_plan()
    {
        $user = Auth::user();
        $data = array(
            'user' => $user,
        );

        return view('authenticated-user.contents.subscription', $data);
    }

    public function update_cancel_plan()
    {
        $user = Auth::user();
        $subscription = Subscription::where('user_id', $user->id)->first();
        $diff = 0;
        if($subscription){
            $date = Carbon::parse($subscription->ends_at);
            $now = Carbon::now();
            $diff = $date->diffInDays($now);
        }
        $data = array(
            'user' => $user,
            'noOfDaysLeft' =>  $diff
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
        $subscriptionList = Subscription::where('user_id', $user->id)->get();

        $data = array(
            'user' => $user,
            'billingStatementList' => $subscriptionList,
        );
        return view('payment_history', $data);
    }

    public function payment_history_2($id)
    {

        $user = Auth::user();
        $subscriber = Subscribers::where('user_id', $user->id)->first();
        $subscriptionList = Subscription::where('user_id', $user->id)->findOrFail($id);
        // dd($subscriber);
       return view('payment_history_2',  compact('user','subscriber','subscriptionList'));
    }

    public function stripe_display_data()
    {
        $user = Auth::user();
        $subscriberList = Subscribers::all();
        $subscriptionList = Subscription::all();
        $data = array(
            'subscriberList' => $subscriberList,
            'subscriptionList' => $subscriptionList
        );
        return json_encode($data); 
       //return view('payment_history_2',  compact('user','subscriber','subscriptionList'));
    }

    public function faq_page()
    {
        $user = Auth::user();
        $data = array(
            'user' => $user,
        );

        return view('authenticated-user.contents.faq', $data);
    }

    public function admin_viewer()
    {
        $user = Auth::user();
        $data = array(
            'user' => $user,
        );

        return view('admin.contents.admin_viewer', $data);
    }

    public function admin_settings()
    {
        $user = Auth::user();
        $data = array(
            'user' => $user,
        );

        return view('admin.contents.admin_settings', $data);
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
        return view('auth.registration');
    }

    public function registration_complete() {
        return view('registration_complete');
    }

    public function page_unavailable() {
        return view('authenticated-user.contents.page_unavailable');
    }

    public function forgot_password_notification() {
        return view('forgot_password_notification');
    }

    public function promotion_team()
    {
        return view('for-promoting-team.index');
    }

    public function checkout_page()
    {
        return view('authenticated-user.contents.checkout');
    }

    public function billingStatementlist(){

        $user = Auth::user()->id;
        $subscriptionList = Subscription::where('user_id', $user)->get();
            
        return json_encode($subscriptionList);

    }

}
