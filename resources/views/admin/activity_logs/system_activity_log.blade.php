@extends('layouts.admin')
@section('title')
    {{ __('System Activity Log') }}
@endsection
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-diamond icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div> {{ __('System Activity Log') }}</div>
            </div>
            @can('log-activity-delete')
                <div class="page-title-actions">
                    <div class="d-inline-block dropdown">
                        <a href="#"
                            onclick="if(confirm('{{ __('Are you sure to delete') }} ?')){
                    event.preventDefault();
                document.getElementById('login-activity-form').submit();}"
                            type="button" class="btn-shadow btn btn-danger">
                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                <i class="fas fa-trash fa-w-20"></i>
                            </span>
                            {{ __('Delete All Activity') }}
                        </a>
                    </div>
                </div>
                <form id="login-activity-form" action="{{ route('admin.deleteAllSystemLogActivity') }}" method="POST"
                    style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            @endcan
        </div>
    </div>

    @can('log-activity-configure')
        <div class="row">
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form action="{{ route('admin.configureSystemLogActivity') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input name="status" value="1" @if (env('ACTIVITY_LOGGER_ENABLED') == true) checked @endif
                                        type="checkbox" class="custom-control-input" id="customSwitch1">
                                    <label class="custom-control-label" for="customSwitch1">{{ __('Status') }}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::button('<i class="fas fa-plus-circle"></i> '.__('Submit'), ['type' => 'submit', 'class' => 'btn btn-primary ']) }}
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
                        @include('admin.activity_logs.system_activity_log_table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
