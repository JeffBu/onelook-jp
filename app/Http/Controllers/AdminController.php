<?php

namespace App\Http\Controllers;

//Models
use App\Models\User;
use App\Models\News;
use App\Models\VideoRecord;

//Helpers
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $data = array();
        $user = User::find(1);
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->format('m');
        $lastMonth = Carbon::now()->submonth()->format('m');

        $recentSubs = User::where('created_at', 'LIKE', $currentYear.'-'.$currentMonth.'%')->where('is_admin','<>', '1')->get();
        $lastMonthSubs = User::where('created_at', 'LIKE', $currentYear.'-'.$lastMonth.'%')->where('is_admin','<>', '1')->get();

        $recentRecords = VideoRecord::where('created_at', 'LIKE', $currentYear.'-'.$currentMonth.'%')->get();
        $lastMonthRecords = VideoRecord::where('created_at', 'LIKE', $currentYear.'-'.$lastMonth.'%')->get();
        $data = array(
            'currentMonth' => $currentMonth,
            'lastMonth' => $lastMonth,
            'recentSubs' => $recentSubs,
            'lastMonthSubs' => $lastMonthSubs,
            'recentRecords' => $recentRecords,
            'lastMonthRecords' => $lastMonthRecords,
            'user' => $user,
        );


        return view('admin.contents.admin_home', $data);
    }

    public function member_list()
    {
        $users = User::where('is_admin', 0)->latest()->get();
        $data = array(
            'users' => $users
        );

        return view('admin.contents.admin_member_list', $data);
    }

    public function user_info(Request $request)
    {
        $user_id = $request->user_id;
        $target = User::find($user_id);
        $video_records = VideoRecord::where('user_id', $user_id)->get();
        $user = Auth::user();
        $news = News::where('target_user', $target->id)->latest()->get();
        $data = array(
            'user' => $user,
            'target' => $target,
            'video_records' => $video_records,
            'messages' => $news,
        );

        return view('admin.contents.admin_member_info', $data);
    }

    public function post_list()
    {
        $user = Auth::user();
        $records = VideoRecord::latest()->get();
        $data = array(
            'user' => $user,
            'records' => $records,
        );

        return view('admin.contents.admin_post_list', $data);
    }

    public function announcement()
    {
        $user = Auth::user();
        $news = News::latest()->get();
        $data = array(
            'user' => $user,
            'news' => $news,
        );
        return view('admin.contents.admin_posting', $data);
    }

    public function add_news(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'news' => 'required'
        ]);

        if($validator->fails()) {
            return redirect()->route('admin-posting')
                    ->withErrors($validator)
                    ->withInput();
        }

        DB::transaction(function () use($request){
            $target = null;
            if($request->target == 'none')
            {
                $target = null;
            } else {
                $target = $request->target;
            }

            News::create([
                'content' => nl2br($request->news),
                'target_user' => $target
            ]);
        });

        return redirect()->route('admin-posting');
    }

    public function send_notif(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'required'
        ]);

        if($validator->fails()){
            return 0;
        }

        News::create([
            'content' => nl2br($request->comment),
            'target_user' => $request->target
        ]);

        return 1;
    }
}
