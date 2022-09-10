<?php

namespace App\Http\Controllers;

//Models
use App\Models\User;
use App\Models\News;
use App\Models\VideoRecord;
use App\Models\PostHistory;

//Mails
use App\Mail\NotificationSentMail;
use App\Mail\NewsPostedForAllMail;

//Helpers
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


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
        $news = PostHistory::where('user_id', $target->id)->latest()->get();
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
        $news = News::where('target_user', null)->latest()->get();
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

            $everyone = User::where('is_admin', 0)->get();
            foreach($everyone as $e)
            {
                Mail::to($e->email)->send(new NewsPostedForAllMail($e, $request->news));
            }
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

        PostHistory::create([
            'content' => nl2br($request->comment),
            'user_id' => $request->target
        ]);

        $user = User::find($request->target);

        Mail::to($user->email)->send(new NotificationSentMail($user, nl2br($request->comment)));

        return 1;
    }

    public function delete_news(Request $request)
    {
        $ids = $request->ids;

        PostHistory::whereIn('id', $ids)->delete();

        return 'success';
    }

    public function delete_notifs(Request $request)
    {
        $ids = $request->ids;

        News::whereIn('id', $ids)->delete();

        return 'success';
    }

    public function delete_user(Request $request)
    {
        $id = $request->user;

        $user = User::find($id);

        //delete all video records
        VideoRecord::where('user_id', $id)->delete();

        //Delete all PostHistory
        PostHistory::where('user_id', $id)->delete();

        //Delete all news
        News::where('target_user', $id)->delete();

        //Delete User
        $user->delete();

        return 'success';
    }
}
