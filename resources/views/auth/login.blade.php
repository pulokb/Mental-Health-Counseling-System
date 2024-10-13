@include('layouts.header')

<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image" data-bs-bg="{{ asset('view/img/bg/14.png') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">Account</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="{{ route('login') }}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- LOGIN AREA START -->
<div class="ltn__login-area pb-65">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area text-center">
                    <h1 class="section-title">Sign In <br>To Your Account</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="account-login-inner">
                    <!-- Updated route for login -->
                    <form action="{{ route('login') }}" method="POST" class="ltn__form-box contact-form-box">
                        @csrf  <!-- CSRF Token -->
                        <input type="email" name="email" placeholder="Email*" required>
                        <input type="password" name="password" placeholder="Password*" required>
                        <div class="btn-wrapper mt-0">
                            <button class="theme-btn-1 btn btn-effect-1 text-uppercase" type="submit">SIGN IN</button>
                        </div>
                        {{-- <div class="go-to-btn mt-20">
                            <!-- Update the route for password reset -->
                            <a href="{{ route('contact') }}"><small>FORGOTTEN YOUR PASSWORD?</small></a>
                        </div> --}}
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="account-create text-center pt-50">
                    <h4>DON'T HAVE AN ACCOUNT?</h4>
                    <div class="btn-wrapper">
                        <a href="{{ route('register') }}" class="theme-btn-1 btn btn-effect-1 text-uppercase">CREATE ACCOUNT</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- LOGIN AREA END -->

@include('layouts.footer')
