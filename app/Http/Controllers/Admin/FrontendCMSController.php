<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FrontendPageDataTable;
use App\Http\Controllers\Controller;
use App\Models\FrontendContent;
use App\Models\FrontendPage;
use Illuminate\Http\Request;

class FrontendCMSController extends Controller
{
    public function page(FrontendPageDataTable $frontendPageDataTable)
    {
        $this->authorize('Page-view');
       return  $frontendPageDataTable->render('admin.frontendCMS.page');
    }

    public function pageEdit($id)
    {
        $this->authorize('Page-update');
        $frontendPage = FrontendPage::findOrFail($id);
        return view('admin.frontendCMS.page_edit',compact('frontendPage'));
    }
    public function pageUpdate(Request $request, $id)
    {
        $this->authorize('Page-update');
        $frontendPage = FrontendPage::findOrFail($id);
        $frontendPage->update(['content'=>$request->content]);
        notify()->success(__("Successfully Updated"), __("Success"));

        return redirect()->route('admin.frontendCMS.page');
    }
    public function content()
    {
        $this->authorize('Content-view');
        $content = FrontendContent::all();
        return view('admin.frontendCMS.content',compact('content'));
    }

    public function contentUpdate(Request $request)
    {
        $this->authorize('Content-update');
        FrontendContent::where('key', 'footer_text')->update(['value' => $request->footer_text]);
        FrontendContent::where('key', 'email')->update(['value' => $request->email]);
        FrontendContent::where('key', 'phone')->update(['value' => $request->phone]);
        FrontendContent::where('key', 'address')->update(['value' => $request->address]);

        FrontendContent::where('key', 'facebook')->update(['value' => $request->facebook]);
        FrontendContent::where('key', 'linkedin')->update(['value' => $request->linkedin]);
        FrontendContent::where('key', 'twitter')->update(['value' => $request->twitter]);
        FrontendContent::where('key', 'youtube')->update(['value' => $request->youtube]);

        notify()->success(__("Successfully Updated"), __("Success"));
        return back();
    }
}
