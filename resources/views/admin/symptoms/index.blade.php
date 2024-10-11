@extends('layouts.admin')
@section('title'){{ __('Symptoms') }} @endsection
@section('content')
@include('includes.page_header_index',['title'=>__('Symptoms'),'url'=>route('admin.symptoms.create'),'icon' => $icon??'','permission'=>'Symptoms-create'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    @include('admin.symptoms.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

