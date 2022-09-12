<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\User;

use App\Mail\ForgotPasswordMail;
use App\Mail\AccountModificationMail;
use App\Mail\NewRegistration;

class UserAccountController extends Controller
{
    public function modify_account(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'email' => 'required',
        ]);

        if($validator->fails()){
            return json_encode($validator->errors());
        }

        $user = Auth::user();
        $account = $user->account;
        $user->update([
            'username' => $request->username,
            'name' => $request->full_name,
            'email' => $request->email
        ]);

        $account->update([
            'company' => $request->company_name,
        ]);

        Mail::to($user->email)->send(new AccountModificationMail($user));
        return 1;
    }

    public function update_password(Request $request)
    {
        $token  = $request->token;

        $user = User::where('email_verification_token', $token)->first();

        $data = array(
            'user' => $user
        );
        if($user->email_verified_at != '')
        {
            abort(403);
        }
        return view('auth.update-password', $data);
    }

    public function verify_email(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => ['required',
               'min:6',
               'confirmed']
        ]);

        if($validator->fails()){
            return redirect()->route('update-password', ['token' => $request->token])
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = User::where('email_verification_token', $request->token)->first();

        $user->update([
            'password' => Hash::make($request->password),
            'email_verified_at' => Carbon::now()
        ]);

        if($user->save())
        {
            return redirect()->route('login');
        }
    }

    public function forgot_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email:rfc,dns'
        ]);

        if($validator->fails())
        {
            return redirect()->route('forgot-password')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::where('email',  $request->email)->first();

        if($user == null)
        {
            $validator->errors()->add('email', 'あなたのメールアドレスは onelook.jp に登録されていません。');
            return redirect()->route('forgot-password')
                ->withErrors($validator)
                ->withInput();
        }
        else {
            Mail::to($request->email)->send(new ForgotPasswordMail($user));

            return redirect()->route('success-screen');
        }
    }

    public function forgot_password_2(Request $request)
    {
        $token = $request->token;

        $user = User::where('email_verification_token', $token)->first();
        $data = array(
            'user' => $user
        );
        return view('auth.forgot-password-2', $data);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users',
        ]);

        if($validator->fails())
        {
            return redirect()->route('registration')
                ->withErrors($validator)
                ->withInput();
        }

        DB::transaction(function () use ($request){
            $password = Str::random(8);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($password),
                'email_verification_token' => Str::random(60),
                'is_admin' => 0
            ]);

            if($user)
            {
                Mail::to($request->email)->send(new NewRegistration($user->email_verification_token, $user->email, $user->name));
            }
        });

        return view('auth.registration_complete');
    }

    public function success_screen()
    {
        return view('auth.registration_complete');
    }
}
