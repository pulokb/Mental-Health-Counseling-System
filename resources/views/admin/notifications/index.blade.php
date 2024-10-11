@extends('layouts.admin')
@section('title')
    {{ __('Notification') }}
@endsection
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="{{ $icon ?? '' }} icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div> {{ __('Notification') }}</div>
            </div>
            @can('Notification-mark-read')
                <div class="page-title-actions">
                    <div class="d-inline-block dropdown">
                        <a href="#"
                            onclick="if(confirm('{{ __('Are you sure') }} ?')){
                    event.preventDefault();
                document.getElementById('notification-form').submit();}"
                            type="button" class="btn-shadow btn btn-warning">
                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                <i class="fas fa-exclamation-triangle fa-w-20"></i>
                            </span>
                            {{ __('Mark All Read') }}
                        </a>
                    </div>
                </div>
                <form id="notification-form" action="{{ route('admin.notifications.markAllRead') }}" method="GET"
                    style="display: none;">
                    @csrf
                </form>
            @endcan

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div class="table-responsive">
                        @include('admin.notifications.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
