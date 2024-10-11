<?php

namespace App\Http\Controllers\User;

use App\Helpers\UserHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // return auth()->user()->roles;
        return view('user.dashboard');
    }


}
