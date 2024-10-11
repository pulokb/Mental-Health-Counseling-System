@extends('layouts.admin')
@section('title'){{__('Create')}} {{ __('Suggestions') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Create')." ". __('Suggestions'),'url'=>route('admin.suggestions.index'),'icon' => $icon??'','permission'=>'Suggestions-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    {!! Form::open(['route' => 'admin.suggestions.store', 'files' => true]) !!}

                        @include('admin.suggestions.fields')

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

