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
                                        <a href="https://www.google.com/maps/place/Savar,+Dhaka+1342,+Bangladesh" target="_blank">
                                            <i class="icon-placeholder"></i>Jahangirnagar University, Savar, Dhaka-1342, Bangladesh.
                                        </a>
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
                                        <p><a href="mailto:pulok.contact@gmail.com">pulok.contact@gmail.com</a>
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
                                <li><a href="{{ route('profilev') }}">My account</a></li>
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
                                <li><a href="{{ route('profilev') }}">My account</a></li>
                                <li><a href="{{ route('faq') }}">FAQ</a></li>
                                <li><a href="{{ route('contact') }}">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12 col-12">
                    <div class="footer-widget footer-newsletter-widget">
                        <h4 class="footer-title">Newsletter</h4>
                        <p>Subscribe to our weekly Newsletter and <br> receive Daily Health Tips to Your Inbox.</p>
                        <div class="footer-newsletter">
                            <form id="newsletterForm" onsubmit="handleNewsletterSubmission(event)">
                                <input type="email" name="email" id="emailInput" placeholder="Email*" required>
                                <div class="btn-wrapper">
                                    <button class="theme-btn-1 btn" type="submit">
                                        <i class="fas fa-location-arrow"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <h5 class="mt-30">We Accept</h5>
                        <img src="view/img/icons/payment-4.png" alt="Payment Image">
                    </div>
                </div>

                <!-- Success Message Modal -->
                <div id="successModal" class="modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1000; justify-content: center; align-items: center;">
                    <div style="background: white; padding: 20px; border-radius: 5px; text-align: center;">
                        <h4>Success!</h4>
                        <p>Thank you for subscribing to our newsletter!</p>
                        <button onclick="closeSuccessModal()" style="background: #0A9A73; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">OK</button>
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
                            <li><a href="{{ route('about') }}">Terms & Conditions</a></li>
                            <li><a href="{{ route('about') }}">Claim</a></li>
                            <li><a href="{{ route('contact') }}">Privacy & Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- All JS Plugins -->
    <script src="{{ asset('view/js/plugins.js') }} "></script>
    <!-- Main JS -->
    <script src="{{ asset('view/js/main.js') }}"></script>

    <script>
        function handleNewsletterSubmission(event) {
            event.preventDefault(); // Prevent the form from refreshing the page

            // Show the success modal
            const successModal = document.getElementById('successModal');
            successModal.style.display = 'flex';

            // Redirect to the index page after a short delay
            setTimeout(() => {
                window.location.href = '/';
            }, 3000); // Redirect after 3 seconds
        }

        function closeSuccessModal() {
            const successModal = document.getElementById('successModal');
            successModal.style.display = 'none';
            window.location.href = '/';
        }
    </script>


</footer>
