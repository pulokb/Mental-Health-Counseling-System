@extends('layouts.admin')
@section('title'){{ __('View  User Details') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('View User'),'url'=>route('admin.users.index'),'icon' => 'pe-7s-menu','permission'=>'user-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    @include('admin.users.show_fields')
                    <a href="{{ route('admin.users.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> {{ __('Back') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
