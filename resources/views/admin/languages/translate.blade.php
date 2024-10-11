@extends('layouts.admin')
@section('title'){{ __('Translate Language') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Translate Language'),'url'=>route('admin.languages.index'),'icon' => $icon,'permission'=>'Language-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">{{$language->name}}</div>
            <div class="card-body">
                    {!! Form::open(['route' => ['admin.languages.translate',$language->id]]) !!}




                    <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('Key') }}</th>
                                <th>{{ __('Value') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($translates as $key=>$value)
                                <tr>
                                    <td><input readonly type="text" name="key[]" class="form-control" value="{{$key}}"></td>
                                    <td>
                                        <input type="text" name="value[]" class="form-control" value="{{$value}}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <div class="form-group">
                        {{ Form::button('<i class="fas fa-plus-circle"></i> '.__('Submit'), ['type' => 'submit', 'class' => 'btn btn-primary '] )  }}
                        <a href="{{ route('admin.languages.index') }}" class="btn btn-danger"><i class="fa fa-window-close" aria-hidden="true"></i> {{ __('Cancel') }}</a>
                    </div>
                    {!! Form::close() !!}
                </div>

        </div>
    </div>
</div>
@endsection

