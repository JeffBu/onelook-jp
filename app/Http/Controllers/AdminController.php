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
        $data = array();
        $user = User::find(1);
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->format('m');

        $subscribers = User::where('created_at', 'LIKE', $currentYear.'-'.$currentMonth.'%')->where('is_admin','<>', '1')->count();
        dd($subscribers);
    }

    public function member_list()
    {
        $users = User::where('is_admin', 0)->latest()->get();
        $data = array(
            'users' => $users
        );

        return view('admin.contents.admin_member_list', $data);
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
}
