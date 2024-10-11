@extends('layouts.admin')
@section('title'){{ __('View') }} {{__('Doctor Feedback')}} {{ __('Details') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('View')." ".__('Doctor Feedback'),'url'=>route('admin.doctorFeedbacks.index'),'icon' => $icon??'','permission'=>'DoctorFeedback-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    @include('admin.doctor_feedbacks.show_fields')
                    <a href="{{ route('admin.doctorFeedbacks.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> {{ __('Back') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
