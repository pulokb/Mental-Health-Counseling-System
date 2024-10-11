<?php

namespace App\Services;

use App\Models\Setting;
use App\Models\VisitorInfo;
use File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Request;

class VisitorService
{
    public function saveVisitorInfo()
    {

        $visitorInfo = VisitorInfo::where('ip_address',Request::ip())->first();

        $count = 0;
        if(!$visitorInfo){
            $visitorInfo = new VisitorInfo();
            $count = 1;
        }else{
            //calculate count. if the user visit home page after 5 min count will increase
            $updated_at = date('Y-m-d H:i:s',strtotime($visitorInfo->updated_at."+5 minutes"));
            if(date('Y-m-d H:i:s') > $updated_at){
                $count = $visitorInfo->count +1;
            }else{
                $count = $visitorInfo->count;
            }
        }

        $visitorInfo->user_agent = Request::header('User-Agent');
        $visitorInfo->ip_address = Request::ip();
        $visitorInfo->count = $count;
        $visitorInfo->touch();
    }

    public function checkBlockIp()
    {
        $visitorInfo = VisitorInfo::where('ip_address',Request::ip())->where('status',0)->first();

        if($visitorInfo){
            abort(503);
        }

    }
}
