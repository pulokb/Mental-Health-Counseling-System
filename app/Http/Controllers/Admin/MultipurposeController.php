<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Exception;

class MultipurposeController extends Controller
{
    public function maintenanceMode()
    {
        $this->authorize('maintenance-mode');
        return view('admin.others.maintenance');
    }

    public function maintenanceModeUpdate(Request $request)
    {


        $this->authorize('maintenance-mode');
        if ($request->has('status')) {
            Artisan::call('down');
            updateEnv(['MAINTENANCE_MODE' => 'true']);
            // overWriteEnvFile('MAINTENANCE_MODE',true);
        } else {
            Artisan::call('up');
            updateEnv(['MAINTENANCE_MODE' => 'false']);
            // overWriteEnvFile('MAINTENANCE_MODE',false);
        }
        notify()->success(__("Successful"), __("Success"));
        return back();
    }

    public function deleteBySelection(Request $request)
    {
        $this->authorize($request->permission);
        $dataId = $request->dataId;
        $model = "App\Models\\" . $request['model'];
        try {
            $model::whereIn('id', $dataId)->delete();
            return "success";
        } catch (Exception $e) {
            return "failed";
        }
    }
}
