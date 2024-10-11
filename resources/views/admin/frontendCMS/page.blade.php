@extends('layouts.admin')
@section('title'){{ __('Page') }} @endsection
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="{{$icon??'pe-7s-album'}} icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div> {{ __('Page') }}</div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    @push('css')
                    @include('includes.datatable_css')
                    @endpush

                    {!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered table-hover','id'=>'data-table']) !!}

                    @section('script')
                    @include('includes.datatable_js')
                        {!! $dataTable->scripts() !!}
                    @endsection
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

