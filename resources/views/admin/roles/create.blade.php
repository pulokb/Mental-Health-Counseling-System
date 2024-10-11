@extends('layouts.admin')
@section('title'){{ __('Create Role') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Create Role'),'url'=>route('admin.roles.index'),'icon' => $icon ?? 'pe-7s-user','permission'=>'role-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">

                <form action="{{ route('admin.roles.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('Role Name') }}</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="name">{{ __('Role Description') }}</label>
                        <textarea name="description" id="" cols="30" rows="3" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="name">{{ __('Permissions') }}</label>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1">
                            <label class="form-check-label" for="checkPermissionAll">{{ __('All') }}</label>
                        </div>
                        <hr>
                        @php $i = 1; @endphp
                        @foreach ($permission_groups as $group)
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                                        <label class="form-check-label" for="checkPermission">{{ ucfirst($group->name) }}</label>
                                    </div>
                                </div>

                                <div class="col-9 role-{{ $i }}-management-checkbox">
                                    @php
                                        $permissions = App\Models\User::getpermissionsByGroupName($group->name);
                                        $j = 1;
                                    @endphp
                                    @foreach ($permissions as $permission)
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="permissions[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                            <label class="form-check-label" for="checkPermission{{ $permission->id }}">

                                                {{ ucfirst($permission->name) }}
                                            </label>
                                        </div>
                                        @php  $j++; @endphp
                                    @endforeach
                                </div>

                            </div>
                            <hr>
                            @php  $i++; @endphp
                        @endforeach


                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"
                                aria-hidden="true"></i> {{ __('Submit') }}</button>
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-danger"><i class="fa fa-window-close"
                                aria-hidden="true"></i> {{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
     @include('admin.roles.scripts')
@endsection

