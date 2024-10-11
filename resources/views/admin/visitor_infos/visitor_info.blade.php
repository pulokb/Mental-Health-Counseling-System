@extends('layouts.admin')
@section('title'){{ __('Visitor Info') }} @endsection
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-id icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div> {{ __('Visitor Info') }}</div>
        </div>
        @can('Visitor-info-delete')
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <a href="#" onclick="if(confirm('{{ __('Are you sure to delete') }} ?')){
                    event.preventDefault();
                document.getElementById('visitor-info-form').submit();}"
                type="button" class="btn-shadow btn btn-danger">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fas fa-trash fa-w-20"></i>
                    </span>
                    {{ __('Delete All') }}
                </a>
            </div>
        </div>
        <form id="visitor-info-form" action="{{route('admin.visitorInfoDeleteAll')}}" method="POST"
            style="display: none;">
            @csrf
            @method('DELETE')
        </form>
        @endcan
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    @include('admin.visitor_infos.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
