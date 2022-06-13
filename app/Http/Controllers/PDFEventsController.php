<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PDFEventsController extends Controller
{
    public function get_source(Request $request)
    {
        $file =  $request->file('file');

        $path = $file->store('public/files/temp');
        $contents = Storage::url($path);

        return $contents;
    }
}
