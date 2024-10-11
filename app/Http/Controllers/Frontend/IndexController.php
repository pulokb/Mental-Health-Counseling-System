<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactFeedback;
use App\Models\Gallery;
use App\Services\VisitorService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        // return date('Y-m-d H:i:s');

        // (new VisitorService())->checkBlockIp();
        // (new VisitorService())->saveVisitorInfo();
        // return redirect()->route('login');
        return view('frontend.index');
    }

    public function changeLanguage($locale)
    {
        app()->setLocale($locale);
        session()->put('locale', $locale);
        return back();
    }


}
