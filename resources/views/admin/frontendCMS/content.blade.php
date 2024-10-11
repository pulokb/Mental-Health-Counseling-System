@extends('layouts.admin')
@section('title'){{ __('Content') }} @endsection
@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="{{$icon??'pe-7s-album'}} icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div> {{ __('Content') }}</div>
        </div>
    </div>
</div>
<form id="settingsForm" method="POST" action="{{ route('admin.frontendCMS.contentUpdate') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        {{-- General Setting --}}
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-header"> <span class="text-primary"> {{ __('General Info') }} </span> </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input type="text" name="email" id="email" class="form-control"
                            value="{{ $content->where('key','email')->first()->value ?? old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">{{ __('Phone') }}</label>
                        <input type="text" name="phone" id="phone" class="form-control"
                            value="{{ $content->where('key','phone')->first()->value ?? old('phone') }}">
                    </div>
                    <div class="form-group">
                        <label for="address">{{ __('Address') }}</label>
                        <input type="text" name="address" id="address" class="form-control"
                            value="{{ $content->where('key','address')->first()->value ?? old('address') }}">
                    </div>
                    <div class="form-group">
                        <label for="footer_text">{{ __('Footer Text') }}</label>
                        <input type="text" name="footer_text" id="footer_text" class="form-control"
                            value="{{ $content->where('key','footer_text')->first()->value ?? old('footer_text') }}">
                    </div>

                    @can('Content-update')
                    <button type="button" class="btn btn-danger"
                        onclick="document.getElementById('settingsForm').reset();">
                        <i class="fas fa-redo"></i>
                        <span>{{ __('Reset') }}</span>
                    </button>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-arrow-circle-up"></i>
                        <span>{{ __('Update') }}</span>
                    </button>
                    @endCan
                </div>
            </div>

        </div>
        {{-- Social Media Setting --}}
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-header"> <span class="text-primary"> {{ __('Social Media') }} </span> </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="facebook">{{ __('Facebook') }}</label>
                        <input type="text" name="facebook" id="facebook" class="form-control"
                            value="{{ $content->where('key','facebook')->first()->value ?? old('facebook') }}">
                    </div>
                    <div class="form-group">
                        <label for="linkedin">{{ __('Linkedin') }}</label>
                        <input type="text" name="linkedin" id="linkedin" class="form-control"
                            value="{{ $content->where('key','linkedin')->first()->value ?? old('linkedin') }}">
                    </div>
                    <div class="form-group">
                        <label for="twitter">{{ __('Twitter') }}</label>
                        <input type="text" name="twitter" id="twitter" class="form-control"
                            value="{{ $content->where('key','twitter')->first()->value ?? old('twitter') }}">
                    </div>
                    <div class="form-group">
                        <label for="youtube">{{ __('Youtube') }}</label>
                        <input type="text" name="youtube" id="youtube" class="form-control"
                            value="{{ $content->where('key','youtube')->first()->value ?? old('youtube') }}">
                    </div>

                    @can('Content-update')
                    <button type="button" class="btn btn-danger"
                        onclick="document.getElementById('settingsForm').reset();">
                        <i class="fas fa-redo"></i>
                        <span>{{ __('Reset') }}</span>
                    </button>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-arrow-circle-up"></i>
                        <span>{{ __('Update') }}</span>
                    </button>
                    @endCan
                </div>
            </div>
        </div>
    </div>

</form>
@endsection
@include('includes.dropify')
