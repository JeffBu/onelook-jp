<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PDFEventsController;
use App\Http\Controllers\VideoRecordingEvents;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing_temp');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('dashboard');
    Route::get('video-creation', [MainController::class, 'video_creation'])->name('video-creation');
});

Route::post('get-pdf-source', [PDFEventsController::class, 'get_source'])->name('get-pdf-source');
Route::post('save-url-to-database', [VideoRecordingEvents::class, 'save_to_database'])->name('save-url-to-database');
Route::post('save-video', [VideoRecordingEvents::class, 'save_video'])->name('save-video');

Route::get('test-frontend', function() {
    return view('welcome');
});
