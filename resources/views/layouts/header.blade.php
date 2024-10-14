<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <base href="/public">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MindQuilo - Navigating Minds, Building Wellness</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('view/img/favicon.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('view/css/font-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('view/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('view/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('view/css/responsive.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('view/css/custom.css') }}"> --}}

    <!-- HEADER AREA START (header-5) -->
    <header class="ltn__header-area ltn__header-5 ltn__header-logo-and-mobile-menu-in-mobile--- ltn__header-logo-and-mobile-menu--- ltn__header-transparent gradient-color-4---">
        <!-- ltn__header-top-area start -->
        <div class="ltn__header-top-area border-bottom top-area-color-white---">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="ltn__top-bar-menu">
                            <ul>
                                <li><a href="mailto:pulok.contact@gmail.com"><i class="icon-mail"></i>pulok.contact@gmail.com</a></li>
                                <li><a href="https://www.google.com/maps/place/Katasur,+Mohammadpur+1207,+Dhaka,+Bangladesh" target="_blank">
                                    <i class="icon-placeholder"></i>Katasur, Mohammadpur, 1207 Dhaka, Bangladesh
                                </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="top-bar-right text-end">
                            <div class="ltn__top-bar-menu">
                                <ul>
                                    <li>
                                        <div class="ltn__drop-menu ltn__currency-menu ltn__language-menu">
                                            <ul>
                                                <li><a href="#" class="dropdown-toggle"><span class="active-currency">English</span></a>
                                                    <ul>
                                                        <li><a href="#">English</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ltn__social-media">
                                            <ul>
                                                <li><a href="https://www.facebook.com/pulokbiswas24Dec" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="https://twitter.com/pulok_b" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="https://www.instagram.com/me_pulok/" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                            </ul>
                                        </div>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ltn__header-top-area end -->
        <!-- ltn__header-middle-area start -->
        <div class="ltn__header-middle-area ltn__logo-right-menu-option ltn__header-row-bg-white ltn__header-padding ltn__header-sticky ltn__sticky-bg-white">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="site-logo-wrap">
                            <div class="site-logo">
                                <a href="{{ route('index') }}"><img src="{{ asset('view/img/logo.png') }}" alt="Logo"></a>
                            </div>
                            <div class="get-support clearfix d-none">
                                <div class="get-support-icon">
                                    <i class="icon-call"></i>
                                </div>
                                <div class="get-support-info">
                                    <h6>Get Support</h6>
                                    <h4><a href="tel:+01793651750">01793651750</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col header-menu-column menu-color-white---">
                        <div class="header-menu d-none d-xl-block">
                            <nav>
                                <div class="ltn__main-menu">
                                    <ul>
                                        <li><a href="{{ route('index') }}">Home</a></li>
                                        @auth
                                            <li><a href="{{ route('queryform') }}">Query Interface</a></li>
                                        @endauth
                                        <li><a href="{{ route('suggestions') }}">Suggestion</a></li>
                                        <li><a href="{{ route('symptoms') }}">Symptoms</a></li>
                                        <li><a href="{{ route('about') }}">About</a></li>
                                        <li><a href="{{ route('faq') }}">FAQ</a></li>
                                        <li><a href="{{ route('contact') }}">Contact</a></li>
                                        <!-- Authentication Links -->
                                        <!-- Authentication Links -->
                                    @guest
                                    @if (Route::has('login'))
                                        <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                    @endif
                                    @if (Route::has('register'))
                                        <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                                    @endif
                                    @else
                                    <li>
                                        <a href="{{ route('profilev') }}" role="button" aria-haspopup="true" aria-expanded="false">
                                           Hello {{ Auth::user()->name }}
                                        </a>
                                        <ul>
                                            <li><a href="{{ route('response.get') }}">{{ __('My Feedback') }}</a></li>

                                            <li>
                                                <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <i class="metismenu-icon pe-7s-back"></i>
                                                    {{ __('Logout') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                    @endguest

                                        <!-- End Authentication Links -->
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- HEADER AREA END -->
        <!-- Mobile Menu Button -->
        <div class="mobile-menu-toggle d-xl-none">
            <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                <svg viewBox="0 0 800 600">
                    <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                        id="top"></path>
                    <path d="M300,320 L540,320" id="middle"></path>
                    <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                        id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                </svg>
            </a>
        </div>
        <!-- Utilize Mobile Menu Start -->
<div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
    <div class="ltn__utilize-menu-inner ltn__scrollbar">
        <div class="ltn__utilize-menu-head">
            <div class="site-logo">
                <a href="{{ route('index') }}"><img src="{{ asset('view/img/logo.png') }}" alt="Logo"></a>
            </div>
            <button class="ltn__utilize-close">×</button>
        </div>
        <div class="ltn__utilize-menu">
            <ul>
                <li><a href="{{ route('index') }}">Home</a></li>
                @auth
                    <li><a href="{{ route('queryform') }}">Query Interface</a></li>
                @endauth
                <li><a href="{{ route('suggestions') }}">Suggestion</a></li>
                <li><a href="{{ route('symptoms') }}">Symptoms</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('faq') }}">FAQ</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>

                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @endif
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @endif
                @else
                    <li>
                        <a href="{{ route('profilev') }}" role="button" aria-haspopup="true" aria-expanded="false">
                           Hello {{ Auth::user()->name }}
                        </a>
                        <ul>
                            <li><a href="{{ route('response.get') }}">{{ __('My Feedback') }}</a></li>

                            <li>

                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
                <!-- End Authentication Links -->
            </ul>
        </div>
    </div>
</div>
<!-- Utilize Mobile Menu End -->
    </header>
    <!-- HEADER AREA END -->

    <!-- Page Content -->
    <div class="ltn__page-area">
        <!-- Add your page content here -->
    </div>

    <script src="{{ asset('view/js/jquery.js') }}"></script>
    <script src="{{ asset('view/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('view/js/plugins.js') }}"></script>
    <script src="{{ asset('view/js/main.js') }}"></script>

</head>

</html>
