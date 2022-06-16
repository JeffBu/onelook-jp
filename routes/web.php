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
    Route::get('post-list', [MainController::class, 'post_list'])->name('post-list');
    Route::get('membership-info', [MainController::class, 'membership_info'])->name('membership-info');
    Route::get('change-membership-plan', [MainController::class, 'change_membership_plan'])->name('change-membership-plan');
    Route::get('update-cancel-plan', [MainController::class, 'update_cancel_plan'])->name('update-cancel-plan');
    Route::get('edit-member-info', [MainController::class, 'edit_member_info'])->name('edit-member-info');
    Route::get('edit-personal-info', [MainController::class, 'edit_personal_info'])->name('edit-personal-info');
    Route::get('payment-history', [MainController::class, 'payment_history'])->name('payment-history');
    Route::get('payment-history-2', [MainController::class, 'payment_history_2'])->name('payment-history-2');
});

Route::post('get-pdf-source', [PDFEventsController::class, 'get_source'])->name('get-pdf-source');
Route::post('save-url-to-database', [VideoRecordingEvents::class, 'save_to_database'])->name('save-url-to-database');
Route::post('save-video', [VideoRecordingEvents::class, 'save_video'])->name('save-video');

Route::get('test-frontend', function() {
    return view('edit_personal_info');
});
