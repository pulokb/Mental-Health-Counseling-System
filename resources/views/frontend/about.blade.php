@include('layouts.header')

<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image" data-bs-bg="view/img/bg/14.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">About Us</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="{{ route('index') }}"><span class="ltn__secondary-color"><i
                                            class="fas fa-home"></i></span> Home</a></li>
                            <li>About</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->
<!-- ABOUT US AREA START -->
<div class="ltn__about-us-area pt-25 pb-120">
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
                        <h1 class="section-title">Your Trusted Companion for Mental Well-being</h1>
                        <p>At MindQuilo, we are committed to providing a safe and supportive environment for individuals seeking to improve their mental health. Our platform connects you with licensed professionals and evidence-based resources to help you navigate life’s challenges with confidence and care.</p>
                    </div>
                    <ul class="ltn__list-item-1 ltn__list-item-1-before--- clearfix">
                        <li><i class="fas fa-check-square"></i> Access expert guidance from certified mental health professionals who are here to support you every step of the way.</li>
                        <li><i class="fas fa-check-square"></i> Explore a range of self-help tools, articles, and techniques to empower you on your mental health journey.</li>
                        <li><i class="fas fa-check-square"></i> Convenient, private, and secure access to mental health services—anytime, anywhere.</li>
                    </ul>
                    <div class="about-author-info-2 border-top mt-30 pt-20">
                        <ul>
                            <li>
                                <div class="about-author-info-2-brief d-flex">
                                    <div class="author-img">
                                        <img src="view/img/blog/author.png" alt="{{ route('about') }}">
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
                                        <small>Need Assistance?</small>
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

<!-- FEATURE AREA START ( Feature - 6) -->
<div class="ltn__feature-area pt-90 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2--- text-center">
                    <h1 class="section-title">Core Features</h1>
                </div>
            </div>
        </div>
        <div class="row ltn__custom-gutter">
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="ltn__feature-item ltn__feature-item-6 text-center">
                    <div class="ltn__feature-icon">

                        <img src="view/img/icons/icon-img/24.png" alt="{{ route('about') }}">
                    </div>
                    <div class="ltn__feature-info">
                        <h4><a href="{{ route('about') }}">Empathetic Design</a></h4>
                        <p style="text-align: justify;">At its core, design is visual storytelling. MindQuilo’s website exudes a sense of
                            tranquility. Let muted colors and stirring images create the ambiance, resonating a
                            sense of empathy.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="ltn__feature-item ltn__feature-item-6 text-center active">
                    <div class="ltn__feature-icon">

                        <img src="view/img/icons/icon-img/25.png" alt="{{ route('about') }}">
                    </div>
                    <div class="ltn__feature-info">
                        <h4><a href="{{ route('about') }}">Holistic Approach</a></h4>
                        <p style="text-align: justify;">Straightforward messaging, user-friendly navigation pages. Whether you’re looking for
                            counseling, self-help resources, or community connections, MindQuilo provides a
                            holistic experience.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="ltn__feature-item ltn__feature-item-6 text-center">
                    <div class="ltn__feature-icon">

                        <img src="view/img/icons/icon-img/26.png" alt="{{ route('about') }}">
                    </div>
                    <div class="ltn__feature-info">
                        <h4><a href="{{ route('about') }}">Content</a></h4>
                        <p style="text-align: justify;">Dive into our niche-specific content suggestions, symptoms, and more. MindQuilo faithfully
                            represents your mental health needs, drawing in new clients who seek quality
                            information and support.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="ltn__feature-item ltn__feature-item-6 text-center">
                    <div class="ltn__feature-icon">

                        <img src="view/img/icons/icon-img/27.png" alt="{{ route('about') }}">
                    </div>
                    <div class="ltn__feature-info">
                        <h4><a href="{{ route('about') }}">Anytime, Anywhere</a></h4>
                        <p style="text-align: justify;">Mental health doesn’t wait for office hours. We ensures 24/7 accessibility. Whether
                            you’re struggling to express your pain or seeking urgent assistance, our website is
                            your reliable companion.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FEATURE AREA END -->

<!-- COUNTER UP AREA START -->
<div class="ltn__counterup-area section-bg-1 bg-image bg-overlay-theme-black-80--- pt-115 pb-70" data-bs-bg="{{ asset('view/img/bg/30.png') }}">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 align-self-center">
                <div class="ltn__counterup-item text-center">
                    <div class="counter-icon">
                        <i class="flaticon-add-user-1"></i>
                    </div>
                    <h1><span class="counter">500</span><span class="counterUp-icon">+</span> </h1>
                    <h6>Active Clients</h6>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 align-self-center">
                <div class="ltn__counterup-item text-center">
                    <div class="counter-icon">
                        <i class="flaticon-dining-table-with-chairs"></i>
                    </div>
                    <h1><span class="counter">800</span><span class="counterUp-icon">+</span> </h1>
                    <h6>Cup Of Coffee</h6>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 align-self-center">
                <div class="ltn__counterup-item text-center">
                    <div class="counter-icon">
                        <i class="flaticon-package"></i>
                    </div>
                    <h1><span class="counter">150</span><span class="counterUp-icon">+</span> </h1>
                    <h6>Get Rewards</h6>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 align-self-center">
                <div class="ltn__counterup-item text-center">
                    <div class="counter-icon">
                        <i class="flaticon-maps-and-location"></i>
                    </div>
                    <h1><span class="counter">1</span><span class="counterUp-icon">+</span> </h1>
                    <h6>Country Cover</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- COUNTER UP AREA END -->
<br><br><br><br><br>

<!-- FEATURE AREA START ( Feature - 6) -->
<div class="ltn__feature-area section-bg-1 pt-115 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2 text-center">
                    <h6 class="section-subtitle ltn__secondary-color">// features //</h6>
                    <h1 class="section-title">Why Choose Us<span>.</span></h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-6 col-12">
                <div class="ltn__feature-item ltn__feature-item-7">
                    <div class="ltn__feature-icon-title">
                        <div class="ltn__feature-icon">
                            <span><i class="fas fa-hand-holding-medical"></i> </span>
                        </div>
                        <h3><a href="{{ route('about') }}">Comprehensive Support</a></h3>
                    </div>
                    <div class="ltn__feature-info">
                        <p style="text-align: justify;">We are dedicated to your mental well-being. Whether you’re seeking personalized counseling, community support, or self-help tools, our platform provides a one-stop solution tailored to your needs.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-12">
                <div class="ltn__feature-item ltn__feature-item-7">
                    <div class="ltn__feature-icon-title">
                        <div class="ltn__feature-icon">
                            <span><i class="fas fa-microscope"></i> </span>
                        </div>
                        <h3><a href="{{ route('about') }}">Always Available</a></h3>
                    </div>
                    <div class="ltn__feature-info">
                        <p style="text-align: justify;">With 24/7 accessibility, you can connect with MindQuilo anytime, anywhere. Whether it’s late at night or during a busy day, we’re here to help you navigate your mental health journey.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-12">
                <div class="ltn__feature-item ltn__feature-item-7">
                    <div class="ltn__feature-icon-title">
                        <div class="ltn__feature-icon">
                            <span><i class="fas fa-stethoscope"></i> </span>
                        </div>
                        <h3><a href="{{ route('about') }}">Expert Resources</a></h3>
                    </div>
                    <div class="ltn__feature-info">
                        <p style="text-align: justify;">Our platform is built on expert insights and curated resources. From interactive tools to informative blogs and self-care guides, MindQuilo offers you valuable and actionable content to support your mental health.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FEATURE AREA END -->
</div>
<br><br><br><br><br>
@include('layouts.footer')
