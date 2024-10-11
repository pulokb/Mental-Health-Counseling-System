@extends('layouts.admin')
@section('title'){{ __('User Queries') }} @endsection
@section('content')
@include('includes.page_header_index',['title'=>__('User Queries'),'url'=>route('admin.userQueries.create'),'icon' => $icon??'','permission'=>'UserQuery-create'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    @include('admin.userqueries.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

