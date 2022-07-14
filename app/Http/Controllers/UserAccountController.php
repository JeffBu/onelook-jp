<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserAccountController extends Controller
{
    public function modify_account(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'full_name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'notification_status' => 'required'
        ]);

        if($validator->fails()){
            return json_encode($validator->errors());
        }

        $user = Auth::user();
        $account = $user->account;
        $user->update([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email
        ]);
    }
}
