<?php

namespace App\Listeners;

use App\Models\LoginActivity;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SuccessLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $loginActivity = LoginActivity::where('user_id',$event->user->id)->first();
        if(!$loginActivity){
            $loginActivity = new LoginActivity();
        }
        $loginActivity->user_id = $event->user->id;
        $loginActivity->user_agent = \Illuminate\Support\Facades\Request::header('User-Agent');
        $loginActivity->ip_address = \Illuminate\Support\Facades\Request::ip();
        $loginActivity->touch();
    }
}
