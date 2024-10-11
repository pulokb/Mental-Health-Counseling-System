<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\VisitorBlockListDataTable;
use App\DataTables\VisitorInfoDataTable;
use App\Http\Controllers\Controller;
use App\Models\VisitorInfo;
use Illuminate\Http\Request;

class VisitorInfoController extends Controller
{


    public function visitorInfo(VisitorInfoDataTable $visitorInfoDataTable)
    {
        $this->authorize('Visitor-info');
        return $visitorInfoDataTable->render('admin.visitor_infos.visitor_info');
    }


    public function visitorBlockList(VisitorBlockListDataTable $visitorBlockListDataTable)
    {
        $this->authorize('Visitor-block-list');
        return $visitorBlockListDataTable->render('admin.visitor_infos.visitor_block_list');
    }


    public function visitorInfoDelete($id)
    {
        $this->authorize('Visitor-info-delete');
        VisitorInfo::where('id', $id)->delete();
    }


    public function visitorInfoDeleteAll()
    {
        $this->authorize('Visitor-info-delete');
        VisitorInfo::where('status', 1)->delete();
        notify()->success(__("Successfully Deleted"), __("Success"));
        return back();
    }


    public function visitorRemoveFromBlockList($id)
    {
        $this->authorize('Visitor-block-remove');
        VisitorInfo::where('id', $id)->update(['status' => 1]);
        notify()->success(__("Successful"), __("Success"));
        return back();
    }


    public function visitorRemoveFromBlockListAll()
    {
        $this->authorize('Visitor-block-remove');
        VisitorInfo::where('status', 0)->update(['status' => 1]);
        notify()->success(__("Successful"), __("Success"));
        return back();
    }


    public function visitorIpBlock(Request $request)
    {
        $this->authorize('Visitor-block-create');
        $request->validate(['ip_address' => 'required|ip']);

        $visitoInfo = VisitorInfo::where('ip_address', $request->ip_address)->first();
        if ($visitoInfo) {
            $visitoInfo->update(['status' => 0]);
        } else {
            VisitorInfo::create(array_merge($request->only(['ip_address']), ['status' => 0]));
        }
        notify()->success(__("Successful"), __("Success"));
        return back();
    }
}
