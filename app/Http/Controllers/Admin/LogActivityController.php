<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AdminLoginActivityDataTable;
use App\DataTables\SystemActivityLogDataTable;
use App\DataTables\UserLoginActivityDataTable;
use App\Http\Controllers\Controller;
use App\Models\LoginActivity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Spatie\Activitylog\Models\Activity;

class LogActivityController extends Controller
{
    public function userLoginActivity(UserLoginActivityDataTable $userLoginActivityDataTable)
    {
        $this->authorize('log-activity-view');
        return $userLoginActivityDataTable->render('admin.activity_logs.user_login_activity');
    }

    public function adminLoginActivity(AdminLoginActivityDataTable $adminLoginActivityDataTable)
    {
        $this->authorize('log-activity-view');
        return $adminLoginActivityDataTable->render('admin.activity_logs.admin_login_activity');
    }

    public function deleteLoginActivity($id)
    {
        $this->authorize('log-activity-delete');
        $loginActivity = LoginActivity::findOrFail($id);
        $loginActivity->delete();
    }

    public function deleteUserLoginActivity()
    {
        $this->authorize('log-activity-delete');
        $userIds = User::role('user')->pluck('id');
        LoginActivity::whereIn('user_id', $userIds)->delete();
        notify()->success(__("Successfully Deleted"), __("Success"));
        return back();
    }

    public function deleteAdminLoginActivity()
    {
        $this->authorize('log-activity-delete');
        $userIds = User::roleIsNotUser()->pluck('id');
        LoginActivity::whereIn('user_id', $userIds)->delete();
        notify()->success(__("Successfully Deleted"), __("Success"));
        return back();
    }

    public function systemActivityLog(SystemActivityLogDataTable $systemActivityLogDataTable)
    {
        $this->authorize('log-activity-view');
        return $systemActivityLogDataTable->render('admin.activity_logs.system_activity_log');
    }

    public function deleteSystemLogActivity($id)
    {
        $this->authorize('log-activity-delete');
        Activity::where('id', $id)->delete();
    }

    public function deleteAllSystemLogActivity()
    {
        $this->authorize('log-activity-delete');
        Artisan::call('activitylog:clean');
        notify()->success(__("Successfully Deleted"), __("Success"));
        return back();
    }

    public function deleteBySelection(Request $request)
    {
        $this->authorize($request->permission);
        Activity::whereIn('id', $request->dataId)->delete();
    }

    public function configureSystemLogActivity(Request $request)
    {

        $this->authorize('log-activity-configure');
        if ($request->has('status')) {
            // updateEnv('ACTIVITY_LOGGER_ENABLED','true');
            updateEnv(['ACTIVITY_LOGGER_ENABLED'=>'true']);
        } else {
            // updateEnv('ACTIVITY_LOGGER_ENABLED','false');
            updateEnv(['ACTIVITY_LOGGER_ENABLED'=>'false']);
        }
        notify()->success(__("Successful"), __("Success"));
        return back();
    }
}
