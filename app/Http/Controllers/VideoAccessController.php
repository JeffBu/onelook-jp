<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoAccess;
use App\Models\VideoRecord;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VideoAccessController extends Controller
{
    public const DOWNLOAD_CLOUD = "https://storage.googleapis.com/download/storage/v1/b/onelook-storage/o/";
    public function save_access_code(Request $request)
    {
        $code = $request->code;
        $key = $request->key;

        DB::transaction(function () use($code, $key){
            $access = VideoAccess::where('video_record_key', $key)->first();

            if($access)
            {
                $access->update([
                    'access_code' => $code
                ]);

                $access->save();
            }
            else {
                VideoAccess::create([
                    'video_record_key' => $key,
                    'access_code' => $code,
                    'granted_by_user_id' => Auth::user()->id
                ]);
            }
        });

        return true;
    }

    public function download_file(Request $request)
    {
        $file_db = VideoRecord::find($request->id);

        $file = SELF::DOWNLOAD_CLOUD . str_replace(' ', '%20', $file_db->video_path) . '?alt=media';

        $name = $file_db->title;

        return array(url($file), $name);
    }
}
