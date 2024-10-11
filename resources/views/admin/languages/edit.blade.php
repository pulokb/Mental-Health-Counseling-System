@extends('layouts.admin')
@section('title'){{ __('Update Language') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Update Language'),'url'=>route('admin.languages.index'),'icon' => $icon,'permission'=>'Language-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                   {!! Form::model($language, ['route' => ['admin.languages.update', $language->id], 'method' => 'patch']) !!}

                        @include('admin.languages.fields')

                   {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

