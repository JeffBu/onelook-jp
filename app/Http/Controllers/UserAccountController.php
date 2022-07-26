<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

use App\Models\User;

class UserAccountController extends Controller
{
    public function modify_account(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'full_name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'username' => 'required',
            'email' => 'required',
            'notification_status' => 'required'
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
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'notification_on' => $request->notification_status
        ]);
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
}
