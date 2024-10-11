<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AdminDataTable;
use App\Http\Requests;
use App\Helpers\FileHelper;
use App\Http\Requests\AdminCreateRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Admin;
use App\Http\Controllers\AppBaseController;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Exception;
use Illuminate\Http\Request;

class AdminController extends AppBaseController
{

    public function index(AdminDataTable $adminDataTable)
    {
        // return User::doesntHave('roles')->get();
        // $role = Role::whereNotIn('name', ['user','super-admin'])->pluck('name');
        // return $user = User::role($role)->with('roles')->get();
        // return User::doesntHave('roles')->get();
        // return Role::whereNotIn('name', ['user','super-admin'])->with('users')->get();
        $this->authorize('admin-view');
        return $adminDataTable->render('admin.admins.index');
    }


    public function create()
    {
        $this->authorize('admin-create');
        return view('admin.admins.create');
    }


    public function store(AdminCreateRequest $request)
    {
        // return $request;
        $this->authorize('admin-create');
        $admin = User::create(array_merge($request->validated(), ['password' => bcrypt($request->password)]));
        $admin->assignRole($request->roles);
        //$imageName = FileHelper::uploadImage($request);
        //Admin::create(array_merge($request->validated(), ['image' => $imageName]));
        notify()->success(__("Successfully Created"), __("Success"));
        return redirect(route('admin.admins.index'));
    }


    public function show($id)
    {
        $this->authorize('admin-view');
        $admin = User::findOrFail($id);
        return view('admin.admins.show')->with('admin', $admin);
    }


    public function edit($id)
    {
        $this->authorize('admin-update');
         $admin = User::findOrFail($id);
        return view('admin.admins.edit')->with('admin', $admin);
    }


    public function update($id, AdminUpdateRequest $request)
    {
        $this->authorize('admin-update');
        $admin = User::findOrFail($id);
         if ($request->password) {
            $password = bcrypt($request->password);
        } else {
            $password = $admin->password;
        }
        // $imageName = FileHelper::uploadImage($request, $admin);
        // $admin->fill(array_merge($request->validated(), ['image' => $imageName]))->save();
        $admin->fill(array_merge($request->validated(), ['password' => $password]))->save();
        $admin->roles()->detach();
        $admin->assignRole($request->roles);

        notify()->success(__("Successfully Updated"), __("Success"));
        return back();
    }


    public function destroy($id)
    {
        $this->authorize('admin-delete');
        $admin = User::findOrFail($id);
        //FileHelper::deleteImage($admin);
        $admin->roles()->detach();
        $admin->delete();
    }

    public function deleteBySelection(Request $request)
    {
        $this->authorize($request->permission);
        $dataId = $request->dataId;
        $admins = User::whereNotIn('id',[1,2])->whereIn('id', $dataId)->get();

        foreach($admins as $admin){
            $admin->roles()->detach();
            $admin->delete();
        }


    }


}
