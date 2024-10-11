@extends('layouts.admin')
@section('title'){{ __('View  Language Details') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('View Language'),'url'=>route('admin.languages.index'),'icon' => $icon,'permission'=>'Language-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    @include('admin.languages.show_fields')
                    <a href="{{ route('admin.languages.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> {{ __('Back') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
