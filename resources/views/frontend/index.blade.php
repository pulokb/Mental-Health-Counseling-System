@include('layouts.header')
@include('includes.slider')

<!-- FEATURE AREA START ( Feature - 3) -->
<div class="ltn__feature-area section-bg-1 mt-90--- pt-30 pb-30 mt--65---">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__feature-item-box-wrap ltn__feature-item-box-wrap-2 ltn__border--- section-bg-1">
                    {{-- <div class="ltn__feature-item ltn__feature-item-8">
                        <div class="ltn__feature-icon">
                            <img src="view/img/icons/svg/8-trolley.png" alt="#">
                        </div>
                        <div class="ltn__feature-info">
                            <h4>Mental Health Counseling</h4>
                            <p>Available for all individuals seeking support</p>
                        </div>
                    </div> --}}
                    <div class="ltn__feature-item ltn__feature-item-8">
                        <div class="ltn__feature-icon">
                            <img src="view/img/icons/svg/9-money.png" alt="#">
                        </div>
                        <div class="ltn__feature-info">
                            <h4> Questionnaire and Feedback</h4>
                            <p>Mental health assistance, with no financial barrier</p>
                        </div>
                    </div>
                    <div class="ltn__feature-item ltn__feature-item-8">
                        <div class="ltn__feature-icon">
                            <img src="view/img/icons/svg/10-credit-card.png" alt="#">
                        </div>
                        <div class="ltn__feature-info">
                            <h4>Providing Support at No Cost</h4>
                            <p>Accessible Mental Health Support: No Cost.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FEATURE AREA END -->

<!-- ABOUT US AREA START -->
<div class="ltn__about-us-area pt-25 pb-120 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="about-us-img-wrap about-img-left">
                    <img src="view/img/others/9.png" alt="About Us Image">
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="about-us-info-wrap">
                    <div class="section-title-area ltn__section-title-2--- mb-30">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color d-none">About Us</h6>
                        <h1 class="section-title">Your faithful partner for mental health care.</h1>
                        <p>MindQuilo connects you with qualified and experienced mental health professionals who can
                            help you with various issues such as stress, anxiety, depression, trauma, addiction,
                            relationships, and more.</p>
                    </div>
                    <ul class="ltn__list-item-1 ltn__list-item-1-before--- clearfix">
                        <li><i class="fas fa-check-square"></i> Offers self-help resources and community support to help
                            you improve your mental well-being and resilience.</li>
                        <li><i class="fas fa-check-square"></i> Helps you access professional and
                            convenient mental health care from anywhere, anytime, and at your own pace.</li>
                        <li><i class="fas fa-check-square"></i> Improve your mental well-being, such as cognitive
                            behavioral therapy, positive psychology, stress management, and more.</li>
                    </ul>
                    <div class="about-author-info-2 border-top mt-30 pt-20">
                        <ul>
                            <li>
                                <div class="about-author-info-2-brief  d-flex">
                                    <div class="author-img">
                                        <img src="view/img/blog/author.png" alt="#">
                                    </div>
                                    <div class="author-name-designation">
                                        <h4 class="mb-0">Pulok Biswas</h4>
                                        <small>Admin</small>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="about-author-info-2-contact  d-flex">
                                    <div class="about-contact-icon d-flex align-self-center mr-10">
                                        <i class="icon-call"></i>
                                    </div>
                                    <div class="about-author-info-2-contact-info">
                                        <small>Get Support</small>
                                        <h6> <a href="tel:+8801793651750">+8801793651750</a></h6>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ABOUT US AREA END -->

<!-- ABOUT US AREA START -->
<div class="ltn__about-us-area bg-image pt-115 pb-110" data-bs-bg="view/img/bg/26.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="about-us-img-wrap about-img-left">
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="about-us-info-wrap">
                    <div class="section-title-area ltn__section-title-2--- mb-20">
                        <h6 class="section-subtitle section-subtitle-2--- ltn__secondary-color">MindQuilo A mental
                            health counseling system</h6>
                        <h1 class="section-title">Accessible and Quality mental health care for everyone!
                        </h1>
                        <p>Your mind is your most valuable asset, and it deserves the best care possible. That’s why
                            MindQuilo offers you a smart way to care for your mind, by providing you with online
                            counseling and more for your mental well-being.
                            MindQuilo helps you access professional and convenient mental health care from
                            anywhere, anytime, and at your own pace. </p>
                    </div>
                    <ul class="ltn__list-item-half clearfix">
                        <li>
                            <i class="flaticon-home-2"></i>
                            Online counseling and more
                        </li>
                        <li>
                            <i class="flaticon-mountain"></i>
                            Mental health professionals
                        </li>
                        <li>
                            <i class="flaticon-heart"></i>
                            Self-help resources
                        </li>
                        <li>
                            <i class="flaticon-secure"></i>
                            Safe and supportive space
                        </li>
                    </ul>
                    <div class="btn-wrapper animated">
                        <a href="{{ route('about') }}" class="theme-btn-1 btn btn-effect-1 text-uppercase">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- BRAND LOGO AREA START -->
<div class="ltn__brand-logo-area ltn__brand-logo-1 section-bg-1--- pt-110--- pb-95 plr--9--- d-none---">
    <div class="container">
        <div class="row ltn__brand-logo-active">
            <div class="col-lg-12">
                <div class="ltn__brand-logo-item">
                    <img src="view/img/brand-logo/1.png" alt="Brand Logo">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BRAND LOGO AREA END -->

@include('layouts.footer')
