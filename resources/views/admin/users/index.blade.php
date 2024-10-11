@extends('layouts.admin')
@section('title'){{ __('Users') }} @endsection
@section('content')
@include('includes.page_header_index',['title'=>__('Users'),'url'=>route('admin.users.create'),'icon' =>'pe-7s-user','permission'=>'user-create'])

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    @include('admin.users.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
