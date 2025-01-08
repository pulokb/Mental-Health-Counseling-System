@include('layouts.header')
<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image " data-bs-bg="{{ asset('view/img/bg/14.png') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">Frequently asked questions </h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="{{ route('index') }}"><span class="ltn__secondary-color"><i
                                            class="fas fa-home"></i></span> Home</a></li>
                            <li>FAQ </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- FAQ AREA START (faq-2) (ID > accordion_2) -->
<div class="ltn__faq-area mb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="ltn__faq-inner ltn__faq-inner-2">
                    <div id="accordion_2">
                        <!-- card -->
                        <div class="card">
                            <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse" data-bs-target="#faq-item-2-1" aria-expanded="false">
                                What is mental illness?
                            </h6>
                            <div id="faq-item-2-1" class="collapse" data-bs-parent="#accordion_2">
                                <div class="card-body">
                                    <p>Mental illness refers to a wide range of mental health conditions that affect a person’s thinking, behavior, mood, or emotions. Examples include depression, anxiety, stress disorders, and more. Mental illness is common and treatable with the right support and care.</p>
                                </div>
                            </div>
                        </div>
                        <!-- card -->
                        <div class="card">
                            <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse" data-bs-target="#faq-item-2-2" aria-expanded="false">
                                What does this system do?
                            </h6>
                            <div id="faq-item-2-2" class="collapse" data-bs-parent="#accordion_2">
                                <div class="card-body">
                                    <p>Our system, MindQuilo, is a mental health counseling platform designed to provide users with a supportive environment to assess their mental well-being, receive personalized feedback, and access helpful suggestions from professionals. It also connects users with licensed mental health professionals for further support if needed.</p>
                                </div>
                            </div>
                        </div>
                        <!-- card -->
                        <div class="card">
                            <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse" data-bs-target="#faq-item-2-3" aria-expanded="false">
                                What are some common symptoms of mental health issues?
                            </h6>
                            <div id="faq-item-2-3" class="collapse" data-bs-parent="#accordion_2">
                                <div class="card-body">
                                    <p>Common symptoms include:
                                        Persistent sadness or low mood,
                                        Excessive worry or anxiety,
                                        Difficulty concentrating or making decisions,
                                        Changes in appetite or sleep patterns,
                                        Feelings of hopelessness or worthlessness,
                                        Irritability or withdrawal from loved ones,
                                        Unexplained physical symptoms like headaches or fatigue,
                                        If you notice these symptoms in yourself or someone else, it’s essential to seek support.</p>
                                </div>
                            </div>
                        </div>
                        <!-- card -->
                        <div class="card">
                            <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse" data-bs-target="#faq-item-2-4" aria-expanded="false">
                                What should I do if I think I have a mental health issue?
                            </h6>
                            <div id="faq-item-2-4" class="collapse" data-bs-parent="#accordion_2">
                                <div class="card-body">
                                    <p>If you suspect you’re experiencing a mental health issue:
                                        Talk to a trusted friend or family member about how you’re feeling.
                                        Use our system to get a quick assessment and suggestions tailored to your needs.
                                        Consult a mental health professional for a proper diagnosis and treatment plan.
                                        Engage in self-care activities such as exercising, meditating, and journaling.
                                        Early intervention is key to managing mental health effectively.</p>
                                </div>
                            </div>
                        </div>
                        <!-- card -->
                        <div class="card">
                            <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse" data-bs-target="#faq-item-2-5" aria-expanded="false">
                                How does this system work?
                            </h6>
                            <div id="faq-item-2-5" class="collapse" data-bs-parent="#accordion_2">
                                <div class="card-body">
                                    <p>MindQuilo works in three simple steps:
                                        Assessment: You answer a set of yes/no questions designed to evaluate your mental well-being.
                                        Feedback: Based on your answers, the system provides insights about your mental state and identifies potential symptoms.
                                        Suggestions: You’ll receive personalized recommendations and can connect with professionals for further guidance if necessary.
                                        The entire process is private, secure, and user-friendly.</p>
                                </div>
                            </div>
                        </div>
                        <!-- card -->
                        <div class="card">
                            <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse" data-bs-target="#faq-item-2-6" aria-expanded="false">
                                What are some general tips for maintaining good mental health?
                            </h6>
                            <div id="faq-item-2-6" class="collapse" data-bs-parent="#accordion_2">
                                <div class="card-body">
                                    <p>Maintain a healthy lifestyle with regular exercise and a balanced diet.
                                        Get enough sleep and establish a consistent sleep routine.
                                        Stay connected with friends and family for emotional support.
                                        Take breaks from work or studies to recharge.
                                        Practice mindfulness or meditation to reduce stress.
                                        Avoid substance abuse and seek help if you feel overwhelmed.
                                        Prioritize your mental health as part of your overall well-being.

                                        </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="need-support text-center mt-100">
                        <h2>Still need help? Reach out to support 24/7:</h2>
                        <div class="btn-wrapper mb-30">
                            <a href="{{ route('contact') }}" class="theme-btn-1 btn btn-effect-1 text-uppercase">Contact Us</a>
                        </div>
                        <h3><i class="fas fa-phone"></i>
                            <a href="tel:+8801793651750">+8801793651750</a>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <aside class="sidebar-area ltn__right-sidebar">
                    <!-- Newsletter Widget -->

                    <!-- Banner Widget -->
                    <div class="widget ltn__banner-widget">
                        <a href="#"><img src="view\img\blog\4.png" alt="Banner Image"></a>
                    </div>

                </aside>
            </div>
        </div>
    </div>
</div>
<!-- FAQ AREA START -->

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

@include('layouts.footer')
