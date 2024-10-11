@extends('layouts.admin')
@section('title'){{ __('New Test2S') }} @endsection
@section('content')
@include('includes.page_header_index',['title'=>__('New Test2S'),'url'=>route('admin.newTest2s.create'),'icon' => $icon??'','permission'=>'NewTest2-create'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    @include('admin.new_test2s.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

