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
@if (session('success'))
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
                            <input type="hidden" name="address" value="{{ $user->address }}">

                            <!-- Hidden inputs for result data -->
                            <input type="hidden" name="overall_result" value="{{ $totalScore }}">
                            <input type="hidden" name="status" value="{{ $status }}"> <!-- Changed name here -->

                            <!-- Hidden inputs for individual category scores -->
                            <input type="hidden" name="depression" value="{{ $depressionScore }}">
                            <input type="hidden" name="anxiety" value="{{ $anxietyScore }}">
                            <input type="hidden" name="irritability" value="{{ $irritabilityScore }}">
                            <input type="hidden" name="emotional" value="{{ $emotionalScore }}">
                            <input type="hidden" name="social" value="{{ $socialScore }}">
                            <input type="hidden" name="fatigue" value="{{ $fatigueScore }}">
                            <input type="hidden" name="concentrating" value="{{ $concentratingScore }}">
                            <input type="hidden" name="sleep" value="{{ $sleepScore }}">
                            <input type="hidden" name="esteem" value="{{ $esteemScore }}">
                            <input type="hidden" name="panic" value="{{ $panicScore }}">

                            <!-- Textarea for user query -->
                            <textarea name="message" placeholder="Enter Query To Get Feedback"></textarea>

                            <!-- Submit button -->
                            <button type="submit" class="theme-btn-1 btn btn-effect-1 text-uppercase">Send</button>
                        </form>
                    </div>

                    <div class="suggestion-section">
                        <br>
                        <h3>Available Suggestions For You</h3>
                        @if (!empty($suggestions))
                            <ul>
                                @foreach ($suggestions as $suggestion)
                                    <li>{{ $suggestion }}</li>
                                @endforeach
                            </ul>
                        @else
                            <div class="btn-wrapper mb-30">
                                <a href="{{ route('suggestions') }}"
                                    class="theme-btn-1 btn btn-effect-1 text-uppercase">Explore</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
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
            width: 200px;
            /* Fixed width for charts */
            height: 200px;
            /* Fixed height for charts */
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
                            <div class="result" id="depression-result"></div>
                            <div class="chart-container" id="depression-chart-container">
                                <canvas id="depression-chart"></canvas>
                            </div>
                        </div>

                        <div class="section">
                            <div class="result" id="anxiety-result"></div>
                            <div class="chart-container" id="anxiety-chart-container">
                                <canvas id="anxiety-chart"></canvas>
                            </div>
                        </div>

                        <div class="section">
                            <div class="result" id="irritability-result"></div>
                            <div class="chart-container" id="irritability-chart-container">
                                <canvas id="irritability-chart"></canvas>
                            </div>
                        </div>

                        <div class="section">
                            <div class="result" id="emotional-result"></div>
                            <div class="chart-container" id="emotional-chart-container">
                                <canvas id="emotional-chart"></canvas>
                            </div>
                        </div>

                        <div class="section">
                            <div class="result" id="social-health-result"></div>
                            <div class="chart-container" id="social-health-chart-container">
                                <canvas id="social-health-chart"></canvas>
                            </div>
                        </div>
                        <div class="section">
                            <div class="result" id="fatigue-health-result"></div>
                            <div class="chart-container" id="fatigue-health-chart-container">
                                <canvas id="fatigue-health-chart"></canvas>
                            </div>
                        </div>
                        <div class="section">
                            <div class="result" id="concentrating-result"></div>
                            <div class="chart-container" id="concentrating-chart-container">
                                <canvas id="concentrating-chart"></canvas>
                            </div>
                        </div>
                        <div class="section">
                            <div class="result" id="sleep-result"></div>
                            <div class="chart-container" id="sleep-chart-container">
                                <canvas id="sleep-chart"></canvas>
                            </div>
                        </div>
                        <div class="section">
                            <div class="result" id="esteem-result"></div>
                            <div class="chart-container" id="esteem-chart-container">
                                <canvas id="esteem-chart"></canvas>
                            </div>
                        </div>
                        <div class="section">
                            <div class="result" id="panic-result"></div>
                            <div class="chart-container" id="panic-chart-container">
                                <canvas id="panic-chart"></canvas>
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
                    <h4>Generated Report</h4>
                    <div class="report-sectione">
                        <p><strong>Name:</strong> {{ $user->name }}</p>
                        <p><strong>Age:</strong> {{ $user->age }} Years Old</p>
                        <p><strong>Gender:</strong> {{ $user->gender }}</p>
                        <p><strong>Occupation:</strong> {{ $user->occupation }}</p>
                        <p><strong>Address:</strong> {{ $user->address }}</p>
                        <div>
                            <div id="generated-report">
                            </div>
                        </div>
                    </div>
                    <button class="theme-btn-1 btn btn-effect-1 text-uppercase" onclick="printReport()">Print
                        Report</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function printReport() {
    // Get the content of the report section
    var printContent = document.querySelector('.report-sectione').innerHTML;
    var originalContent = document.body.innerHTML;

    // Get the current date
    var currentDate = new Date();
    var formattedDate = currentDate.toLocaleDateString(); // Formats date as 'MM/DD/YYYY'

    // Add the date and logo to the print content
    var headerHtml = `
        <div style="display: flex; align-items: center; margin-bottom: 20px;">
            <img src="view/img/logo.png" alt="MindQuilo Logo" style="height: 50px; margin-right: 20px;">
        </div>
        <p style="text-align: center; font-weight: bold; color: blue;">
            Report Generated By MindQuilo Printed on: ${formattedDate}
        </p>
    `;

    // Combine the header and the content of the report
    var fullPrintContent = headerHtml + printContent;

    // Replace the body content with the printable content
    document.body.innerHTML = fullPrintContent;
    window.print();

    // Restore the original content of the page
    document.body.innerHTML = originalContent;
}

        const userQueries = {
            depression_q1: "{{ $userqueries->depression_q1 }}",
            depression_q2: "{{ $userqueries->depression_q2 }}",
            depression_q3: "{{ $userqueries->depression_q3 }}",
            anxiety_q1: "{{ $userqueries->anxiety_q1 }}",
            anxiety_q2: "{{ $userqueries->anxiety_q2 }}",
            anxiety_q3: "{{ $userqueries->anxiety_q3 }}",
            irritability_q1: "{{ $userqueries->irritability_q1 }}",
            irritability_q2: "{{ $userqueries->irritability_q2 }}",
            irritability_q3: "{{ $userqueries->irritability_q3 }}",
            emotional_q1: "{{ $userqueries->emotional_q1 }}",
            emotional_q2: "{{ $userqueries->emotional_q2 }}",
            emotional_q3: "{{ $userqueries->emotional_q3 }}",
            social_q1: "{{ $userqueries->social_q1 }}",
            social_q2: "{{ $userqueries->social_q2 }}",
            social_q3: "{{ $userqueries->social_q3 }}",
            fatigue_q1: "{{ $userqueries->fatigue_q1 }}",
            fatigue_q2: "{{ $userqueries->fatigue_q2 }}",
            fatigue_q3: "{{ $userqueries->fatigue_q3 }}",
            concentrating_q1: "{{ $userqueries->concentrating_q1 }}",
            concentrating_q2: "{{ $userqueries->concentrating_q2 }}",
            concentrating_q3: "{{ $userqueries->concentrating_q3 }}",
            sleep_q1: "{{ $userqueries->sleep_q1 }}",
            sleep_q2: "{{ $userqueries->sleep_q2 }}",
            sleep_q3: "{{ $userqueries->sleep_q3 }}",
            esteem_q1: "{{ $userqueries->esteem_q1 }}",
            esteem_q2: "{{ $userqueries->esteem_q2 }}",
            esteem_q3: "{{ $userqueries->esteem_q3 }}",
            panic_q1: "{{ $userqueries->panic_q1 }}",
            panic_q2: "{{ $userqueries->panic_q2 }}",
            panic_q3: "{{ $userqueries->panic_q3 }}",
        };

        const questions = {
            depression_q1: "You often feel depressed.",
            depression_q2: "You have lost interest in activities you once enjoyed.",
            depression_q3: "You feel tired or have little energy most days.",

            anxiety_q1: "You feel nervous or anxious often.",
            anxiety_q2: "You worry excessively about different aspects of your life.",
            anxiety_q3: "You have trouble relaxing.",

            irritability_q1: "You feel easily irritated or angry.",
            irritability_q2: "You have frequent arguments with others.",
            irritability_q3: "You get annoyed by small inconveniences.",

            emotional_q1: "You find it hard to control your emotions.",
            emotional_q2: "You often feel overwhelmed by your feelings.",
            emotional_q3: "You have difficulty calming down when you are upset.",

            social_q1: "You have been avoiding social interactions recently.",
            social_q2: "You prefer spending time alone rather than with friends.",
            social_q3: "You feel disconnected from others.",

            fatigue_q1: "You feel fatigued even after a good night's sleep.",
            fatigue_q2: "It is challenging for you to complete daily tasks due to lack of energy.",
            fatigue_q3: "You often feel drained or exhausted.",

            concentrating_q1: "You often find it hard to focus on tasks.",
            concentrating_q2: "You struggle to remember things from day to day.",
            concentrating_q3: "You are easily distracted when working on something important.",

            sleep_q1: "You have trouble falling asleep at night.",
            sleep_q2: "You frequently wake up during the night.",
            sleep_q3: "You feel unrefreshed after a full night's sleep.",

            esteem_q1: "You often feel that you are not as good as others.",
            esteem_q2: "You criticize yourself frequently.",
            esteem_q3: "You feel uncomfortable expressing your opinions.",

            panic_q1: "You have experienced sudden feelings of intense fear.",
            panic_q2: "You experience physical symptoms like rapid heart rate during moments of panic.",
            panic_q3: "You worry about having another panic attack."

        };

        function calculateScore(queries, prefix) {
            let yesCount = 0;
            for (let i = 1; i <= 3; i++) {
                if (queries[`${prefix}_q${i}`] === "yes") {
                    yesCount++;
                }
            }

            if (yesCount === 3) return 100;
            if (yesCount === 2) return 66;
            if (yesCount === 1) return 33;
            return 0;
        }

        function calculateTotalScore(queries) {
            let totalScore = 0;
            const numberOfQuestions = Object.keys(queries).length;
            const scorePerYes = 100 / numberOfQuestions; // Adjust the score per "yes" response

            for (let key in queries) {
                if (queries[key] === "yes") {
                    totalScore += scorePerYes; // Add score per "yes"
                }
            }

            return Math.round(totalScore * 100) / 100; // Round to 2 decimal places
        }


        function getSelectedQuestions(queries, prefix) {
            let selectedQuestions = [];
            for (let i = 1; i <= 3; i++) {
                if (queries[`${prefix}_q${i}`] === "yes") {
                    selectedQuestions.push(questions[`${prefix}_q${i}`]);
                }
            }
            return selectedQuestions;
        }

        function getColorClass(score) {
            if (score <= 45) {
                return "strong";
            } else if (score <= 60) {
                return "moderate";
            } else {
                return "danger";
            }
        }

        function getComment(score) {
            if (score <= 45) {
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
            const color = unbalanced <= 45 ? 'yellow' : unbalanced <= 60 ? 'orange' : 'red';
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

        window.onload = function() {
            const depressionScore = calculateScore(userQueries, "depression");
            const anxietyScore = calculateScore(userQueries, "anxiety");
            const irritabilityScore = calculateScore(userQueries, "irritability");
            const emotionalScore = calculateScore(userQueries, "emotional");
            const socialHealthScore = calculateScore(userQueries, "social");
            const fatigueHealthScore = calculateScore(userQueries, "fatigue");
            const concentratingScore = calculateScore(userQueries, "concentrating");
            const sleepScore = calculateScore(userQueries, "sleep");
            const esteemScore = calculateScore(userQueries, "esteem");
            const panicScore = calculateScore(userQueries, "panic");

            // Display results for each category
            displayResult("depression", depressionScore, "Depression");
            displayResult("anxiety", anxietyScore, "Anxiety");
            displayResult("irritability", irritabilityScore, "Irritability");
            displayResult("emotional", emotionalScore, "Emotional Health");
            displayResult("social-health", socialHealthScore, "Social Health");
            displayResult("fatigue-health", fatigueHealthScore, "Fatigue");
            displayResult("concentrating", concentratingScore, "Concentration");
            displayResult("sleep", sleepScore, "Sleep");
            displayResult("esteem", esteemScore, "Self Esteem");
            displayResult("panic", panicScore, "Panic");

            // Calculate total score and display
            const totalScore = calculateTotalScore(userQueries);
            const totalResultDiv = document.getElementById("overall-result");
            totalResultDiv.innerHTML = `<p>Total Score: ${totalScore}%</p>
                                        <p>Status: ${getComment(totalScore)}</p>`;
            const totalCtx = document.getElementById("overall-chart").getContext('2d');
            generateChart(totalCtx, totalScore, "Overall Health");
        };

        // Generate report based on yes answers
        function generateReport(queries) {
            const reportDiv = document.getElementById('generated-report');
            const sections = {
                depression: 'Depression',
                anxiety: 'Anxiety',
                irritability: 'Irritability',
                emotional: 'Emotional Health',
                social: 'Social Health',
                fatigue: 'Fatigue',
                concentrating: 'Concentrating',
                sleep: 'Sleep',
                esteem: 'Self Esteem',
                panic: 'Panic'
            };

            let reportContent = '';

            for (let section in sections) {
                for (let i = 1; i <= 3; i++) {
                    if (queries[`${section}_q${i}`] === "yes") {
                        const questionKey = `${section}_q${i}`;
                        reportContent += `<p> ${questions[questionKey]} .</p>`;
                    }
                }
            }

            reportDiv.innerHTML = reportContent;
        }

        generateReport(userQueries);

        // // Print the report
        // function printReport() {
        //     window.print();
        // }
    </script>
</div>
@include('layouts.footer')
