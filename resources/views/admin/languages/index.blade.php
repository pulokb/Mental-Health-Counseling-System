@extends('layouts.admin')
@section('title'){{ __('Languages') }} @endsection
@section('content')
@include('includes.page_header_index',['title'=>__('Languages'),'url'=>route('admin.languages.create'),'icon' => $icon,'permission'=>'Language-create'])

<div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form action="{{route('admin.languages.setDefaultLanguage')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">{{ __('Set Frontend Default Language') }}</label>
                        <select name="locale" class="form-control" id="">
                            @foreach ($languages as $language)
                            <option
                            @if (env('LOCALE') == $language->code)
                            selected
                            @endif
                            value="{{$language->code}}">{{$language->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @can('Language-set-default')
                    <div class="form-group">
                        {{ Form::button('<i class="fas fa-plus-circle"></i> '.__('Submit'), ['type' => 'submit', 'class' => 'btn btn-primary '] )  }}
                    </div>
                    @endcan
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    @include('admin.languages.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

