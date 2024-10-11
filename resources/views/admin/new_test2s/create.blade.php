@extends('layouts.admin')
@section('title'){{__('Create')}} {{ __('New Test2') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Create')." ". __('New Test2'),'url'=>route('admin.newTest2s.index'),'icon' => $icon??'','permission'=>'NewTest2-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    {!! Form::open(['route' => 'admin.newTest2s.store']) !!}

                        @include('admin.new_test2s.fields')

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

