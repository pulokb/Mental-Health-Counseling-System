@extends('layouts.admin')
@section('title'){{__('Create')}} {{ __('Doctor Feedback') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Create')." ". __('Doctor Feedback'),'url'=>route('admin.doctorFeedbacks.index'),'icon' => $icon??'','permission'=>'DoctorFeedback-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    {!! Form::open(['route' => 'admin.doctorFeedbacks.store']) !!}

                        @include('admin.doctor_feedbacks.fields')

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

