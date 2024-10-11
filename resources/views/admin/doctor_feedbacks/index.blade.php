@extends('layouts.admin')
@section('title'){{ __('Doctor Feedbacks') }} @endsection
@section('content')
@include('includes.page_header_index',['title'=>__('Doctor Feedbacks'),'url'=>route('admin.doctorFeedbacks.create'),'icon' => $icon??'','permission'=>'DoctorFeedback-create'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    @include('admin.doctor_feedbacks.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

