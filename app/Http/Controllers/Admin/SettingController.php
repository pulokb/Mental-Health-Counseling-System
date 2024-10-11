<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SettingCreateRequest;
use App\Http\Requests\SettingUpdateRequest;
use App\Models\Setting;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\EmailSettingRequest;
use App\Mail\DefaultMail;
use App\Services\SettingService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SettingController extends AppBaseController
{

    private $icon = 'pe-7s-settings';


    public function index()
    {

        $this->authorize('setting-view');
        $icon = 'pe-7s-settings';
        $settings = Setting::all();
        return view('admin.settings.index', compact('icon', 'settings'));
    }


    public function create()
    {
        return view('admin.settings.create')->with('icon', $this->icon);
    }


    public function store(SettingCreateRequest $request)
    {
        Setting::create($request->all());
        //$imageName = FileHelper::uploadImage($request);
        //Setting::create(array_merge($request->all(), ['image' => $imageName]));

        notify()->success(__("Successfully Created"), __("Success"));
        return redirect(route('admin.settings.index'));
    }


    public function updateAll(SettingUpdateRequest $request)
    {

        // return $request;
        $this->authorize('setting-update');

        // General Setting
        Setting::where('name', 'site_title')->update(['value' => $request->site_title]);
        Setting::where('name', 'site_description')->update(['value' => $request->site_description]);
        Setting::where('name', 'admin_header_color')->update(['value' => $request->admin_header_color]);
        Setting::where('name', 'admin_sidebar_color')->update(['value' => $request->admin_sidebar_color]);
        SettingService::uploadLogoOrIcon($request, "site_logo");
        SettingService::uploadLogoOrIcon($request, "site_favicon");
        SettingService::uploadLogoOrIcon($request, "admin_logo");


        // Mail Setting
        // Setting::where('name', 'mail_mailer')->update(['value' => $request->mail_mailer]);
        // Setting::where('name', 'mail_host')->update(['value' => $request->mail_host]);
        // Setting::where('name', 'mail_port')->update(['value' => $request->mail_port]);
        // Setting::where('name', 'mail_username')->update(['value' => $request->mail_username]);
        // Setting::where('name', 'mail_password')->update(['value' => $request->mail_password]);
        // Setting::where('name', 'mail_encryption')->update(['value' => $request->mail_encryption]);
        // Setting::where('name', 'mail_from_address')->update(['value' => $request->mail_from_address]);
        // Setting::where('name', 'mail_from_name')->update(['value' => $request->mail_from_name]);


        // Socialite Settings
        // Setting::where('name', 'facebook_client_id')->update(['value' => $request->facebook_client_id]);
        // Setting::where('name', 'facebook_client_secret')->update(['value' => $request->facebook_client_secret]);
        // Setting::where('name', 'google_client_id')->update(['value' => $request->google_client_id]);
        // Setting::where('name', 'google_client_secret')->update(['value' => $request->google_client_secret]);


        // Update .env file
        SettingService::setEnv($request);

        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.settings.index'));
    }

    public function updateEmailSettingView()
    {
        $this->authorize('setting-view');
        return view('admin.settings.email');
    }

    public function updateEmailSetting(EmailSettingRequest $request)
    {
        $this->authorize('setting-update');
        SettingService::setEmailEnv($request);
        notify()->success(__("Successfully Updated"), __("Success"));
        return back();
    }

    public function sendTestMail(Request $request)
    {
        $this->authorize('setting-update');
        $request->validate(['to' => 'required|email']);
        try {
            Mail::to($request->to)->send(new DefaultMail("Test Mail","<h3>This is a test Mail</h3>"));
            notify()->success(__("Test Email Send Successful"), __("Success"));
            return back();
        } catch (Exception $th) {
            notify()->error(__("Something Went Wrong"), __("Error"));
            return back();
        }

    }
    public function sendMail(Request $request)
    {
        $this->authorize('setting-update');
        $request->validate(['to' => 'required|email','subject' => 'required|string','body' => 'required|string']);
        try {
            Mail::to($request->to)->send(new DefaultMail($request->subject,$request->body));
            notify()->success(__("Email Send Successful"), __("Success"));
            return back();
        } catch (Exception $th) {
            notify()->error(__("Something Went Wrong"), __("Error"));
            return back();
        }

    }
}
