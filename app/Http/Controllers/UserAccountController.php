<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;

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
}
