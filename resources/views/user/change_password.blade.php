@extends('layouts.frontend')
@section('title','Change Password')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <h3>{{ __('Change Password') }}</h3>
            </div><br><br>
            <div class="card-body">
                <div class="alert alert-danger" id="error" style="display: none"></div>
                <form class="" method="POST" id="change-password-form" action="{{ route('user.change.password') }}">
                    @csrf


                    <div class="form-group row">
                        <label for="password"
                            class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>

                        <div class="col-md-6">
                            <input placeholder="Old Password" class="form-control" id="oldpassword" type="password"
                                name="oldpassword" required>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password"
                            class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" placeholder="New Password" class="form-control" type="password"
                                name="password" required>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password"
                            class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" placeholder="Confirm Password" class="form-control"
                                type="password" name="password_confirmation" required>

                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Change Password') }}
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection