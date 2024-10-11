<?php

namespace App\Services;

use App\Models\Setting;
use File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Artisan;

class SettingService
{
    public static function uploadLogoOrIcon($request, $key)
    {
        $request->validate([
            'site_logo' => 'image',
            'site_favicon' => 'image',
            'admin_logo' => 'image',
    ]);

        if ($request->hasFile($key)) {
            $setting = Setting::where('name', $key)->first();
            if (File::exists('images/' . $setting->value)) {
                File::delete('images/' . $setting->value);
            }
            $image = $request->file($key);
            $imageName = time() . uniqid() . '.' . $image->getClientOriginalExtension();
            if ($key == "site_favicon") {
                $height = 33;
                $width = 33;
            } else {
                $height = 50;
                $width = 100;
            }
            Image::make($image)->resize($width, $height)->save('images/' . $imageName, 70);
            $setting->value = $imageName;
            $setting->save();
        }
    }

    public static function setEnv($request)
    {

        // updateEnv(['APP_NAME' => $request->site_title ]);
        overWriteEnvFile('APP_NAME', $request->site_title);
        overWriteEnvFile('FACEBOOK_CLIENT_ID', $request->facebook_client_id);
        overWriteEnvFile('FACEBOOK_CLIENT_SECRET', $request->facebook_client_secret);
        overWriteEnvFile('GOOGLE_CLIENT_ID', $request->google_client_id);
        overWriteEnvFile('GOOGLE_CLIENT_SECRET', $request->google_client_secret);
    }

    public static function setEmailEnv($request)
    {
        overWriteEnvFile('MAIL_MAILER', $request->mail_mailer);
        overWriteEnvFile('MAIL_HOST', $request->mail_host);
        overWriteEnvFile('MAIL_PORT', $request->mail_port);
        overWriteEnvFile('MAIL_USERNAME', $request->mail_username);
        overWriteEnvFile('MAIL_PASSWORD', $request->mail_password);
        overWriteEnvFile('MAIL_ENCRYPTION', $request->mail_encryption);
        overWriteEnvFile('MAIL_FROM_ADDRESS', $request->mail_from_address);
        overWriteEnvFile('MAIL_FROM_NAME', $request->mail_from_name);

    }
}
