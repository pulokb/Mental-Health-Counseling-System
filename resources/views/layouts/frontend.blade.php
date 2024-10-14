<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MindQuilo - Navigating Minds, Building Wellness</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Place favicon.png in the root directory -->
    <link rel="shortcut icon" href="{{ asset('view/img/favicon.png') }}" type="image/x-icon" />
    <!-- Font Icons css -->
    <link rel="stylesheet" href="{{ asset('view/css/font-icons.css') }}">
    <!-- plugins css -->
    <link rel="stylesheet" href="{{ asset('view/css/plugins.css') }}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('view/css/style.css') }}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('view/css/responsive.css') }}">
    <!-- Custom Stylesheet (Add your custom styles here) -->
    {{-- <link rel="stylesheet" href="{{ asset('view/css/custom.css') }}"> --}}
</head>

<body>
    <!-- HEADER AREA START (header-5) -->
    <header
        class="ltn__header-area ltn__header-5 ltn__header-logo-and-mobile-menu-in-mobile--- ltn__header-logo-and-mobile-menu--- ltn__header-transparent gradient-color-4---">
        <!-- ltn__header-top-area start -->
        <div class="ltn__header-top-area border-bottom top-area-color-white---">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="ltn__top-bar-menu">
                            <ul>
                                <li><a href="mailto:pulokbiswas.cse@gmail.com"><i
                                            class="icon-mail"></i>pulokbiswas.cse@gmail.com</a></li>
                                <li><a href="#"><i class="icon-placeholder"></i>Katasur, Mohammadpur, 1207 Dhaka,
                                        Bangladesh</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="top-bar-right text-end">
                            <div class="ltn__top-bar-menu">
                                <ul>
                                    <li>
                                        <!-- ltn__language-menu -->
                                        <div class="ltn__drop-menu ltn__currency-menu ltn__language-menu">
                                            <ul>
                                                <li><a href="#" class="dropdown-toggle"><span
                                                            class="active-currency">English</span></a>
                                                    <ul>
                                                        <li><a href="#">Bengali</a></li>
                                                        <li><a href="#">English</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <!-- ltn__social-media -->
                                        <div class="ltn__social-media">
                                            <ul>
                                                <li><a href="https://www.facebook.com/pulokbiswas24Dec"
                                                        title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="https://twitter.com/pulok_b" title="Twitter"><i
                                                            class="fab fa-twitter"></i></a></li>
                                                <li><a href="https://www.instagram.com/pulokbiswas_/"
                                                        title="Instagram"><i class="fab fa-instagram"></i></a></li>
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
        <div
            class="ltn__header-middle-area ltn__logo-right-menu-option ltn__header-row-bg-white ltn__header-padding ltn__header-sticky ltn__sticky-bg-white">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="site-logo-wrap">
                            <div class="site-logo">
                                <a href="{{ route('index') }}"><img src="{{ asset('view/img/logo.png') }}"
                                        alt="Logo"></a>
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
                                            {{ Auth::user()->name }}
                                        </a>
                                        <ul>
                                            <li><a href="{{ route('response') }}">{{ __('My Feedback') }}</a></li>

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
                    <div class="col--- ltn__header-options ltn__header-options-2 mb-sm-20">
                        <!-- header-search-1 -->
                        <div class="header-search-wrap">
                            <div class="header-search-1">
                                <div class="search-icon">
                                    <i class="icon-search for-search-show"></i>
                                    <i class="icon-cancel  for-search-close"></i>
                                </div>
                            </div>
                            <div class="header-search-1-form">
                                <form id="#" method="get" action="#">
                                    <input type="text" name="search" value="" placeholder="Search here..." />
                                    <button type="submit">
                                        <span><i class="icon-search"></i></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- user-menu -->
                        <div class="ltn__drop-menu user-menu">
                            <ul>
                                <li>
                                    <a href="#"><i class="icon-user"></i></a>
                                    <ul>
                                        <li><a href="{{ route('login') }}">Sign in</a></li>
                                        <li><a href="{{ route('register') }}">Register</a></li>
                                        <li><a href="#">My Account</a></li>
                                    </ul>
                                </li>
                            </ul>
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
        <!-- ltn__header-middle-area end -->
        <!-- Utilize Mobile Menu Start -->
        <div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
            <div class="ltn__utilize-menu-inner ltn__scrollbar">
                <div class="ltn__utilize-menu-head">
                    <div class="site-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('view/img/logo.png') }}"
                                alt="Logo"></a>
                    </div>
                    <button class="ltn__utilize-close">×</button>
                </div>
                <div class="ltn__utilize-menu-search-form">
                    <form action="#">
                        <input type="text" placeholder="Search...">
                        <button><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="ltn__utilize-menu">
                    <ul>
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li><a href="{{ route('queryform') }}">Test</a></li>
                        <li><a href="{{ route('suggestions') }}">Suggestion</a></li>
                        <li><a href="{{ route('symptoms') }}">Symptoms</a></li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('faq') }}">FAQ</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
                <div class="ltn__utilize-buttons ltn__utilize-buttons-2">
                    <ul>
                        <li>
                            <a href="#" title="My Account">
                                <span class="utilize-btn-icon">
                                    <i class="far fa-user"></i>
                                </span>
                                My Account
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="ltn__social-media-2">
                    <ul>
                        <li><a href="https://www.facebook.com/pulokbiswas24Dec" title="Facebook"><i
                                    class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://twitter.com/pulok_b" title="Twitter"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li><a href="https://www.instagram.com/pulokbiswas_/" title="Instagram"><i
                                    class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Utilize Mobile Menu End -->
    </header>
    {{-- <br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br> --}}
    <!-- FOOTER AREA START -->
    <footer class="ltn__footer-area">
        <div class="footer-top-area section-bg-1 plr--5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-about-widget">
                            <div class="footer-logo">
                                <div class="site-logo">
                                    <img src="view/img/logo.png" alt="Logo">
                                </div>
                            </div>
                            <p>MindQuilo is the smart way to care for your mind.</p>
                            <div class="footer-address">
                                <ul>
                                    <li>
                                        <div class="footer-address-icon">
                                            <i class="icon-placeholder"></i>
                                        </div>
                                        <div class="footer-address-info">
                                            <p>Katasur, Mohammadpur, 1207 Dhaka, Bangladesh</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="footer-address-icon">
                                            <i class="icon-call"></i>
                                        </div>
                                        <div class="footer-address-info">
                                            <p><a href="tel:+8801793651750">+8801793651750</a></p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="footer-address-icon">
                                            <i class="icon-mail"></i>
                                        </div>
                                        <div class="footer-address-info">
                                            <p><a href="mailto:pulokbiswas.cse@gmail.com">pulokbiswas.cse@gmail.com</a>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="ltn__social-media mt-20">
                                <ul>
                                    <li><a href="https://www.facebook.com/pulokbiswas24Dec" title="Facebook"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://twitter.com/pulok_b" title="Twitter"><i
                                                class="fab fa-twitter"></i></a></li>
                                    <li><a href="https://www.instagram.com/pulokbiswas_/" title="Instagram"><i
                                                class="fab fa-instagram"></i></a></li>
                                    <li><a href="https://www.linkedin.com/in/pulokbiswas/" title="Linkedin"><i
                                                class="fab fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-menu-widget clearfix">
                            <h4 class="footer-title">MindQuilo</h4>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="{{ route('about') }}">About</a></li>
                                    <li><a href="{{ route('faq') }}">FAQ</a></li>
                                    <li><a href="{{ route('contact') }}">Contact us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-menu-widget clearfix">
                            <h4 class="footer-title">Services</h4>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="#">My account</a></li>
                                    <li><a href="{{ route('about') }}">Terms & Conditions</a></li>
                                    <li><a href="{{ route('about') }}">Promotional Offers</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-menu-widget clearfix">
                            <h4 class="footer-title">Customer Care</h4>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="#">My account</a></li>
                                    <li><a href="{{ route('faq') }}">FAQ</a></li>
                                    <li><a href="{{ route('contact') }}">Contact us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-sm-12 col-12">
                        <div class="footer-widget footer-newsletter-widget">
                            <h4 class="footer-title">Newsletter</h4>
                            <p>Subscribe to our weekly Newsletter and receive updates via email.</p>
                            <div class="footer-newsletter">
                                <form action="#">
                                    <input type="email" name="email" placeholder="Email*">
                                    <div class="btn-wrapper">
                                        <button class="theme-btn-1 btn" type="submit"><i
                                                class="fas fa-location-arrow"></i></button>
                                    </div>
                                </form>
                            </div>
                            <h5 class="mt-30">We Accept</h5>
                            <img src="view/img/icons/payment-4.png" alt="Payment Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ltn__copyright-area section-bg-7 plr--5">
            <div class="container-fluid ltn__border-top-2">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="ltn__copyright-design clearfix">
                            <p>All Rights Reserved MindQuilo @ Pulok Biswas <span class="current-year"></span></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 align-self-center">
                        <div class="ltn__copyright-menu text-end">
                            <ul>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Claim</a></li>
                                <li><a href="#">Privacy & Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER AREA END -->
    <!-- Body main wrapper end -->
    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->
    <script src="{{ asset('view/js/jquery.js') }}"></script>
    <script src="{{ asset('view/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('view/js/plugins.js') }}"></script>
    <script src="{{ asset('view/js/main.js') }}"></script>
    
</body>

</html>
