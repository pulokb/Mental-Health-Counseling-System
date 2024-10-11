@extends('layouts.admin')
@section('title'){{ __('Contacts') }} @endsection
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-network icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div> {{ __('Contacts') }}</div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    @include('admin.contact_feedbacks.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
