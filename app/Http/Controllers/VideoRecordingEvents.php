<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\VideoRecord;
use Illuminate\Support\Facades\Validator;
use Google\Cloud\Storage\StorageClient;

class VideoRecordingEvents extends Controller
{
    public function store(Request $request)
    {

    }
    public function save_to_database(Request $request)
    {

        $date_now = Carbon::now()->format('Y-m-d_H.i');
        $key = Str::random(16);
        if ($request->fileName) {
            $title = $date_now."_".$request->fileName.".mp4";
        } else {
            $title = $date_now . '.mp4';
        }
        $file = $request->file;
        $file_source = file_get_contents($file->getRealPath());
        $size = $file->getSize();
        $user_id = Auth::user()->id;
        $is_invalid = 0;

        try {
            $storage = new StorageClient([
                'keyFilePath' => env('GOOGLE_CLOUD_KEY_FILE'),
            ]);
            $bucketName = env('GOOGLE_CLOUD_STORAGE_BUCKET');
            $bucket = $storage->bucket($bucketName);

            $fileNameToStore = uniqid().'_'.$title;
            Storage::put('public/uploads/'. $fileNameToStore, $file_source);
            $filepath = storage_path('app/public/uploads/'.$fileNameToStore);
            $options = [
                'predefinedAcl' => 'publicRead',
                'prefix' => '/video-recordings/2'
            ];
            $object = $bucket->upload(fopen($filepath, 'r'), $options);

            Storage::delete('public/uploads/', $fileNameToStore);

        }catch (Exception $e){
            return $e->getMessage();
        }


        DB::transaction(function () use($key, $title, $fileNameToStore, $size, $user_id, $is_invalid){
            VideoRecord::create([
                'key' => $key,
                'title' => $title,
                'video_path' => $fileNameToStore,
                'size' => $size,
                'user_id' => $user_id,
                'is_invalid' => $is_invalid
            ]);
        });

        return 'Success';
    }

    public function save_video(Request $request)
    {
        $file = $request->file;
        $date_now = Carbon::now()->format('Y年m月d日H:i');
        if ($request->fileName) {
            $name = "{$date_now}_{$request->fileName}.mp4";
        } else {
            $name = $date_now . '.mp4';
        }

        $user = Auth::user()->id;
        $videoFile = file_get_contents($file->getRealPath());
        $path = 'videos/'.$name;
        Storage::disk('local')->put($path, $videoFile);
        $url = Storage::disk('local')->url($path);
        return response()->json($url);
    }

    public function access_video_record(Request $request)
    {
        $record = VideoRecord::where('key', $request->video_key)->first();
        $data = array(
            'record' => $record,
        );
        return view('access-video-record-validation', $data);
    }

    public function watch_video(Request $request)
    {
        $key = $request->key;
        $access_code = $request->access_code;

        $validator = Validator::make($request->all(), [
            'access_code' => 'required|max:8',
        ]);

        $record = VideoRecord::where('key', $key)->first();
        if($record->access->access_code == $access_code)
        {
            $data = array(
                'record' => $record,
            );
            return view('viewer_temp', $data);
        }
        else {
            $validator->getMessageBag()->add('access_code', '無効なアクセスコード');
            return redirect()->route('access-video-record', ['video_key' => $key])->withErrors($validator)->withInput();
        }
    }
}
