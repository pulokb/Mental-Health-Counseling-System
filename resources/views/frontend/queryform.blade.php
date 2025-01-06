@include('layouts.header')

<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image " data-bs-bg="view/img/bg/14.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">Test</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="{{ route('queryform') }}"><span class="ltn__secondary-color"><i
                                            class="fas fa-home"></i></span> Home</a></li>
                            <li>Query Interface</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="ltn__form-box contact-form-box box-shadow white-bg">
                <h2 class="title-2">Test Your Mental Health</h2>

                <form id="healthForm" action="{{ route('autoreport.post') }}" method="post">

                    @csrf

                    {{-- <h2>Depression</h2> --}}
                    <div class="mb-3">
                        <label for="depression_q1">1. Do you often feel depressed?</label>
                        <br>
                        <input type="radio" name="depression_q1" value="yes" required> Yes
                        <input type="radio" name="depression_q1" value="no" required> No
                        @error('depression_q1')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="depression_q2">2. Have you lost interest in activities you once enjoyed?</label>
                        <br>
                        <input type="radio" name="depression_q2" value="yes" required> Yes
                        <input type="radio" name="depression_q2" value="no" required> No
                        @error('depression_q2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="depression_q3">3. Do you feel tired or have little energy most days?</label>
                        <br>
                        <input type="radio" name="depression_q3" value="yes" required> Yes
                        <input type="radio" name="depression_q3" value="no" required> No
                        @error('depression_q3')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>

                    {{-- <h2>Anxiety</h2> --}}
                    <div class="mb-3">
                        <label for="anxiety_q1">4. Do you feel nervous or anxious often?</label>
                        <br>
                        <input type="radio" name="anxiety_q1" value="yes" required> Yes
                        <input type="radio" name="anxiety_q1" value="no" required> No
                        @error('anxiety_q1')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="anxiety_q2">5. Do you worry excessively about different aspects of your
                            life?</label>
                        <br>
                        <input type="radio" name="anxiety_q2" value="yes" required> Yes
                        <input type="radio" name="anxiety_q2" value="no" required> No
                        @error('anxiety_q2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="anxiety_q3">6. Do you have trouble relaxing?</label>
                        <br>
                        <input type="radio" name="anxiety_q3" value="yes" required> Yes
                        <input type="radio" name="anxiety_q3" value="no" required> No
                        @error('anxiety_q3')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>

                    {{-- <h2>Irritability</h2> --}}
                    <div class="mb-3">
                        <label for="irritability_q1">7. Do you feel easily irritated or angry?</label>
                        <br>
                        <input type="radio" name="irritability_q1" value="yes" required> Yes
                        <input type="radio" name="irritability_q1" value="no" required> No
                        @error('irritability_q1')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="irritability_q2">8. Do you have frequent arguments with others?</label>
                        <br>
                        <input type="radio" name="irritability_q2" value="yes" required> Yes
                        <input type="radio" name="irritability_q2" value="no" required> No
                        @error('irritability_q2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="irritability_q3">9. Do you get annoyed by small inconveniences?</label>
                        <br>
                        <input type="radio" name="irritability_q3" value="yes" required> Yes
                        <input type="radio" name="irritability_q3" value="no" required> No
                        @error('irritability_q3')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>

                    {{-- <h2>Emotional Dysregulation</h2> --}}
                    <div class="mb-3">
                        <label for="emotional_q1">10. Do you find it hard to control your emotions?</label>
                        <br>
                        <input type="radio" name="emotional_q1" value="yes" required> Yes
                        <input type="radio" name="emotional_q1" value="no" required> No
                        @error('emotional_q1')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="emotional_q2">11. Do you often feel overwhelmed by your feelings?</label>
                        <br>
                        <input type="radio" name="emotional_q2" value="yes" required> Yes
                        <input type="radio" name="emotional_q2" value="no" required> No
                        @error('emotional_q2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="emotional_q3">12. Do you have difficulty calming down when you are upset?</label>
                        <br>
                        <input type="radio" name="emotional_q3" value="yes" required> Yes
                        <input type="radio" name="emotional_q3" value="no" required> No
                        @error('emotional_q3')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>

                    {{-- <h2>Social Withdrawal</h2> --}}
                    <div class="mb-3">
                        <label for="social_q1">13. Have you been avoiding social interactions recently?</label>
                        <br>
                        <input type="radio" name="social_q1" value="yes" required> Yes
                        <input type="radio" name="social_q1" value="no" required> No
                        @error('social_q1')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="social_q2">14. Do you prefer spending time alone rather than with friends?</label>
                        <br>
                        <input type="radio" name="social_q2" value="yes" required> Yes
                        <input type="radio" name="social_q2" value="no" required> No
                        @error('social_q2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="social_q3">15. Do you feel disconnected from others?</label>
                        <br>
                        <input type="radio" name="social_q3" value="yes" required> Yes
                        <input type="radio" name="social_q3" value="no" required> No
                        @error('social_q3')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>

                    {{-- <h2>Fatigue</h2> --}}
                    <div class="mb-3">
                        <label for="fatigue_q1">16. Do you feel fatigued even after a good night's sleep?</label>
                        <br>
                        <input type="radio" name="fatigue_q1" value="yes" required> Yes
                        <input type="radio" name="fatigue_q1" value="no" required> No
                        @error('fatigue_q1')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="fatigue_q2">17. Is it challenging for you to complete daily tasks due to lack of energy?</label>
                        <br>
                        <input type="radio" name="fatigue_q2" value="yes" required> Yes
                        <input type="radio" name="fatigue_q2" value="no" required> No
                        @error('fatigue_q2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="fatigue_q3">18. Do you often feel drained or exhausted?</label>
                        <br>
                        <input type="radio" name="fatigue_q3" value="yes" required> Yes
                        <input type="radio" name="fatigue_q3" value="no" required> No
                        @error('fatigue_q3')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>

                    {{-- <h2>Difficulty Concentrating</h2> --}}
                    <div class="mb-3">
                        <label for="concentrating_q1">19. Do you often find it hard to focus on tasks?</label>
                        <br>
                        <input type="radio" name="concentrating_q1" value="yes" required> Yes
                        <input type="radio" name="concentrating_q1" value="no" required> No
                        @error('concentrating_q1')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="concentrating_q2">20. Do you struggle to remember things from day to day?</label>
                        <br>
                        <input type="radio" name="concentrating_q2" value="yes" required> Yes
                        <input type="radio" name="concentrating_q2" value="no" required> No
                        @error('concentrating_q2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="concentrating_q3">21. Are you easily distracted when working on something important?</label>
                        <br>
                        <input type="radio" name="concentrating_q3" value="yes" required> Yes
                        <input type="radio" name="concentrating_q3" value="no" required> No
                        @error('concentrating_q3')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>

                    {{-- <h2>Sleep Disturbances</h2> --}}
                    <div class="mb-3">
                        <label for="sleep_q1">22. Do you have trouble falling asleep at night?</label>
                        <br>
                        <input type="radio" name="sleep_q1" value="yes" required> Yes
                        <input type="radio" name="sleep_q1" value="no" required> No
                        @error('sleep_q1')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="sleep_q2">23. Do you frequently wake up during the night?</label>
                        <br>
                        <input type="radio" name="sleep_q2" value="yes" required> Yes
                        <input type="radio" name="sleep_q2" value="no" required> No
                        @error('sleep_q2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="sleep_q3">24. Do you feel unrefreshed after a full night's sleep?</label>
                        <br>
                        <input type="radio" name="sleep_q3" value="yes" required> Yes
                        <input type="radio" name="sleep_q3" value="no" required> No
                        @error('sleep_q3')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>

                    {{-- <h2>Low Self-Esteem</h2> --}}
                    <div class="mb-3">
                        <label for="esteem_q1">25. Do you often feel that you are not as good as others?</label>
                        <br>
                        <input type="radio" name="esteem_q1" value="yes" required> Yes
                        <input type="radio" name="esteem_q1" value="no" required> No
                        @error('esteem_q1')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="esteem_q2">26. Do you criticize yourself frequently?</label>
                        <br>
                        <input type="radio" name="esteem_q2" value="yes" required> Yes
                        <input type="radio" name="esteem_q2" value="no" required> No
                        @error('esteem_q2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="esteem_q3">27. Do you feel uncomfortable expressing your opinions?</label>
                        <br>
                        <input type="radio" name="esteem_q3" value="yes" required> Yes
                        <input type="radio" name="esteem_q3" value="no" required> No
                        @error('esteem_q3')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>

                    {{-- <h2>Panic Attacks</h2> --}}
                    <div class="mb-3">
                        <label for="panic_q1">28. Have you experienced sudden feelings of intense fear?</label>
                        <br>
                        <input type="radio" name="panic_q1" value="yes" required> Yes
                        <input type="radio" name="panic_q1" value="no" required> No
                        @error('panic_q1')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="panic_q2">29. Do you experience physical symptoms like rapid heart rate during moments of panic?</label>
                        <br>
                        <input type="radio" name="panic_q2" value="yes" required> Yes
                        <input type="radio" name="panic_q2" value="no" required> No
                        @error('panic_q2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="panic_q3">30. Do you worry about having another panic attack?</label>
                        <br>
                        <input type="radio" name="panic_q3" value="yes" required> Yes
                        <input type="radio" name="panic_q3" value="no" required> No
                        @error('panic_q3')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>

                    <button type="submit" class="theme-btn-1 btn btn-effect-1 text-uppercase">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<br><br><br><br><br><br><br><br>

@include('layouts.footer')
