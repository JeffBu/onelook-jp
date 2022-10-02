<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoAccess;
use App\Models\VideoRecord;
use App\Models\PostHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Mail\InvitationToWatchVideoMail;
use Illuminate\Support\Facades\Mail;

class VideoAccessController extends Controller
{
    public const DOWNLOAD_CLOUD = "https://storage.googleapis.com/download/storage/v1/b/onelook-bucket/o/";
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

    public function send_invitation(Request $request)
    {
        $record = VideoRecord::find($request->record_id);

        $validator = Validator::make($request->all(), [
            'target' => 'required|email:rfc,dns'
        ]);

        if($validator->fails())
        {
            return $validator->getMessageBag();
        }

        Mail::to($request->target)->send(new InvitationToWatchVideoMail(Auth::user(), $record->key, $record->access->access_code, $record));

        return 1;
    }

    public function delete_video(Request $request)
    {
        $record = VideoRecord::find($request->id);

        $record->delete();

        PostHistory::create([
            'user_id' => auth()->user()->id,
            'content' => nl2br('動画削除完了しました'),
        ]);

        return 1;
    }
}
