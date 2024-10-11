@extends('layouts.admin')
@section('title'){{ __('Suggestions') }} @endsection
@section('content')
@include('includes.page_header_index',['title'=>__('Suggestions'),'url'=>route('admin.suggestions.create'),'icon' => $icon??'','permission'=>'Suggestions-create'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    @include('admin.suggestions.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

