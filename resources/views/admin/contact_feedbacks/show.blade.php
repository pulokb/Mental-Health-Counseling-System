@extends('layouts.admin')
@section('title'){{ __('View Contacts') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('View Contacts'),'url'=>route('admin.contacts'),'icon' =>
'pe-7s-network'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <!-- Name Field -->
                <div class="form-group">
                    <b>{!! Form::label('name', __('Name')) !!}</b>
                    <p>{{ $contactFeedback->name }}</p>
                </div>

                <!-- Email Field -->
                <div class="form-group">
                    <b>{!! Form::label('email', __('Email')) !!}</b>
                    <p>{{ $contactFeedback->email }}</p>
                </div>

                <!-- phone Field -->
                <div class="form-group">
                    <b>{!! Form::label('phone', __('Phone')) !!}</b>
                    <p>{{ $contactFeedback->phone }}</p>
                </div>

                <!-- message Field -->
                <div class="form-group">
                    <b>{!! Form::label('message', __('Message')) !!}</b>
                    <p>{{ $contactFeedback->message }}</p>
                </div>


                <!-- Created At Field -->
                <div class="form-group">
                    <b>{!! Form::label('created_at', __('Time')) !!}</b>
                    <p>{{ $contactFeedback->created_at->toFormattedDateString() }}</p>
                </div>

                <a href="{{ route('admin.contacts') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i>
                    {{ __('Back') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
