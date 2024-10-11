@extends('layouts.admin')
@section('title'){{ __('Update  User') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Update User'),'url'=>route('admin.users.index'),'icon' => 'pe-7s-user','permission'=>'user-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                   {!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('admin.users.edit_fields')

                   {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

