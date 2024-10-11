@extends('layouts.admin')
@section('title'){{ __('View') }} {{__('Suggestions')}} {{ __('Details') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('View')." ".__('Suggestions'),'url'=>route('admin.suggestions.index'),'icon' => $icon??'','permission'=>'Suggestions-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    @include('admin.suggestions.show_fields')
                    <a href="{{ route('admin.suggestions.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> {{ __('Back') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
