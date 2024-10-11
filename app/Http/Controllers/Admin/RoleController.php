<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\RoleDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Exception;

class RoleController extends Controller
{
    public function index(RoleDataTable $roleDataTable)
    {
        $this->authorize('role-view');
        return $roleDataTable->render('admin.roles.index');

    }

    public function create()
    {
        $this->authorize('role-create');
        $all_permissions  = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('admin.roles.create',compact('all_permissions','permission_groups'));
    }

    public function store(Request $request)
    {

        $this->authorize('role-create');
        $request->validate(['name' => 'required|max:100|unique:roles']);

        $role = Role::create(['name' => $request->name,'description' => $request->description]);

        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        notify()->success(__("Successfully Created"), __("Success"));
        return redirect()->route('admin.roles.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->authorize('role-update');
        $role = Role::findById($id);
        $all_permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('admin.roles.edit', compact('role', 'all_permissions', 'permission_groups'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('role-update');
        $request->validate(['name' => 'required|max:100|unique:roles,name,' . $id]);

        $role = Role::findById($id);
        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $role->name = $request->name;
            $role->description = $request->description;
            $role->save();
            $role->syncPermissions($permissions);
        }

        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect()->route('admin.roles.index');
    }

    public function destroy($id)
    {
        $this->authorize('role-delete');
        $role = Role::findById($id);
        if (!is_null($role)) {
            $role->delete();
        }
    }

    public function deleteBySelection(Request $request)
    {
        $this->authorize($request->permission);
        $dataId = $request->dataId;
        try {
            Role::whereNotIn('id',[1,2,3])->whereIn('id', $dataId)->delete();
            return "success";
        } catch (Exception $e) {
            return "failed";
        }
    }
}
