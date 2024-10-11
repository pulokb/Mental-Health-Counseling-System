@extends('layouts.admin')
@section('title'){{ __('View') }} {{__('User Query')}} {{ __('Details') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('View')." ".__('User Query'),'url'=>route('admin.userQueries.index'),'icon' => $icon??'','permission'=>'UserQuery-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    @include('admin.userqueries.show_fields')
                    <a href="{{ route('admin.userQueries.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> {{ __('Back') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
