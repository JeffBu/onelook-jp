<?php

namespace App\Http\Controllers;

//Models
use App\Models\User;
use App\Models\News;
use App\Models\VideoRecord;
use App\Models\PostHistory;
use App\Models\Subscription;

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


    public function memberFindAll(Request $request)
    {
        $columns = array( 
            0 =>'name',
            1 => 'created_at',
            5 => 'email'
        );

        $totalData = User::where('is_admin', 0)->latest()->count();
        //$query = Driver::where('status','1');
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {            
            $users = User::where('is_admin', 0)
                         ->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();                            
        }
        else {
            $search = $request->input('search.value'); 
            $users = User::where('is_admin', 0)
                        ->orWhere('name', 'LIKE',"%{$search}%")
                        ->orWhere('created_at', 'LIKE',"%{$search}%")
                        ->orWhere('email', 'LIKE',"%{$search}%")
                        ->offset($start)
                        ->limit($limit)
                        ->orderBy($order,$dir)
                        ->get();
            $totalFiltered = User::where('is_admin', 0)
                        ->orWhere('name', 'LIKE',"%{$search}%")
                        ->orWhere('created_at', 'LIKE',"%{$search}%")
                        ->orWhere('email', 'LIKE',"%{$search}%")
                        ->count();

        }
        $data = array();
        if(!empty($users))
        {
            foreach ($users as $user)
            {   
                $subs = Subscription::where('user_id',$user->id)->get();
                $url = url('/admin-member-info')."?user_id=".$user->id;
                $nestedData['name'] = '<a href="'.$url.'" class="text-blue-600 hover:text-blue-400 underline underline-offset-2">'.$user->name.'</a>';
                $nestedData['created_at'] = $user->created_at->format('Y年m月d日');
                $nestedData['subscription_date'] = ($subs->isEmpty()) ? '---' : $subs->created_at->format('Y年m月d日');
                $nestedData['membership_type'] =  ($subs->isEmpty()) ? '無料プラン' : 'パーソナルプラン';
                $nestedData['create_video'] = "";
                $nestedData['in_time_video'] = "";
                $nestedData['email'] = $user->email;
                $nestedData['number_of_views'] = VideoRecord::where('user_id',$user->id)->count();
                $data[] = $nestedData;
            }
        }
          
        $json_data = array(
            "draw"            => intval($request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $data   
            );
        return json_encode($json_data); 

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
        // $records = VideoRecord::latest()->get();
        $data = array(
            'user' => $user,
            // 'records' => $records,
        );
       return view('admin.contents.admin_post_list', $data);
    }


    public function findAll(Request $request)
    {
        $columns = array( 
            0 =>'title', 
            1 =>'name',
            2=> 'views',
            3=> 'created_at',
            4=> 'updated_at',
        );

        $totalData = VideoRecord::with('views','uploader', 'access')->count();
        //$query = Driver::where('status','1');
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {            
            $videoRecords = VideoRecord::with('views','access')
                         ->join('users', 'users.id', 'video_records.user_id')
                         ->select(
                            'video_records.id AS id',
                            'video_records.video_path AS video_path',
                            'video_records.title AS title',
                            'users.name AS name',
                            'video_records.created_at AS created_at',
                            'video_records.updated_at AS updated_at')
                         ->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();                            
        }
        else {
            $search = $request->input('search.value'); 
            $videoRecords = VideoRecord::with('uploader')
                        ->whereHas('uploader',function($query) use ($search){
                            $query->where('name','LIKE','%'.$search.'%');
                        })
                        ->orWhere('title', 'LIKE',"%{$search}%")
                        ->orWhere('created_at', 'LIKE',"%{$search}%")
                        ->offset($start)
                        ->limit($limit)
                        ->orderBy($order,$dir)
                        ->get();
            $totalFiltered = VideoRecord::with('uploader')
                        ->whereHas('uploader',function($query) use ($search){
                            $query->where('name','LIKE','%'.$search.'%');
                        })
                        ->orWhere('title', 'LIKE',"%{$search}%")
                        ->orWhere('created_at', 'LIKE',"%{$search}%")
                        ->count();

        }
        
        $data = array();
        if(!empty($videoRecords))
        {
            foreach ($videoRecords as $videoRecord)
            {  
                $url = "https://storage.googleapis.com/onelook-bucket/".$videoRecord->video_path;
                $btnUrl = '<span id="bar">'.$url.'</span><button id="btnCopyLink" data-clipboard-action="copy" data-clipboard-target="#bar" class="btnCopyLink container px-4 py-1 text-theme-white font-medium rounded-md bg-lime-600 hover:bg-lime-500">コピーリンク</button>';
                $videoPlay = '<div class="flex flex-col justify-center items-center gap-3">'.
                        '<video src="'.$url.'" alt="thumbnail" class="h-24 w-48 object-cover border-2 hover:border-yellow-400"></video>'.
                        '<div class="flex flex-col gap-3 w-full">'.
                            '<div class="flex flex-col 2xl:flex-row gap-3 w-full">'.
                                '<button class="container px-4 py-1 text-theme-white font-medium rounded-md bg-lime-600 hover:bg-lime-500" onclick="addSource(\''.$videoRecord->id.'\''.','.'\''.$url.'\')">再生</button>'.
                                '<button onclick="downloadVideo('.$videoRecord->id.')" class="container px-4 py-1 text-theme-white font-medium rounded-md bg-lime-600 hover:bg-lime-500">ダウンロード</button>'.
                            '</div>'.
                        '</div>'.
                    '</div>';

                $nestedData['title'] = $videoRecord->title;
                $nestedData['name'] = $videoRecord->name;
                $nestedData['views'] = $videoRecord->views->count();
                $nestedData['format'] = $videoRecord->created_at->format('Y年m月d日H:i');
                $nestedData['modify'] = $videoRecord->updated_at->modify('+3 days')->format('Y年m月d日');
                $nestedData['btnUrl'] = $btnUrl;
                $nestedData['btnDownloadPlay'] = $videoPlay;
                $data[] = $nestedData;
            }
        }
          
        $json_data = array(
            "draw"            => intval($request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $data   
            );
       
        return json_encode($json_data); 
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
        User::where('id', $id)->delete();

        return 'success';
    }
}
