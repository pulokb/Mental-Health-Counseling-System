@extends('layouts.admin')
@section('title'){{ __('View  Notification Details') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('View Notification'),'url'=>route('admin.notifications.index'),'icon' => $icon??'','permission'=>'Notification-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    @include('admin.notifications.show_fields')
                    <a href="{{ route('admin.notifications.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> {{ __('Back') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
