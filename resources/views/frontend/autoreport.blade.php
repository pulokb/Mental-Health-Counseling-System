@include('layouts.header')


<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image " data-bs-bg="view/img/bg/14.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">Generated Result</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="{{ route('queryform') }}"><span class="ltn__secondary-color"><i
                                            class="fas fa-home"></i></span> Query Interface</a></li>
                            <li>Generated Result</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- Success Message -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-body text-start">
                    <div class="doctor-feedback">
                        <h3>Send Your Question For Doctor Feedback</h3>
                        <form action="{{ route('admin.doctorFeedbacks.store') }}" method="POST">
                            @csrf
                            <!-- Hidden inputs for user data -->
                            <input type="hidden" name="user_name" value="{{ $user->name }}">
                            <input type="hidden" name="age" value="{{ $user->age }}">
                            <input type="hidden" name="gender" value="{{ $user->gender }}">
                            <input type="hidden" name="occupation" value="{{ $user->occupation }}">

                            <!-- Hidden inputs for result data -->
                            <input type="hidden" name="overall_result" value="{{ $totalScore }}">
                            <input type="hidden" name="status" value="{{ $status }}"> <!-- Changed name here -->

                            <!-- Hidden inputs for individual category scores -->
                            <input type="hidden" name="educational" value="{{ $educationScore }}">
                            <input type="hidden" name="family" value="{{ $familyScore }}">
                            <input type="hidden" name="relationship" value="{{ $relationshipScore }}">
                            <input type="hidden" name="job" value="{{ $jobScore }}">
                            <input type="hidden" name="general" value="{{ $mentalHealthScore }}">

                            <!-- Textarea for user query -->
                            <textarea name="message" placeholder="Enter Query To Get Feedback"></textarea>

                            <!-- Submit button -->
                            <button type="submit" class="theme-btn-1 btn btn-effect-1 text-uppercase">Send</button>
                        </form>
                    </div>

                    <div class="suggestion-section">
                        <br>
                        <h3>Available Suggestions For You</h3>
                        @if(!empty($suggestions))
                            <ul>
                                @foreach($suggestions as $suggestion)
                                    <li>{{ $suggestion }}</li>
                                @endforeach
                            </ul>
                        @else
                            <div class="btn-wrapper mb-30">
                                <a href="{{ route('suggestions') }}" class="theme-btn-1 btn btn-effect-1 text-uppercase">Explore</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body text-start">
                    <div class="suggestion-section">
                        <h3>Available Suggestions For You</h3>
                        <br>
                        @if(!empty($suggestions))
                            <ul>
                                @foreach($suggestions as $suggestion)
                                    <li>{{ $suggestion }}</li>
                                @endforeach
                            </ul>
                        @else
                            <div class="btn-wrapper mb-30">
                                <a href="{{ route('suggestions') }}" class="theme-btn-1 btn btn-effect-1 text-uppercase">Explore</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .report-section {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            width: 100%;
            box-sizing: border-box;
            padding: 20px;
        }
        .section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            margin-bottom: 20px;
            box-sizing: border-box;
        }
        .result {
            flex: 1;
            padding-right: 20px;
        }
        .chart-container {
            flex-shrink: 0;
            width: 200px; /* Fixed width for charts */
            height: 200px; /* Fixed height for charts */
        }
        canvas {
            width: 100% !important;
            height: 100% !important;
        }
        @media (max-width: 768px) {
            .section {
                flex-direction: column;
                align-items: flex-start;
            }
            .chart-container {
                margin-top: 10px;
            }
        }
    </style>

<br><br><br>
    <div class="row">
        <!-- Left Side: User Information -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body text-start">

                    <div class="report-section">
                        <h4>Generated Result</h4>
                        <div class="section">
                            <div class="result" id="overall-result"></div>
                            <div class="chart-container" id="overall-chart-container">
                                <canvas id="overall-chart"></canvas>
                            </div>
                        </div>

                        <div class="section">
                            <div class="result" id="education-result"></div>
                            <div class="chart-container" id="education-chart-container">
                                <canvas id="education-chart"></canvas>
                            </div>
                        </div>

                        <div class="section">
                            <div class="result" id="family-result"></div>
                            <div class="chart-container" id="family-chart-container">
                                <canvas id="family-chart"></canvas>
                            </div>
                        </div>

                        <div class="section">
                            <div class="result" id="relationship-result"></div>
                            <div class="chart-container" id="relationship-chart-container">
                                <canvas id="relationship-chart"></canvas>
                            </div>
                        </div>

                        <div class="section">
                            <div class="result" id="job-result"></div>
                            <div class="chart-container" id="job-chart-container">
                                <canvas id="job-chart"></canvas>
                            </div>
                        </div>

                        <div class="section">
                            <div class="result" id="mental-health-result"></div>
                            <div class="chart-container" id="mental-health-chart-container">
                                <canvas id="mental-health-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Right Side: Edit Profile Form -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body text-start">
                    <div class="report-section">
                        <h4>Generated Report</h4>
                        <p><strong>Name:</strong> {{ $user->name }}</p>
                        <p><strong>Age:</strong> {{ $user->age }} Years Old</p>
                        <p><strong>Gender:</strong> {{ $user->gender }}</p>
                        <p><strong>Occupation:</strong> {{ $user->occupation }}</p>
                        <div>
                            <div id="generated-report"></div>
                            {{-- <button class="btn btn-primary btn-sm" onclick="printReport()">Print Report</button> --}}
                        </div>
                    </div>

                </div>
            </div>
        </div>


<script>
    const userQueries = {
        student_q1: "{{ $userqueries->student_q1 }}",
        student_q2: "{{ $userqueries->student_q2 }}",
        student_q3: "{{ $userqueries->student_q3 }}",
        student_q4: "{{ $userqueries->student_q4 }}",
        student_q5: "{{ $userqueries->student_q5 }}",
        family_q1: "{{ $userqueries->family_q1 }}",
        family_q2: "{{ $userqueries->family_q2 }}",
        family_q3: "{{ $userqueries->family_q3 }}",
        family_q4: "{{ $userqueries->family_q4 }}",
        family_q5: "{{ $userqueries->family_q5 }}",
        relationship_q1: "{{ $userqueries->relationship_q1 }}",
        relationship_q2: "{{ $userqueries->relationship_q2 }}",
        relationship_q3: "{{ $userqueries->relationship_q3 }}",
        relationship_q4: "{{ $userqueries->relationship_q4 }}",
        relationship_q5: "{{ $userqueries->relationship_q5 }}",
        job_q1: "{{ $userqueries->job_q1 }}",
        job_q2: "{{ $userqueries->job_q2 }}",
        job_q3: "{{ $userqueries->job_q3 }}",
        job_q4: "{{ $userqueries->job_q4 }}",
        job_q5: "{{ $userqueries->job_q5 }}",
        mental_health_q1: "{{ $userqueries->mental_health_q1 }}",
        mental_health_q2: "{{ $userqueries->mental_health_q2 }}",
        mental_health_q3: "{{ $userqueries->mental_health_q3 }}",
        mental_health_q4: "{{ $userqueries->mental_health_q4 }}",
        mental_health_q5: "{{ $userqueries->mental_health_q5 }}"
    };

    const questions = {
        student_q1: "feeling unusually anxious or stressed about universitywork or exams in the past two weeks",
        student_q2: "struggling to keep up with your coursework",
        student_q3: "having difficulties understanding the material",
        student_q4: "often procrastinating on your assignments",
        student_q5: "feeling anxious about exams",
        family_q1: "experiencing frequent conflicts with family members",
        family_q2: "feeling unsupported by your family",
        family_q3: "having communication issues with your family",
        family_q4: "feeling misunderstood by your family",
        family_q5: "finding it difficult to spend time with your family",
        relationship_q1: "experiencing frequent conflicts in your relationships",
        relationship_q2: "feeling unsupported by your partner",
        relationship_q3: "having communication issues with your partner",
        relationship_q4: "feeling misunderstood by your partner",
        relationship_q5: "finding it difficult to spend time with your partner",
        job_q1: "feeling stressed at work",
        job_q2: "struggling to keep up with your job responsibilities",
        job_q3: "having difficulties with your colleagues",
        job_q4: "feeling unappreciated at work",
        job_q5: "often thinking about changing jobs",
        mental_health_q1: "feeling anxious or stressed frequently",
        mental_health_q2: "having trouble sleeping",
        mental_health_q3: "feeling down or depressed",
        mental_health_q4: "finding it difficult to enjoy activities you once liked",
        mental_health_q5: "having trouble concentrating"
    };

    function calculateScore(queries, prefix) {
        let score = 0;
        for (let i = 1; i <= 5; i++) {
            if (queries[`${prefix}_q${i}`] === "yes") {
                score += 20;
            }
        }
        return score;
    }

    function calculateTotalScore(queries) {
        let totalScore = 0;
        for (let key in queries) {
            if (queries[key] === "yes") {
                totalScore += 4;
            }
        }
        return totalScore;
    }

    function getColorClass(score) {
        if (score <= 40) {
            return "strong";
        } else if (score <= 60) {
            return "moderate";
        } else {
            return "danger";
        }
    }

    function getComment(score) {
        if (score <= 40) {
            return "Good";
        } else if (score <= 60) {
            return "Moderate";
        } else {
            return "Weak";
        }
    }

    function generateChart(ctx, score, sectionName) {
        const unbalanced = score;
        const balanced = 100 - score;
        const labelUnbalanced = `${unbalanced}% (Unbalanced)`;
        const labelBalanced = `${balanced}% (Balanced)`;
        const color = unbalanced <= 40 ? 'yellow' : unbalanced <= 60 ? 'orange' : 'red';
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [labelUnbalanced, labelBalanced],
                datasets: [{
                    label: sectionName,
                    data: [unbalanced, balanced],
                    backgroundColor: [color, 'green']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                }
            }
        });
    }

    function displayResult(sectionId, score, title) {
        const resultDiv = document.getElementById(`${sectionId}-result`);
        const chartContainer = document.getElementById(`${sectionId}-chart-container`);
        resultDiv.innerHTML = `<p>${title}: ${score}%</p>
                               <p>Status: ${getComment(score)}</p>`;
        const ctx = document.getElementById(`${sectionId}-chart`).getContext('2d');
        generateChart(ctx, score, title);
    }

    // Calculate scores
    const educationScore = calculateScore(userQueries, 'student');
    const familyScore = calculateScore(userQueries, 'family');
    const relationshipScore = calculateScore(userQueries, 'relationship');
    const jobScore = calculateScore(userQueries, 'job');
    const mentalHealthScore = calculateScore(userQueries, 'mental_health');
    const totalScore = calculateTotalScore(userQueries);
    const overallComment = getComment(totalScore);

    const overallResultDiv = document.getElementById('overall-result');
    overallResultDiv.innerHTML = `<p>Overall Result: ${totalScore}%</p>
                                  <p>Mental Health Status: ${overallComment}</p>`;

    const overallCtx = document.getElementById('overall-chart').getContext('2d');
    generateChart(overallCtx, totalScore, 'Overall');

    // Display section results
    displayResult('education', educationScore, 'Educational');
    displayResult('family', familyScore, 'Family');
    displayResult('relationship', relationshipScore, 'Relationship');
    displayResult('job', jobScore, 'Job');
    displayResult('mental-health', mentalHealthScore, 'General Health');

    // Generate report based on yes answers
    function generateReport(queries) {
        const reportDiv = document.getElementById('generated-report');
        const sections = {
            student: 'Educational',
            family: 'Family',
            relationship: 'Relationship',
            job: 'Job',
            mental_health: 'General Health'
        };

        let reportContent = '';

        for (let section in sections) {
            for (let i = 1; i <= 5; i++) {
                if (queries[`${section}_q${i}`] === "yes") {
                    const questionKey = `${section}_q${i}`;
                    reportContent += `<p>You had ${questions[questionKey]} .</p>`;
                }
            }
        }

        reportDiv.innerHTML = reportContent;
    }

    generateReport(userQueries);

     // Print the report
     function printReport() {
        window.print();
    }

    // Save the report as PDF using jsPDF
    // function saveReportAsPDF() {
    //     const reportDiv = document.getElementById('generated-report');
    //     const doc = new jsPDF();
    //     doc.fromHTML(reportDiv.innerHTML, 10, 10);
    //     doc.save('report.pdf');
    // }

</script>


</div>
</div>
<br><br><br><br>

@include('layouts.footer')
