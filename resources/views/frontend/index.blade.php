@include('layouts.header')
@include('includes.slider')

<!-- FEATURE AREA START ( Feature - 3) -->
<div class="ltn__feature-area section-bg-1 mt-90--- pt-30 pb-30 mt--65---">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__feature-item-box-wrap ltn__feature-item-box-wrap-2 ltn__border--- section-bg-1">
                    <div class="ltn__feature-item ltn__feature-item-8">
                        <div class="ltn__feature-icon">
                            <img src="view/img/icons/svg/9-money.png" alt="Questionnaire and Feedback">
                        </div>
                        <div class="ltn__feature-info">
                            <h4>Personalized Questionnaires & Feedback</h4>
                            <p>Gain insights into your mental well-being through tailored <br> questions and detailed feedback designed to support your journey.</p>
                        </div>
                    </div>
                    {{-- <div class="ltn__feature-item ltn__feature-item-8">
                        <div class="ltn__feature-icon">
                            <img src="view/img/icons/svg/10-credit-card.png" alt="Free Support">
                        </div>
                        <div class="ltn__feature-info">
                            <h4>Completely Free Access</h4>
                            <p>Breaking barriers to mental health care with <br> no financial burdens—support available for everyone.</p>
                        </div>
                    </div> --}}
                    <div class="ltn__feature-item ltn__feature-item-8">
                        <div class="ltn__feature-icon">
                            <img src="view/img/icons/svg/8-trolley.png" alt="Inclusive Mental Health Counseling">
                        </div>
                        <div class="ltn__feature-info">
                            <h4>Inclusive Mental Health Services</h4>
                            <p>Compassionate care tailored for individuals from all walks of life, <br> ensuring no one feels left behind.</p>
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
                    <img src="view/img/others/9.png" alt="Welcome to MindQuilo">
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="about-us-info-wrap">
                    <div class="section-title-area ltn__section-title-2--- mb-30">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color d-none">Welcome to MindQuilo</h6>
                        <h1 class="section-title">Empowering Your Mental Wellness with Compassion.</h1>
                        <p>At MindQuilo, we believe mental health care should be accessible, empathetic, and tailored to your unique journey. We’re here to bridge the gap between the support you need and the solutions that work best for you.</p>
                    </div>
                    <ul class="ltn__list-item-1 ltn__list-item-1-before--- clearfix">
                        <li><i class="fas fa-check-square"></i> Connect with certified professionals committed to understanding your needs and guiding you every step of the way.</li>
                        <li><i class="fas fa-check-square"></i> Explore a rich library of self-help resources, tools, and expert guidance designed to uplift and empower you.</li>
                        <li><i class="fas fa-check-square"></i> Access innovative mental health solutions tailored for individuals, families, and communities—all at no cost.</li>
                    </ul>
                    <div class="about-author-info-2 border-top mt-30 pt-20">
                        <ul>
                            <li>
                                <div class="about-author-info-2-brief d-flex">
                                    <div class="author-img">
                                        <img src="view/img/blog/author.png" alt="Pulok Biswas">
                                    </div>
                                    <div class="author-name-designation">
                                        <h4 class="mb-0">Pulok Biswas</h4>
                                        <small>Founder & Administrator</small>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="about-author-info-2-contact d-flex">
                                    <div class="about-contact-icon d-flex align-self-center mr-10">
                                        <i class="icon-call"></i>
                                    </div>
                                    <div class="about-author-info-2-contact-info">
                                        <small>Reach Out Anytime</small>
                                        <h6><a href="tel:+8801793651750">+8801793651750</a></h6>
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
<div class="ltn__about-us-area bg-image pt-115 pb-110" data-bs-bg="view/img/bg/12.jpg">
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
