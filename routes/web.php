<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PDFEventsController;
use App\Http\Controllers\VideoRecordingEvents;
use App\Http\Controllers\VideoAccessController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SubscriptionController;

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

Route::get('home', [MainController::class, 'unauthorized'])->name('home');
Route::get('view-plans', [MainController::class, 'view_plans'])->name('view-plans');
Route::get('registration', [MainController::class, 'registration_page'])->name('registration');
Route::post('register', [UserAccountController::class, 'register'])->name('register');

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
    //reymart
    Route::get('billing-statement-list', [MainController::class, 'billingStatementlist'])->name('billing-statement-list');
    Route::get('payment-history-2/{id}', [MainController::class, 'payment_history_2'])->name('payment-history-2');
    Route::post('cancel-service', [MainController::class, 'cancelService'])->name('cancel-service');
    //Route::get('stripe-display-data', [MainController::class, 'stripe_display_data'])->name('stripe-display-data');


    Route::get('checkout', [SubscriptionController::class, 'index'])->name('checkout');

    Route::post('modify-account', [UserAccountController::class, 'modify_account'])->name('modify-account');
    Route::post('send-invitation', [VideoAccessController::class, 'send_invitation'])->name('send-invitation');
    Route::post('send-inquiry', [MainController::class, 'send_inquiry'])->name('send-inquiry');
    Route::post('pay-for-subscription', [SubscriptionController::class, 'subscribe'])->name('pay-for-subscription');
    Route::post('cancel-subscription', [SubscriptionController::class, 'cancel_subscription'])->name('cancel-subscription');
    Route::post('update-card', [SubscriptionController::class, 'update_card'])->name('update-card');

    Route::get('admin-home', [AdminController::class, 'index'])->name('admin-home');
    Route::get('admin-member-list', [AdminController::class, 'member_list'])->name('admin-member-list');
    
    Route::get('admin-member-info', [AdminController::class, 'user_info'])->name('admin-member-info');
    Route::get('admin-post-list', [AdminController::class, 'post_list'])->name('admin-post-list');

    Route::get('admin-post-list-datatable', [AdminController::class, 'findAll'])->name('admin-post-list-datatable');
    Route::get('admin-member-list-datatable', [AdminController::class, 'memberFindAll'])->name('admin-member-list-datatable');
    
    Route::get('admin-viewer', [MainController::class, 'admin_viewer'])->name('admin-viewer');
    Route::get('admin-settings', [MainController::class, 'admin_settings'])->name('admin-settings');
    Route::get('admin-posting', [AdminController::class, 'announcement'])->name('admin-posting');
    Route::post('add-announcement', [AdminController::class, 'add_news'])->name('add-announcement');
    Route::post('send-notif', [AdminController::class, 'send_notif'])->name('send-notif');
    Route::post('delete-video', [VideoAccessController::class, 'delete_video'])->name('delete-video');
    Route::post('delete-news', [AdminController::class, 'delete_news'])->name('delete-news');
    Route::post('delete-notifs', [AdminController::class, 'delete_notifs'])->name('delete-notifs');
    Route::post('delete-user', [AdminController::class, 'delete_user'])->name('delete-user');

    Route::post('checkout', [SubscriptionController::class, 'subscribe']);
});

Route::get('update-password', [UserAccountController::class, 'update_password'])->name('update-password');
Route::get('success-screen', [UserAccountController::class, 'success_screen'])->name('success-screen');
Route::post('update-password', [UserAccountController::class, 'verify_email']);
Route::post('password-forget', [UserAccountController::class, 'forgot_password'])->name('password-forget');
Route::post('download-file', [VideoAccessController::class, 'download_file'])->name('download');
Route::post('get-pdf-source', [PDFEventsController::class, 'get_source'])->name('get-pdf-source');
Route::post('save-video-to-database', [VideoRecordingEvents::class, 'save_to_database'])->name('save-video-to-database');
Route::post('save-video', [VideoRecordingEvents::class, 'save_video'])->name('save-video');
Route::post('save-access-code', [VideoAccessController::class, 'save_access_code'])->name('save-access-code');
Route::get('access-video-record', [VideoRecordingEvents::class, 'access_video_record'])->name('access-video-record');
Route::post('access-video-record', [VideoRecordingEvents::class, 'watch_video'])->name('access-video-record');


Route::get('registration-complete', [MainController::class, 'registration_complete'])->name('registration-complete');
Route::get('page-unavailable', [MainController::class, 'page_unavailable'])->name('page-unavailable');
Route::get('forgot-password-notification', [MainController::class, 'forgot_password_notification'])->name('forgot-password-notification');
Route::get('faq', [MainController::class, 'faq_page'])->name('faq');
Route::post('forgot-password', [UserAccountController::class, 'forgot_password'])->name('forgot-password');
Route::get('update-new-password', [UserAccountController::class, 'forgot_password_2'])->name('update-new-password');

Route::get('promotion', [AdminController::class, 'index'])->name('promotion');

Route::get('test', [SubscriptionController::class, 'index'])->name('test');

