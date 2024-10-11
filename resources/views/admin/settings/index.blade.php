@extends('layouts.admin')
@section('title')
    {{ __('Settings') }}
@endsection
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="{{ $icon }} icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div> {{ __('Settings') }}</div>
            </div>
        </div>
    </div>
    <form id="settingsForm" method="POST" action="{{ route('admin.settings.updateAll') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            {{-- General Setting --}}
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-header"> <span class="text-primary"> {{ __('General Setting') }} </span> </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="site_title">{{ __('Site Title') }}</label>
                            <input required type="text" name="site_title" id="site_title" class="form-control"
                                value="{{ env('APP_NAME') }}">
                        </div>
                        <div class="form-group">
                            <label for="site_title">{{ __('Site Description') }}</label>
                            <input required type="text" name="site_description" id="site_description" class="form-control"
                                value="{{ $settings->where('name', 'site_description')->first()->value ?? old('site_description') }}">
                        </div>

                        <div class="form-group">
                            <label for="site_logo">{{ __('Logo (Only Image are allowed, Size: 100 X 50)') }}</label><br><br>
                            <img src="{{ asset('images/' . $settings->where('name', 'site_logo')->first()->value) }}"
                                alt="" /><br><br>
                            <input type="file" name="site_logo" id="site_logo" class="form-control dropify">
                        </div>

                        <div class="form-group">
                            <label for="site_favicon">{{ __('Favicon (Only Image are allowed, Size: 33 X 33)') }}</label><br><br>
                            <img src="{{ asset('images/' . $settings->where('name', 'site_favicon')->first()->value) }}"
                                alt="" /><br><br>
                            <input type="file" name="site_favicon" id="site_favicon" class="form-control dropify">
                        </div>

                        @can('setting-update')
                            <button type="button" class="btn btn-danger"
                                onclick="document.getElementById('settingsForm').reset();">
                                <i class="fas fa-redo"></i>
                                <span>{{ __('Reset') }}</span>
                            </button>

                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-arrow-circle-up"></i>
                                <span>{{ __('Update') }}</span>
                            </button>
                        @endcan
                    </div>
                </div>

            </div>
             {{-- Admin Panel Setting --}}
             <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-header"> <span class="text-primary"> {{ __('Admin Panel Setting') }} </span> </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="admin_header_color">{{ __('Header Color') }}</label>
                            <div class="p-3">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="theme-settings-swatches">
                                            <div class="header-color swatch-holder bg-primary switch-header-cs-class"
                                                data-class="bg-primary header-text-light">
                                            </div>
                                            <div class="header-color swatch-holder bg-secondary switch-header-cs-class"
                                                data-class="bg-secondary header-text-light">
                                            </div>
                                            <div class="header-color swatch-holder bg-success switch-header-cs-class"
                                                data-class="bg-success header-text-dark">
                                            </div>
                                            <div class="header-color swatch-holder bg-info switch-header-cs-class"
                                                data-class="bg-info header-text-dark">
                                            </div>
                                            <div class="header-color swatch-holder bg-warning switch-header-cs-class"
                                                data-class="bg-warning header-text-dark">
                                            </div>
                                            <div class="header-color swatch-holder bg-danger switch-header-cs-class"
                                                data-class="bg-danger header-text-light">
                                            </div>
                                            <div class="header-color swatch-holder bg-light switch-header-cs-class"
                                                data-class="bg-light header-text-dark">
                                            </div>
                                            <div class="header-color swatch-holder bg-dark switch-header-cs-class"
                                                data-class="bg-dark header-text-light">
                                            </div>
                                            <div class="header-color swatch-holder bg-focus switch-header-cs-class"
                                                data-class="bg-focus header-text-light">
                                            </div>
                                            <div class="header-color swatch-holder bg-alternate switch-header-cs-class"
                                                data-class="bg-alternate header-text-light">
                                            </div>
                                            <div class="header-color divider">
                                            </div>
                                            <div class="header-color swatch-holder bg-vicious-stance switch-header-cs-class"
                                                data-class="bg-vicious-stance header-text-light">
                                            </div>
                                            <div class="header-color swatch-holder bg-midnight-bloom switch-header-cs-class"
                                                data-class="bg-midnight-bloom header-text-light">
                                            </div>
                                            <div class="header-color swatch-holder bg-night-sky switch-header-cs-class"
                                                data-class="bg-night-sky header-text-light">
                                            </div>
                                            <div class="header-color swatch-holder bg-slick-carbon switch-header-cs-class"
                                                data-class="bg-slick-carbon header-text-light">
                                            </div>
                                            <div class="header-color swatch-holder bg-asteroid switch-header-cs-class"
                                                data-class="bg-asteroid header-text-light">
                                            </div>
                                            <div class="header-color swatch-holder bg-royal switch-header-cs-class"
                                                data-class="bg-royal header-text-light">
                                            </div>
                                            <div class="header-color swatch-holder bg-warm-flame switch-header-cs-class"
                                                data-class="bg-warm-flame header-text-dark">
                                            </div>
                                            <div class="header-color swatch-holder bg-night-fade switch-header-cs-class"
                                                data-class="bg-night-fade header-text-dark">
                                            </div>
                                            <div class="header-color swatch-holder bg-sunny-morning switch-header-cs-class"
                                                data-class="bg-sunny-morning header-text-dark">
                                            </div>
                                            <div class="header-color swatch-holder bg-tempting-azure switch-header-cs-class"
                                                data-class="bg-tempting-azure header-text-dark">
                                            </div>
                                            <div class="header-color swatch-holder bg-amy-crisp switch-header-cs-class"
                                                data-class="bg-amy-crisp header-text-dark">
                                            </div>
                                            <div class="header-color swatch-holder bg-heavy-rain switch-header-cs-class"
                                                data-class="bg-heavy-rain header-text-dark">
                                            </div>
                                            <div class="header-color swatch-holder bg-mean-fruit switch-header-cs-class"
                                                data-class="bg-mean-fruit header-text-dark">
                                            </div>
                                            <div class="header-color swatch-holder bg-malibu-beach switch-header-cs-class"
                                                data-class="bg-malibu-beach header-text-light">
                                            </div>
                                            <div class="header-color swatch-holder bg-deep-blue switch-header-cs-class"
                                                data-class="bg-deep-blue header-text-dark">
                                            </div>
                                            <div class="header-color swatch-holder bg-ripe-malin switch-header-cs-class"
                                                data-class="bg-ripe-malin header-text-light">
                                            </div>
                                            <div class="header-color swatch-holder bg-arielle-smile switch-header-cs-class"
                                                data-class="bg-arielle-smile header-text-light">
                                            </div>
                                            <div class="header-color swatch-holder bg-plum-plate switch-header-cs-class"
                                                data-class="bg-plum-plate header-text-light">
                                            </div>
                                            <div class="header-color swatch-holder bg-happy-fisher switch-header-cs-class"
                                                data-class="bg-happy-fisher header-text-dark">
                                            </div>
                                            <div class="header-color swatch-holder bg-happy-itmeo switch-header-cs-class"
                                                data-class="bg-happy-itmeo header-text-light">
                                            </div>
                                            <div class="header-color swatch-holder bg-mixed-hopes switch-header-cs-class"
                                                data-class="bg-mixed-hopes header-text-light">
                                            </div>
                                            <div class="header-color swatch-holder bg-strong-bliss switch-header-cs-class"
                                                data-class="bg-strong-bliss header-text-light">
                                            </div>
                                            <div class="header-color swatch-holder bg-grow-early switch-header-cs-class"
                                                data-class="bg-grow-early header-text-light">
                                            </div>
                                            <div class="header-color swatch-holder bg-love-kiss switch-header-cs-class"
                                                data-class="bg-love-kiss header-text-light">
                                            </div>
                                            <div class="header-color swatch-holder bg-premium-dark switch-header-cs-class"
                                                data-class="bg-premium-dark header-text-light">
                                            </div>
                                            <div class="header-color swatch-holder bg-happy-green switch-header-cs-class"
                                                data-class="bg-happy-green header-text-light">
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <input type="hidden" name="admin_header_color" id="admin_header_color" class="form-control"
                                value="{{ $settings->where('name', 'admin_header_color')->first()->value}}">
                        </div>
                        <div class="form-group">
                            <label for="admin_sidebar_color">{{ __('Sidebar Color') }}</label>
                            <div class="p-3">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        {{-- <h5 class="pb-2">Choose Color Scheme
                                        </h5> --}}
                                        <div class="theme-settings-swatches">
                                            <div class="sidebar-color swatch-holder bg-primary switch-sidebar-cs-class"
                                                data-class=" bg-primary sidebar-text-light">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-secondary switch-sidebar-cs-class"
                                                data-class=" bg-secondary sidebar-text-light">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-success switch-sidebar-cs-class"
                                                data-class=" bg-success sidebar-text-dark">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-info switch-sidebar-cs-class"
                                                data-class=" bg-info sidebar-text-dark">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-warning switch-sidebar-cs-class"
                                                data-class=" bg-warning sidebar-text-dark">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-danger switch-sidebar-cs-class"
                                                data-class=" bg-danger sidebar-text-light">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-light switch-sidebar-cs-class"
                                                data-class=" bg-light sidebar-text-dark">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-dark switch-sidebar-cs-class"
                                                data-class=" bg-dark sidebar-text-light">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-focus switch-sidebar-cs-class"
                                                data-class=" bg-focus sidebar-text-light">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-alternate switch-sidebar-cs-class"
                                                data-class=" bg-alternate sidebar-text-light">
                                            </div>
                                            <div class="divider">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-vicious-stance switch-sidebar-cs-class"
                                                data-class=" bg-vicious-stance sidebar-text-light">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-midnight-bloom switch-sidebar-cs-class"
                                                data-class=" bg-midnight-bloom sidebar-text-light">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-night-sky switch-sidebar-cs-class"
                                                data-class=" bg-night-sky sidebar-text-light">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-slick-carbon switch-sidebar-cs-class"
                                                data-class=" bg-slick-carbon sidebar-text-light">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-asteroid switch-sidebar-cs-class"
                                                data-class=" bg-asteroid sidebar-text-light">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-royal switch-sidebar-cs-class"
                                                data-class=" bg-royal sidebar-text-light">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-warm-flame switch-sidebar-cs-class"
                                                data-class=" bg-warm-flame sidebar-text-dark">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-night-fade switch-sidebar-cs-class"
                                                data-class=" bg-night-fade sidebar-text-dark">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-sunny-morning switch-sidebar-cs-class"
                                                data-class=" bg-sunny-morning sidebar-text-dark">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-tempting-azure switch-sidebar-cs-class"
                                                data-class=" bg-tempting-azure sidebar-text-dark">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-amy-crisp switch-sidebar-cs-class"
                                                data-class=" bg-amy-crisp sidebar-text-dark">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-heavy-rain switch-sidebar-cs-class"
                                                data-class=" bg-heavy-rain sidebar-text-dark">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-mean-fruit switch-sidebar-cs-class"
                                                data-class=" bg-mean-fruit sidebar-text-dark">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-malibu-beach switch-sidebar-cs-class"
                                                data-class=" bg-malibu-beach sidebar-text-light">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-deep-blue switch-sidebar-cs-class"
                                                data-class=" bg-deep-blue sidebar-text-dark">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-ripe-malin switch-sidebar-cs-class"
                                                data-class=" bg-ripe-malin sidebar-text-light">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-arielle-smile switch-sidebar-cs-class"
                                                data-class=" bg-arielle-smile sidebar-text-light">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-plum-plate switch-sidebar-cs-class"
                                                data-class=" bg-plum-plate sidebar-text-light">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-happy-fisher switch-sidebar-cs-class"
                                                data-class=" bg-happy-fisher sidebar-text-dark">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-happy-itmeo switch-sidebar-cs-class"
                                                data-class=" bg-happy-itmeo sidebar-text-light">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-mixed-hopes switch-sidebar-cs-class"
                                                data-class=" bg-mixed-hopes sidebar-text-light">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-strong-bliss switch-sidebar-cs-class"
                                                data-class=" bg-strong-bliss sidebar-text-light">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-grow-early switch-sidebar-cs-class"
                                                data-class=" bg-grow-early sidebar-text-light">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-love-kiss switch-sidebar-cs-class"
                                                data-class=" bg-love-kiss sidebar-text-light">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-premium-dark switch-sidebar-cs-class"
                                                data-class=" bg-premium-dark sidebar-text-light">
                                            </div>
                                            <div class="sidebar-color swatch-holder bg-happy-green switch-sidebar-cs-class"
                                                data-class=" bg-happy-green sidebar-text-light">
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <input type="hidden" name="admin_sidebar_color" id="admin_sidebar_color" class="form-control"
                                value="{{ $settings->where('name', 'admin_sidebar_color')->first()->value}}">
                        </div>
                        <div class="form-group">
                            <label for="admin_logo">Admin Logo (Only Image are allowed, Size: 100 X 50))</label><br><br>
                            <img src="{{ asset('images/' . $settings->where('name', 'admin_logo')->first()->value) }}"
                                alt="" /><br><br>
                            <input type="file" name="admin_logo" id="admin_logo" class="form-control dropify">
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
                </div>
            </div>

        </div>
        <div class="row">
            {{-- Social Media Login Setting --}}
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-header"> <span class="text-primary">{{ __('Social Media Login Setting') }}</span> </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="facebook_client_id">{{ __('Facebook Client Id') }}</label>
                            <input type="text" name="facebook_client_id" id="facebook_client_id" class="form-control"
                                value="{{ env('FACEBOOK_CLIENT_ID') }}">
                        </div>
                        <div class="form-group">
                            <label for="facebook_client_secret">{{ __('Facebook Client Secret') }}</label>
                            <input type="text" name="facebook_client_secret" id="facebook_client_secret"
                                class="form-control" value="{{ env('FACEBOOK_CLIENT_SECRET') }}">
                        </div>
                        <div class="form-group">
                            <label for="google_client_id">{{ __('Google Client Id') }}</label>
                            <input type="text" name="google_client_id" id="google_client_id" class="form-control"
                                value="{{ env('GOOGLE_CLIENT_ID') }}">
                        </div>
                        <div class="form-group">
                            <label for="google_client_secret">{{ __('Google Client Secret') }}</label>
                            <input type="text" name="google_client_secret" id="google_client_secret" class="form-control"
                                value="{{ env('GOOGLE_CLIENT_SECRET') }}">
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
                </div>
            </div>
        </div>
    </form>
@endsection
@include('includes.dropify')
@push('script')
<script>
    $(document).ready(function(){
        $(document).on("click",".header-color",function(){
            var headerColor = $(this).data();
            $("#admin_header_color").val(headerColor.class);
        });
        $(document).on("click",".sidebar-color",function(){
            var sidebarColor = $(this).data();
            console.log(sidebarColor);
            $("#admin_sidebar_color").val(sidebarColor.class);
        });
    });
</script>
@endpush
