<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UserDataTable;
use App\Http\Requests;
use App\Helpers\FileHelper;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends AppBaseController
{

    public function index(UserDataTable $userDataTable)
    {
        // return  $users = User::all();
        //  $users = User::with('login_activity')->get();
        // return view('admin.users.index',compact('users'));
        $this->authorize('user-view');
        $users = User::all();
        return $userDataTable->render('admin.users.index', compact('users'));
    }


    public function create()
    {
        $this->authorize('user-create');
        return view('admin.users.create');
    }


    public function store(UserCreateRequest $request)
    {
        $this->authorize('user-create');
        $status = $request->status ?? 0;
        $imageName = FileHelper::uploadImage($request, NULL, ['avatar', 'avatarHeight' => 50, 'avatarWidth' => 50]);
        $user = User::create(array_merge($request->validated(), ['image' => $imageName, 'status' => $status, 'password' => bcrypt($request->password)]));
        $user->assignRole('user');
        notify()->success(__("Successfully Created"), __("Success"));
        return redirect(route('admin.users.index'));
    }


    public function show($id)
    {
        $this->authorize('user-view');
        $user = User::findOrFail($id);
        return view('admin.users.show')->with('user', $user);
    }


    public function edit($id)
    {
        $this->authorize('user-update');
        $user = User::findOrFail($id);
        return view('admin.users.edit')->with('user', $user);
    }


    public function update($id, UserUpdateRequest $request)
    {
        $this->authorize('user-update');
        $user = User::findOrFail($id);
        $imageName = FileHelper::uploadImage($request, $user, ['avatar', 'avatarHeight' => 50, 'avatarWidth' => 50]);
        if ($request->password) {
            $password = bcrypt($request->password);
        } else {
            $password = $user->password;
        }
        $status = $request->status ?? 0;
        $user->fill(array_merge($request->validated(), ['image' => $imageName, 'password' => $password, 'status' => $status,]))->save();

        notify()->success(__("Successfully Updated"), __("Success"));
        return back();
    }


    public function destroy($id)
    {
        $this->authorize('user-delete');
        $user = User::findOrFail($id);
        FileHelper::deleteImage($user);
        $user->delete();
    }

    public function loginAsUser($userId)
    {
        $this->authorize('user-login');
        $user = User::find($userId);
        Auth::login($user);
        return redirect()->route('index');
    }
}
