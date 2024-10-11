@extends('layouts.admin')
@section('title')
    {{ __('Email Settings') }}
@endsection
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-settings icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div> {{ __('Email Settings') }}</div>
            </div>
        </div>
    </div>
    @csrf
    <div class="row">
        {{-- Mail Setting --}}
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-header"> <span class="text-primary"> {{ __('Mail Settings') }} </span> </div>
                <form id="settingsForm" method="POST" action="{{ route('admin.settings.updateEmailSetting') }}"
                    enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        <div class="form-group">
                            <label for="mail_mailer">{{ __('Mail Mailer') }}</label>
                            <input required type="text" name="mail_mailer" id="mail_mailer" class="form-control"
                                value="{{ env('MAIL_MAILER') }}">
                        </div>
                        <div class="form-group">
                            <label for="mail_host">{{ __('Mail Host') }}</label>
                            <input required type="text" name="mail_host" id="mail_host" class="form-control"
                                value="{{ env('MAIL_HOST') }}">
                        </div>
                        <div class="form-group">
                            <label for="mail_port">{{ __('Mail Port') }}</label>
                            <input required type="text" name="mail_port" id="mail_port" class="form-control"
                                value="{{ env('MAIL_PORT') }}">
                        </div>
                        <div class="form-group">
                            <label for="mail_username">{{ __('Mail Username') }}</label>
                            <input required type="text" name="mail_username" id="mail_username" class="form-control"
                                value="{{ env('MAIL_USERNAME') }}">
                        </div>
                        <div class="form-group">
                            <label for="mail_password">{{ __('Mail Password') }}</label>
                            <input required type="text" name="mail_password" id="mail_password" class="form-control"
                                value="{{ env('MAIL_PASSWORD') }}">
                        </div>
                        <div class="form-group">
                            <label for="mail_encryption">{{ __('Mail Encryption') }}</label>
                            <input required type="text" name="mail_encryption" id="mail_encryption" class="form-control"
                                value="{{ env('MAIL_ENCRYPTION') }}">
                        </div>
                        <div class="form-group">
                            <label for="mail_from_address">{{ __('Mail From Address') }}</label>
                            <input required type="text" name="mail_from_address" id="mail_from_address" class="form-control"
                                value="{{ env('MAIL_FROM_ADDRESS') }}">
                        </div>
                        <div class="form-group">
                            <label for="mail_from_name">{{ __('Mail From Name') }}</label>
                            <input required type="text" name="mail_from_name" id="mail_from_name" class="form-control"
                                value="{{ env('MAIL_FROM_NAME') }}">
                        </div>
                        @can('setting-update')
                            <button type="button" class="btn btn-danger"
                                onclick="document.getElementById('settingsForm2').reset();">
                                <i class="fas fa-redo"></i>
                                <span>{{ __('Reset') }}</span>
                            </button>

                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-arrow-circle-up"></i>
                                <span>{{ __('Update') }}</span>
                            </button>
                        @endcan
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header"> <span class="text-primary"> {{ __('Send Test Mail') }} </span> </div>

                        <form id="settingsForm" method="POST" action="{{ route('admin.settings.sendTestMail') }}">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="to">{{ __('To') }}</label>
                                    <input type="email" name="to" id="to" class="form-control" required
                                        placeholder="Enter email address" value="">
                                </div>

                                @can('setting-update')
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-arrow-circle-right"></i>
                                        <span>{{ __('Send') }}</span>
                                    </button>
                                @endcan
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header"> <span class="text-primary"> {{ __('Send Mail') }} </span> </div>
                        <div class="card-body">
                            <form id="settingsForm" method="POST" action="{{ route('admin.settings.sendMail') }}">
                                @csrf
                            <div class="form-group">
                                <label for="to">{{ __('To') }}</label>
                                <input type="email" required name="to" id="to" class="form-control"
                                    placeholder="Enter email address" value="">
                            </div>
                            <div class="form-group">
                                <label for="subject">{{ __('Subject') }}</label>
                                <input type="text" required name="subject" id="subject" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="subject">{{ __('Body') }}</label>
                                <textarea name="body" required id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>

                            @can('setting-update')
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-arrow-circle-right"></i>
                                    <span>{{ __('Send') }}</span>
                                </button>
                            @endcan
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        // CKEDITOR.replace( 'details' );
        CKEDITOR.replace('body', {
            filebrowserUploadUrl: "{{ route('ckeditor.image.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
