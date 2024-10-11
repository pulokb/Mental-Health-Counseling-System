@extends('layouts.admin')
@section('title'){{ __('Update') }} {{__('User Query')}} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Update')." ".__('User Query'),'url'=>route('admin.userQueries.index'),'icon' => $icon??'','permission'=>'UserQuery-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                   {!! Form::model($userQuery, ['route' => ['admin.userQueries.update', $userQuery->id], 'method' => 'patch']) !!}

                        @include('admin.userqueries.fields')

                   {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

