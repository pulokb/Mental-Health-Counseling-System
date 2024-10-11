@extends('layouts.admin')
@section('title'){{ __('Roles') }} @endsection
@section('content')
@include('includes.page_header_index',['title'=>__('Roles'),'url'=>route('admin.roles.create'),'icon' =>'pe-7s-user','permission'=>'role-create'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    @include('admin.roles.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

