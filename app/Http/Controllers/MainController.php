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
use App\Models\SubscriptionItems;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Mail;
use App\Mail\InquiryMail;
use DB;
use Carbon\carbon;
use Log;

use App\Mail\SubscriptionUpdateMail;

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
            'video_creation_status' => $this->videoLimitStatus()
        );
        // dd($data);
        return view('authenticated-user.contents.video_creation', $data);
    }

    public function post_list()
    {
        if(auth()->user()->subscription && (auth()->user()->subscription->stripe_status == "active")){
            $noOfDaysToBeExpire = '7';
        }else{
            $noOfDaysToBeExpire = '3';
        }
        $user = Auth::user();
        $video_records = VideoRecord::where('user_id', $user->id)
                        ->whereBetween('created_at', [Carbon::now()->subDays($noOfDaysToBeExpire), Carbon::now()])
                        ->get();
        $data = array(
            'user' => $user,
            'no' => $noOfDaysToBeExpire,
            'video_records' => $video_records,
        );
        return view('authenticated-user.contents.post_list', $data);
    }

    public function membership_info()
    {
        $user = Auth::user();
        $card_info = CustomerCard::where('user_id', $user->id)->latest()->first();
        // Carbon::parse($subscription->created_at);
  
        $recordLimit = VideoRecord::where('user_id',$user->id)
                    ->whereMonth('created_at', Carbon::now()->month)->count();

        $subscription = Subscription::where('user_id', $user->id)->where('stripe_status','active')->first();
        if($subscription){
            $year = date_format(Carbon::now(),"Y");;
            $month = date_format(Carbon::now(),"m");
            $day = date_format(Carbon::parse($subscription->created_at),"d");

            $hour = date_format(Carbon::parse($subscription->created_at),"H");
            $minute = date_format(Carbon::parse($subscription->created_at),"i");
            $second = date_format(Carbon::parse($subscription->created_at),"s");

            $creation_date_plus_date_now_checking = Carbon::create($year, $month, $day, $hour, $minute, $second);
            $date_day_plus_one_month = Carbon::parse(date("Y-M-d h:i:s", strtotime(date("Y-M-d h:i:s", strtotime($creation_date_plus_date_now_checking)) . "+ 1 month")));
            $recordCounter = VideoRecord::where('user_id',$user->id)->whereBetween('created_at', [$creation_date_plus_date_now_checking, $date_day_plus_one_month])->withTrashed()->count();
        }else{
            $year = date_format(Carbon::now(),"Y");;
            $month = date_format(Carbon::now(),"m");
            $day = date_format(Carbon::parse($user->created_at),"d");

            $hour = date_format(Carbon::parse($user->created_at),"H");
            $minute = date_format(Carbon::parse($user->created_at),"i");
            $second = date_format(Carbon::parse($user->created_at),"s");

            $creation_date_plus_date_now_checking = Carbon::create($year, $month, $day, $hour, $minute, $second);
            $date_day_plus_one_month = Carbon::parse(date("Y-M-d h:i:s", strtotime(date("Y-M-d h:i:s", strtotime($creation_date_plus_date_now_checking)) . "+ 1 month")));
            $recordCounter = VideoRecord::where('user_id',$user->id)->whereBetween('created_at', [$creation_date_plus_date_now_checking, $date_day_plus_one_month])->withTrashed()->count();
        }

        $data = array(
            'user' => $user,
            'card' => $card_info,
            'recordLimit' =>  $recordCounter
        );

        return view('authenticated-user.contents.membership_info', $data);
    }

    public function videoLimitStatus(){

        $user = Auth::user();
        $_status = false;
        $count_limit = 0;
        $recordCounter = 0;
        $subscription = Subscription::where('user_id', $user->id)->where('stripe_status','active')->first();

        if($subscription){
            // $_date = Carbon::parse($subscription->created_at);
            // $_to = date("Y-M-d h:i:s", strtotime(date("Y-M-d h:i:s", strtotime($_date)) . "+ 1 month"));
            // $_from = Carbon::parse(date("Y-M-d h:i:s", strtotime(date("Y-M-d h:i:s", strtotime($_date)))));
            // $recordCounter = VideoRecord::where('user_id',$user->id)->whereBetween('created_at', [$_from, $_to])->withTrashed()->count();
            // $count_limit = 100;

            $year = date_format(Carbon::now(),"Y");;
            $month = date_format(Carbon::now(),"m");
            $day = date_format(Carbon::parse($subscription->created_at),"d");

            $hour = date_format(Carbon::parse($subscription->created_at),"H");
            $minute = date_format(Carbon::parse($subscription->created_at),"i");
            $second = date_format(Carbon::parse($subscription->created_at),"s");

            $creation_date_plus_date_now_checking = Carbon::create($year, $month, $day, $hour, $minute, $second);
            $date_day_plus_one_month = Carbon::parse(date("Y-M-d h:i:s", strtotime(date("Y-M-d h:i:s", strtotime($creation_date_plus_date_now_checking)) . "+ 1 month")));
            $recordCounter = VideoRecord::where('user_id',$user->id)->whereBetween('created_at', [$creation_date_plus_date_now_checking, $date_day_plus_one_month])->withTrashed()->count();
            $count_limit = 100;

        }else{
            //double check the date
      
            // Initialising year, month and day
            $year = date_format(Carbon::now(),"Y");;
            $month = date_format(Carbon::now(),"m");
            $day = date_format(Carbon::parse($user->created_at),"d");

            $hour = date_format(Carbon::parse($user->created_at),"H");
            $minute = date_format(Carbon::parse($user->created_at),"i");
            $second = date_format(Carbon::parse($user->created_at),"s");

            $creation_date_plus_date_now_checking = Carbon::create($year, $month, $day, $hour, $minute, $second);
            $date_day_plus_one_month = Carbon::parse(date("Y-M-d h:i:s", strtotime(date("Y-M-d h:i:s", strtotime($creation_date_plus_date_now_checking)) . "+ 1 month")));
            $recordCounter = VideoRecord::where('user_id',$user->id)->whereBetween('created_at', [$creation_date_plus_date_now_checking, $date_day_plus_one_month])->withTrashed()->count();
            $count_limit = 5;
        }

        if($count_limit <= $recordCounter){
            $_status = true;
        }
       return $_status;
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
        $Y = "";
        $M = "";
        $D = "";
        $exd_Y = "";
        $exd_M = "";
        $exd_D = "";
        $subscription_type = 0;
        if($subscription && $subscription->stripe_status == "active"){
            if($subscription->stripe_price == env('STRIPE_PRICE_MONTHLY_KEY')){
                $_subs_type = "+ 1 month";
            }elseif($subscription->stripe_price == env('STRIPE_PRICE_ANNUAL_KEY')){
                $_subs_type = "+ 1 year";
            }
            $date = Carbon::parse($subscription->created_at);
            $newEndingDate = Carbon::parse(date("Y-M-d h:i:s", strtotime(date("Y-M-d h:i:s", strtotime($date)) . $_subs_type)));

            $dateSubs = Carbon::parse(date("Y-M-d h:i:s", strtotime(date("Y-M-d h:i:s", strtotime($date)))));
            $now = Carbon::now();
            $diff = Carbon::parse($newEndingDate)->diffInDays(Carbon::parse($now));
            $Y = $date->format('Y');
            $M = $date->format('m');
            $D = $date->format('d');
            $exd_Y = Carbon::parse($newEndingDate)->format('Y');
            $exd_M = Carbon::parse($newEndingDate)->format('m');
            $exd_D = Carbon::parse($newEndingDate)->format('d');

            if($subscription->stripe_price == env('STRIPE_PRICE_MONTHLY_KEY')){
                $subscription_type = 1;
            }elseif($subscription->stripe_price == env('STRIPE_PRICE_ANNUAL_KEY')){
                $subscription_type = 2;
            }

        }

        $data = array(
            'user' => $user,
            'noOfDaysLeft' =>  $diff,
            'year' => $Y,
            'month' => $M,
            'day' => $D,
            'exd_year' => $exd_Y,
            'exd_month' => $exd_M,
            'exd_day' => $exd_D,
            'subscription_type' => $subscription_type
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
        $arrData = array();
        foreach($subscriptionList AS $subscriptionItem){
            if($subscriptionItem->stripe_price == env('STRIPE_PRICE_MONTHLY_KEY')){
                $_subs_type = " + 1 month";
            }elseif($subscriptionItem->stripe_price == env('STRIPE_PRICE_ANNUAL_KEY')){
                $_subs_type = " + 1 year";
            }
            $nestedData['id'] = $subscriptionItem->id;
            $nestedData['created_at'] = $subscriptionItem->created_at;
            $nestedData['stripe_price'] = $this->getStripePrice($subscriptionItem->stripe_price);
            $nestedData['ends_at'] = date("Y-m-d", strtotime(date("Y-m-d", strtotime($subscriptionItem->created_at)) .$_subs_type));
            $arrData[] =  $nestedData;
        }
       

        $data = array(
            'user' => $user,
            'billingStatementList' => $arrData,
        );

        return view('payment_history', $data);
    }

    public function getStripePrice($stripeId){
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET')
          );
         $price =  $stripe->prices->retrieve(
            $stripeId,
            []
          );
          return $price->unit_amount;
    }
    //subscription webhooks (dev-emat)
    public function subscriptionWebhook(Request $request){

        $date = Carbon::now()->format('Y/m/d H:i');
        //--> Start: get stripe weebhook event request
        $request_data = $request->data;
        $stripe_subscription_id = $request_data['object']['id'];
        $stripe_subscription_customer = $request_data['object']['customer'];
        $stripe_subscription_created_at = $request_data['object']['created'];
        $stripe_subscription_price = $request_data['object']['items']['data'][0]['price']['id'];
        $stripe_subscription_product = $request_data['object']['items']['data'][0]['plan']['product'];
        $stripe_subscription_quantity = $request_data['object']['items']['data'][0]['quantity'];
        $stripe_subscription_data_id = $request_data['object']['items']['data'][0]['id'];
        //--< : End
        
        //--> Start: check subscriber if exist
        $stripe_customer_user = DB::table('users')->where('stripe_id', $stripe_subscription_customer)->first();
        //--< : End
        try{
            if(!empty($stripe_customer_user)){
                $subscription_old = Subscription::where('user_id', $stripe_customer_user->id)
                                    ->where('stripe_status','active')
                                    ->where('stripe_id','!=', $stripe_subscription_id)->first();

                if(!empty($subscription_old)){
                    //remove or change status of old subscription
                    $subscription_old->stripe_status = 'inactive';
                    $subscription_old->save();

                    DB::beginTransaction();
                    //save new subscription
                    $new_subscription = new Subscription;
                    $new_subscription->user_id = $stripe_customer_user->id;
                    $new_subscription->name = $stripe_customer_user->name;
                    $new_subscription->stripe_id = $stripe_subscription_id;
                    $new_subscription->stripe_status = 'active';
                    $new_subscription->stripe_price = $stripe_subscription_price;
                    $new_subscription->quantity = $stripe_subscription_quantity;
                    $new_subscription->trial_ends_at = null;
                    $new_subscription->ends_at = null;
                    $new_subscription->save();

                    //save new subscriptionItem
                    $new_subscription_item = new SubscriptionItems;
                    $new_subscription_item->subscription_id = $new_subscription->id;
                    $new_subscription_item->stripe_id = $stripe_subscription_data_id;
                    $new_subscription_item->stripe_product = $stripe_subscription_product;
                    $new_subscription_item->stripe_price = $stripe_subscription_price;
                    $new_subscription_item->quantity = $stripe_subscription_quantity;
                    $new_subscription_item->save();

                    DB::commit();
                    $message = "subscription save in onelook database.";
                    $old_plan = 'パーソナルプラン';
                    Mail::to($stripe_customer_user->email)->send(new SubscriptionUpdateMail($stripe_customer_user, $old_plan, 'パーソナルプラン', $date));
                }else{
                    $message = "existing record. data already save!";
                }
            }
           return response()->json(array('success'=> true, 'messages'=> $message));
        } catch (Exception $e) {
            return back()->with('error',$e->getMessage());
        }
        
    }

    public function payment_history_2($id)
    {

        $user = Auth::user();
        $subscriber = Subscribers::where('user_id', $user->id)->first();
        $subscriptionList = Subscription::where('user_id', $user->id)->findOrFail($id);
        $subscription_price = $this->getStripePrice($subscriptionList->stripe_price);

        if($subscriptionList->stripe_price == env('STRIPE_PRICE_MONTHLY_KEY')){
            $_subs_type = "月次";
        }elseif($subscriptionList->stripe_price == env('STRIPE_PRICE_ANNUAL_KEY')){
            $_subs_type = "年次";
        }


       return view('payment_history_2',  compact('user','subscriber','subscriptionList', 'subscription_price','_subs_type' ));
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
        $subscriptionList = Subscription::all();
        $subscriberList = Subscribers::all();
        $data = array(
            "subscriptionList" => $subscriptionList,
            "subscriberList" => $subscriberList
        );
        return json_encode($data);

    }

    public function cancelService(Request $request){

        // dd($request->user_id);
        $user = User::find($request->user_id);
        if($user)
        {
            Subscription::where('user_id', $user->id)->delete();
            CustomerCard::where('user_id', $user->id)->delete();
            User::where('id', $user->id)->delete();
        }
        
    }

}
