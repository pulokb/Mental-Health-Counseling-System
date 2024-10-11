@extends('layouts.admin')
@section('title'){{ __('View') }} {{__('New Test2')}} {{ __('Details') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('View')." ".__('New Test2'),'url'=>route('admin.newTest2s.index'),'icon' => $icon??'','permission'=>'NewTest2-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    @include('admin.new_test2s.show_fields')
                    <a href="{{ route('admin.newTest2s.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> {{ __('Back') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
