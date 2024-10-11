@extends('layouts.admin')
@section('title')
    {{ __('Visitor Block List') }}
@endsection
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-id icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div> {{ __('Visitor Block List') }}</div>
            </div>
            @can('Visitor-block-remove')
                <div class="page-title-actions">
                    <div class="d-inline-block dropdown">
                        <a href="#" onclick="if(confirm("{{ __('Are you sure to remove') }}")){ event.preventDefault();
                            document.getElementById('visitor-info-form').submit();}" type="button"
                            class="btn-shadow btn btn-danger">
                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                <i class="fas fa-trash fa-w-20"></i>
                            </span>
                            {{ __('Remove All From Black List') }}
                        </a>
                    </div>
                </div>
                <form id="visitor-info-form" action="{{ route('admin.visitorRemoveFromBlockListAll') }}" method="POST"
                    style="display: none;">
                    @csrf
                </form>
            @endcan
        </div>
    </div>
    @can('Visitor-block-create')
        <div class="row">
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form action="{{ route('admin.visitorIpBlock') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">{{ __('Enter Ip Address to block') }}</label>
                                <input type="text" name="ip_address" class="form-control">
                            </div>
                            <div class="form-group">
                                {{ Form::button('<i class="fas fa-plus-circle"></i> ' . __('Submit'), ['type' => 'submit', 'class' => 'btn btn-primary ']) }}

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endcan
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
