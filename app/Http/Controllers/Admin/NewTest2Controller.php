<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\NewTest2DataTable;
use App\Http\Requests;
use App\Http\Requests\NewTest2CreateRequest;
use App\Http\Requests\NewTest2UpdateRequest;
use App\Models\NewTest2;
use App\Http\Controllers\AppBaseController;

class NewTest2Controller extends AppBaseController
{

    private $icon = 'pe-7s-menu';


    public function index(NewTest2DataTable $newTest2DataTable)
    {
        $this->authorize('NewTest2-view');
        $icon = $this->icon;
        return $newTest2DataTable->render('admin.new_test2s.index',compact('icon'));
    }


    public function create()
    {
        $this->authorize('NewTest2-create');
        return view('admin.new_test2s.create')->with('icon', $this->icon);
    }


    public function store(NewTest2CreateRequest $request)
    {
        $this->authorize('NewTest2-create');
        NewTest2::create($request->all());
        //$imageName = FileHelper::uploadImage($request);
        //NewTest2::create(array_merge($request->all(), ['image' => $imageName]));
        notify()->success(__("Successfully Created"), __("Success"));
        return redirect(route('admin.newTest2s.index'));
    }


    public function show(NewTest2 $newTest2)
    {
        $this->authorize('NewTest2-view');
        return view('admin.new_test2s.show',compact('newTest2'))->with('icon', $this->icon);
    }


    public function edit(NewTest2 $newTest2)
    {
        $this->authorize('NewTest2-update');
        return view('admin.new_test2s.edit',compact('newTest2'))->with('icon', $this->icon);
    }


    public function update(NewTest2 $newTest2, NewTest2UpdateRequest $request)
    {
        $this->authorize('NewTest2-update');
        // $imageName = FileHelper::uploadImage($request, $newTest2);
        // $newTest2->fill(array_merge($request->all(), ['image' => $imageName]))->save();
        $newTest2->fill($request->all())->save();
        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.newTest2s.index'));
    }


    public function destroy(NewTest2 $newTest2)
    {
        $this->authorize('NewTest2-delete');
        //FileHelper::deleteImage($newTest2);
        $newTest2->delete();
    }
}
