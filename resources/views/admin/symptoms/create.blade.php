@extends('layouts.admin')
@section('title'){{__('Create')}} {{ __('Symptoms') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Create')." ". __('Symptoms'),'url'=>route('admin.symptoms.index'),'icon' => $icon??'','permission'=>'Symptoms-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    {!! Form::open(['route' => 'admin.symptoms.store', 'files' => true]) !!}

                        @include('admin.symptoms.fields')

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

