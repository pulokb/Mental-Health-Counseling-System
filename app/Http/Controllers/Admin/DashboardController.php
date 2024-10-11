<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\DefaultMail;
use App\Models\Admin;
use App\Models\LoginActivity;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function dashboard()
    {

        // Mail::to('touhedulislam46@gmail.com')->send(new DefaultMail("Test Mail","<h3>This is a test Mail</h3>"));
        // return Session::get('locale');
        $this->authorize('dashboard-view');


        $todayUser = User::role('user')->whereDate('created_at', Carbon::today())->count();
        $weekUser = User::role('user')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $monthUser = User::role('user')->whereMonth('created_at', Carbon::now()->month)->count();
        $yearUser = User::role('user')->whereYear('created_at', date('Y'))->count();

        $recentlyRegisteredUsers = User::role('user')->latest()->take(5)->get();

        return view('admin.others.dashboard', compact(
            'todayUser',
            'weekUser',
            'monthUser',
            'yearUser',
            'recentlyRegisteredUsers',

        ));
    }
}
