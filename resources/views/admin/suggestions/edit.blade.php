@extends('layouts.admin')
@section('title'){{ __('Update') }} {{__('Suggestions')}} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Update')." ".__('Suggestions'),'url'=>route('admin.suggestions.index'),'icon' => $icon??'','permission'=>'Suggestions-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                   {!! Form::model($suggestions, ['route' => ['admin.suggestions.update', $suggestions->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('admin.suggestions.fields')

                   {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

