<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CommonHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function changePasswordView()
    {
        $this->authorize('change-password');
        return view('admin.others.change_password');
    }

    public function changePassword(Request $request)
    {
        $this->authorize('change-password');
        $message = CommonHelper::changePassword($request, "User");
        notify()->info($message);
        return back();
    }
}
