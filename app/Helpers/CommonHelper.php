<?php

namespace App\Helpers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommonHelper
{
    public static function changePassword($request, $model)
    {
        Validator::validate($request->all(), [
            'oldpassword' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $model = "App\Models\\" . $model;
        $user = $model::find(Auth::id());
        if (Hash::check($request->oldpassword, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return __('Password Change Successful');
        } else {
            return __('Password Mismatch');
        }
    }
}
