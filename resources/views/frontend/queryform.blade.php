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

                        <h2>Questions for Education Issues:</h2>
                        <div class="mb-3">
                            <label for="student_q1">Have you been feeling unusually anxious or stressed about schoolwork or exams in the past two weeks?</label>
                            <br>
                            <input type="radio" name="student_q1" value="yes" required> Yes
                            <input type="radio" name="student_q1" value="no" required> No
                            @error('student_q1')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="student_q2">Have you had trouble concentrating on your studies or completing assignments recently?</label>
                            <br>
                            <input type="radio" name="student_q2" value="yes" required> Yes
                            <input type="radio" name="student_q2" value="no" required> No
                            @error('student_q2')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="student_q3">Have you lost interest in extracurricular activities or hobbies that you usually enjoy?</label>
                            <br>
                            <input type="radio" name="student_q3" value="yes" required> Yes
                            <input type="radio" name="student_q3" value="no" required> No
                            @error('student_q3')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="student_q4">Have you been avoiding friends or social activities at university more than usual?</label>
                            <br>
                            <input type="radio" name="student_q4" value="yes" required> Yes
                            <input type="radio" name="student_q4" value="no" required> No
                            @error('student_q4')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="student_q5">Have you felt overwhelmed by the academic workload or the pressure to perform well in university?</label>
                            <br>
                            <input type="radio" name="student_q5" value="yes" required> Yes
                            <input type="radio" name="student_q5" value="no" required> No
                            @error('student_q5')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br>

                        <h2>Questions for Family Issues:</h2>
                        <div class="mb-3">
                            <label for="family_q1">Have you experienced frequent conflicts or arguments with family members recently?</label>
                            <br>
                            <input type="radio" name="family_q1" value="yes" required> Yes
                            <input type="radio" name="family_q1" value="no" required> No
                            @error('family_q1')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="family_q2">Do you feel unsupported or misunderstood by your family?</label>
                            <br>
                            <input type="radio" name="family_q2" value="yes" required> Yes
                            <input type="radio" name="family_q2" value="no" required> No
                            @error('family_q2')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="family_q3">Have you been avoiding spending time at home or with family members more than usual?</label>
                            <br>
                            <input type="radio" name="family_q3" value="yes" required> Yes
                            <input type="radio" name="family_q3" value="no" required> No
                            @error('family_q3')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="family_q4">Have family responsibilities been causing you significant stress or anxiety?</label>
                            <br>
                            <input type="radio" name="family_q4" value="yes" required> Yes
                            <input type="radio" name="family_q4" value="no" required> No
                            @error('family_q4')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="family_q5">Have you felt unsafe or uncomfortable in your home environment recently?</label>
                            <br>
                            <input type="radio" name="family_q5" value="yes" required> Yes
                            <input type="radio" name="family_q5" value="no" required> No
                            @error('family_q5')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br>

                        <h2>Questions for Relationship Issues:</h2>
                        <div class="mb-3">
                            <label for="relationship_q1">Have you been feeling disconnected or distant from your partner recently?</label>
                            <br>
                            <input type="radio" name="relationship_q1" value="yes" required> Yes
                            <input type="radio" name="relationship_q1" value="no" required> No
                            @error('relationship_q1')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="relationship_q2">Have you and your partner been having frequent arguments or disagreements?</label>
                            <br>
                            <input type="radio" name="relationship_q2" value="yes" required> Yes
                            <input type="radio" name="relationship_q2" value="no" required> No
                            @error('relationship_q2')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="relationship_q3">Do you feel unsupported or unappreciated in your relationship?</label>
                            <br>
                            <input type="radio" name="relationship_q3" value="yes" required> Yes
                            <input type="radio" name="relationship_q3" value="no" required> No
                            @error('relationship_q3')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="relationship_q4">Have you been avoiding spending time with your partner or communicating with them?</label>
                            <br>
                            <input type="radio" name="relationship_q4" value="yes" required> Yes
                            <input type="radio" name="relationship_q4" value="no" required> No
                            @error('relationship_q4')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="relationship_q5">Have you been questioning whether you want to continue your relationship?</label>
                            <br>
                            <input type="radio" name="relationship_q5" value="yes" required> Yes
                            <input type="radio" name="relationship_q5" value="no" required> No
                            @error('relationship_q5')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br>

                        <h2>Questions for Job Issues:</h2>
                        <div class="mb-3">
                            <label for="job_q1">Have you been feeling unusually stressed or anxious about your job in the past two weeks?</label>
                            <br>
                            <input type="radio" name="job_q1" value="yes" required> Yes
                            <input type="radio" name="job_q1" value="no" required> No
                            @error('job_q1')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="job_q2">Have you had trouble concentrating or staying productive at work recently?</label>
                            <br>
                            <input type="radio" name="job_q2" value="yes" required> Yes
                            <input type="radio" name="job_q2" value="no" required> No
                            @error('job_q2')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="job_q3">Have you been feeling unappreciated or undervalued at your job?</label>
                            <br>
                            <input type="radio" name="job_q3" value="yes" required> Yes
                            <input type="radio" name="job_q3" value="no" required> No
                            @error('job_q3')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="job_q4">Have you been avoiding work-related tasks or responsibilities more than usual?</label>
                            <br>
                            <input type="radio" name="job_q4" value="yes" required> Yes
                            <input type="radio" name="job_q4" value="no" required> No
                            @error('job_q4')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="job_q5">Have you been feeling overwhelmed by job demands or expectations?</label>
                            <br>
                            <input type="radio" name="job_q5" value="yes" required> Yes
                            <input type="radio" name="job_q5" value="no" required> No
                            @error('job_q5')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br>


                        <h2>Questions for Mental Health:</h2>
                        <div class="mb-3">
                            <label for="mental_health_q1">Have you been feeling sad or hopeless more than usual in the past two weeks?</label>
                            <br>
                            <input type="radio" name="mental_health_q1" value="yes" required> Yes
                            <input type="radio" name="mental_health_q1" value="no" required> No
                            @error('mental_health_q1')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="mental_health_q2">Have you noticed changes in your sleep patterns (e.g., trouble sleeping, oversleeping)?</label>
                            <br>
                            <input type="radio" name="mental_health_q2" value="yes" required> Yes
                            <input type="radio" name="mental_health_q2" value="no" required> No
                            @error('mental_health_q2')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="mental_health_q3">Have you experienced a lack of energy or motivation to do things you usually enjoy?</label>
                            <br>
                            <input type="radio" name="mental_health_q3" value="yes" required> Yes
                            <input type="radio" name="mental_health_q3" value="no" required> No
                            @error('mental_health_q3')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="mental_health_q4">Have you had thoughts of self-harm or suicide?</label>
                            <br>
                            <input type="radio" name="mental_health_q4" value="yes" required> Yes
                            <input type="radio" name="mental_health_q4" value="no" required> No
                            @error('mental_health_q4')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="mental_health_q5">Do you feel overwhelmed by your emotions or find it hard to cope with stress?</label>
                            <br>
                            <input type="radio" name="mental_health_q5" value="yes" required> Yes
                            <input type="radio" name="mental_health_q5" value="no" required> No
                            @error('mental_health_q5')<span class="text-danger">{{ $message }}</span>@enderror
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
