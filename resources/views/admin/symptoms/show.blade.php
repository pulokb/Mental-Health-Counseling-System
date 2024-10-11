@extends('layouts.admin')
@section('title'){{ __('View') }} {{__('Symptoms')}} {{ __('Details') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('View')." ".__('Symptoms'),'url'=>route('admin.symptoms.index'),'icon' => $icon??'','permission'=>'Symptoms-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    @include('admin.symptoms.show_fields')
                    <a href="{{ route('admin.symptoms.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> {{ __('Back') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
