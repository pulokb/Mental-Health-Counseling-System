@extends('layouts.admin')
@section('title'){{ __('Maintenance Mode') }} @endsection
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-diamond icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div> {{ __('Maintenance Mode') }}</div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form action="{{route('admin.maintenanceModeUpdate')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <p>{{ __('If maintenance mode is enabled , visitor cannot access to the site') }}.</p>
                        <div class="custom-control custom-switch">
                            <input name="status" value="1"
                            @if (env('MAINTENANCE_MODE') == true)
                                checked
                            @endif
                            type="checkbox" class="custom-control-input" id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1">{{ __('Status') }}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::button('<i class="fas fa-plus-circle"></i> '.__('Submit'), ['type' => 'submit', 'class' => 'btn btn-primary '] )  }}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
