<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UserQueryDataTable;
use App\Http\Requests;
use App\Http\Requests\UserQueryCreateRequest;
use App\Http\Requests\UserQueryUpdateRequest;
use App\Models\UserQuery;
use App\Http\Controllers\AppBaseController;

class UserQueryController extends AppBaseController
{

    private $icon = 'pe-7s-menu';


    public function index(UserQueryDataTable $userQueryDataTable)
    {
        $this->authorize('UserQuery-view');
        $icon = $this->icon;
        return $userQueryDataTable->render('admin.userqueries.index',compact('icon'));
    }


    public function create()
    {
        $this->authorize('UserQuery-create');
        return view('admin.userqueries.create')->with('icon', $this->icon);
    }


    public function store(UserQueryCreateRequest $request)
    {
        $this->authorize('UserQuery-create');
        UserQuery::create($request->all());
        //$imageName = FileHelper::uploadImage($request);
        //UserQuery::create(array_merge($request->all(), ['image' => $imageName]));
        notify()->success(__("Successfully Created"), __("Success"));
        return redirect(route('admin.userQueries.index'));
    }


    public function show(UserQuery $userQuery)
    {
        $this->authorize('UserQuery-view');
        return view('admin.userqueries.show',compact('userQuery'))->with('icon', $this->icon);
    }


    public function edit(UserQuery $userQuery)
    {
        $this->authorize('UserQuery-update');
        return view('admin.userqueries.edit',compact('userQuery'))->with('icon', $this->icon);
    }


    public function update(UserQuery $userQuery, UserQueryUpdateRequest $request)
    {
        $this->authorize('UserQuery-update');
        // $imageName = FileHelper::uploadImage($request, $userQuery);
        // $userQuery->fill(array_merge($request->all(), ['image' => $imageName]))->save();
        $userQuery->fill($request->all())->save();
        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.userQueries.index'));
    }


    public function destroy(UserQuery $userQuery)
    {
        $this->authorize('UserQuery-delete');
        //FileHelper::deleteImage($userQuery);
        $userQuery->delete();
    }
}
