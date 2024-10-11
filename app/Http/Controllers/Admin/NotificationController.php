<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\NotificationDataTable;
use App\Http\Requests;
use App\Http\Requests\NotificationCreateRequest;
use App\Http\Requests\NotificationUpdateRequest;
use App\Models\Notification;
use App\Http\Controllers\AppBaseController;

class NotificationController extends AppBaseController
{


    public function index(NotificationDataTable $notificationDataTable)
    {
        $this->authorize('Notification-view');
        $icon = 'pe-7s-bell';
        return $notificationDataTable->render('admin.notifications.index',compact('icon'));
    }

    public function destroy(Notification $notification)
    {
        $this->authorize('Notification-delete');
        $notification->delete();
    }

    public function markRead(Notification $notification)
    {
        $notification->update(['read_status'=>1]);
        notify()->success(__("Successful"), __("Success"));
        return redirect()->route('admin.notifications.index');
    }

    public function markAllRead()
    {
        Notification::where('read_status',0)->update(['read_status' => 1]);
        notify()->success(__("Successful"), __("Success"));
        return redirect()->route('admin.notifications.index');
    }


}
