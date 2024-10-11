@extends('layouts.admin')
@section('title'){{ __('System Administrator') }} @endsection
@section('content')
@include('includes.page_header_index',['title'=>__('System Administrator'),'url'=>route('admin.admins.create'),'icon' =>'pe-7s-user','permission'=>'admin-create'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    @include('admin.admins.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

