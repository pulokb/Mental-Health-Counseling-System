@extends('layouts.admin')
@section('title'){{ __('Update  System Administrator') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Update System Administrator'),'url'=>route('admin.admins.index'),'icon' => 'pe-7s-user','permission'=>'admin-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                   {!! Form::model($admin, ['route' => ['admin.admins.update', $admin->id], 'method' => 'patch']) !!}

                        @include('admin.admins.fields')

                   {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

