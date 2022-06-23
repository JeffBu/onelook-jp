<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class VideoRecordingEvents extends Controller
{

    public function save_to_database(Request $request)
    {

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
}
