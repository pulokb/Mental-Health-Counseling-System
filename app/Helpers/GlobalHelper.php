<?php

use App\Models\Notification;
use App\Models\Setting;

if (!function_exists('setting')) {

    /**
     * get the setting from database
     *
     * @param  string $name
     * @return string
     */
    function setting($name)
    {
        $setting = Setting::where('name', $name)->first();
        return $setting->value ?? NULL;
    }
}
if (!function_exists('updateEnv')) {
    function updateEnv($data = []): void
    {

        $path = base_path('.env');

        if (file_exists($path)) {
            foreach ($data as $key => $value) {
                file_put_contents($path, str_replace(
                    $key . '=' . env($key),
                    $key . '=' . $value,
                    file_get_contents($path)
                ));
            }
        }
    }
}


if (!function_exists('overWriteEnvFile')) {
    function overWriteEnvFile($type, $val)
    {
        $path = base_path('.env');
        if (file_exists($path)) {
            $val = '"' . trim($val) . '"';
            if (is_numeric(strpos(file_get_contents($path), $type)) && strpos(file_get_contents($path), $type) >= 0) {
                file_put_contents($path, str_replace(
                    $type . '="' . env($type) . '"',
                    $type . '=' . $val,
                    file_get_contents($path)
                ));
            } else {
                file_put_contents($path, file_get_contents($path) . "\r\n" . $type . '=' . $val);
            }
        }
    }
}

if (!function_exists('notification')) {
    function notification($data = []): void
    {
        Notification::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'link' => $data['link'],
        ]);
    }
}

if (!function_exists('myDateFormat')) {
    function myDateFormat($timeStamp, $returnDate = true, $returnTime = true, $returnDifference = true)
    {
        if($timeStamp == NULL){
            return "";
        }
        $date = date('d/M/Y', strtotime($timeStamp));
        $time = date(' h:i a', strtotime($timeStamp));
        $difference = \Carbon\Carbon::parse($timeStamp)->diffForHumans();

        if ($returnDate && $returnTime && $returnDifference) {
            $return =  $date . " " . $time . " (" . $difference . ")";
        } elseif ($returnDate && $returnTime && $returnDifference == false) {
            $return =  $date . " " . $time;
        } elseif ($returnDate && $returnTime == false && $returnDifference) {
            $return =  $date . " " . " (" . $difference . ")";
        } elseif ($returnDate==false && $returnTime && $returnDifference) {
            $return =  $time . " " . " (" . $difference . ")";
        } elseif ($returnDate && $returnTime == false && $returnDifference == false) {
            $return =  $date;
        } elseif ($returnDate==false && $returnTime == true && $returnDifference == false) {
            $return =  $time;
        } elseif ($returnDate==false && $returnTime == false && $returnDifference) {
            $return =  $difference;
        }else{
            $return = "";
        }

        return $return;
    }
}
