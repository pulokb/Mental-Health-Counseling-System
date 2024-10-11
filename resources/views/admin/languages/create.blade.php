@extends('layouts.admin')
@section('title'){{ __('Create Language') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Create Language'),'url'=>route('admin.languages.index'),'icon' => $icon,'permission'=>'Language-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    {!! Form::open(['route' => 'admin.languages.store']) !!}

                        @include('admin.languages.fields')

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

