@include('layouts.header')

<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image" data-bs-bg="view/img/bg/14.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">Report</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="{{ route('profilev') }}"><span class="ltn__secondary-color"><i
                                            class="fas fa-home"></i></span> {{ Auth::user()->name }}</a></li>

                            <li>Report</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<div class="ltn__blog-area ltn__blog-item-3-normal mb-100">
    <div class="container">
        <div class="row">
            <h3>{{ Auth::user()->name }}'s Prescription</h3>

            @if ($feedbacks->isEmpty())
                <p>You have not submitted any feedback yet.</p>
            @else
                @foreach ($feedbacks as $feedback)
                    <div class="col-lg-4 col-sm-6 col-12 mb-4">
                        <!-- Feedback card start -->
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <div class="print-section">
                                    <h6 class="card-title">{{ Auth::user()->name }}'s
                                        {{ $feedback->created_at->format('F d, Y') }} Report</h6>

                                    <!-- Status with color based on value -->
                                    <h5 class="card-title">
                                        Status:
                                        <span
                                            class="
                                        @if (strtolower($feedback->status) === 'weak') text-danger
                                        @elseif(strtolower($feedback->status) === 'moderate') text-warning
                                        @elseif(strtolower($feedback->status) === 'good') text-success @endif">
                                            {{ ucfirst($feedback->status) }}
                                        </span>
                                    </h5>

                                    <ul class="list-unstyled">
                                        <li>
                                            <strong
                                                class="{{ $feedback->depression > 70 ? 'text-danger' : ($feedback->depression == 50 ? 'text-warning' : '') }}">
                                                Depression:
                                            </strong>
                                            {{ $feedback->depression }}
                                        </li>
                                        <li>
                                            <strong
                                                class="{{ $feedback->anxiety > 70 ? 'text-danger' : ($feedback->anxiety == 50 ? 'text-warning' : '') }}">
                                                Anxiety:
                                            </strong>
                                            {{ $feedback->anxiety }}
                                        </li>
                                        <li>
                                            <strong
                                                class="{{ $feedback->irritability > 70 ? 'text-danger' : ($feedback->irritability == 50 ? 'text-warning' : '') }}">
                                                Irritability:
                                            </strong>
                                            {{ $feedback->irritability }}
                                        </li>
                                        <li>
                                            <strong
                                                class="{{ $feedback->emotional > 70 ? 'text-danger' : ($feedback->emotional == 50 ? 'text-warning' : '') }}">
                                                Emotional Dysregulation:
                                            </strong>
                                            {{ $feedback->emotional }}
                                        </li>
                                        <li>
                                            <strong
                                                class="{{ $feedback->social > 70 ? 'text-danger' : ($feedback->social == 50 ? 'text-warning' : '') }}">
                                                Social Withdrawal:
                                            </strong>
                                            {{ $feedback->social }}
                                        </li>
                                        <li>
                                            <strong
                                                class="{{ $feedback->fatigue > 70 ? 'text-danger' : ($feedback->fatigue == 50 ? 'text-warning' : '') }}">
                                                Fatigue:
                                            </strong>
                                            {{ $feedback->fatigue }}
                                        </li>
                                        <li>
                                            <strong
                                                class="{{ $feedback->concentrating > 70 ? 'text-danger' : ($feedback->concentrating == 50 ? 'text-warning' : '') }}">
                                                Difficulty Concentrating:
                                            </strong>
                                            {{ $feedback->concentrating }}
                                        </li>
                                        <li>
                                            <strong
                                                class="{{ $feedback->sleep > 70 ? 'text-danger' : ($feedback->sleep == 50 ? 'text-warning' : '') }}">
                                                Sleep Disturbances:
                                            </strong>
                                            {{ $feedback->sleep }}
                                        </li>
                                        <li>
                                            <strong
                                                class="{{ $feedback->esteem > 70 ? 'text-danger' : ($feedback->esteem == 50 ? 'text-warning' : '') }}">
                                                Low Self-Esteem:
                                            </strong>
                                            {{ $feedback->esteem }}
                                        </li>
                                        <li>
                                            <strong
                                                class="{{ $feedback->panic > 70 ? 'text-danger' : ($feedback->panic == 50 ? 'text-warning' : '') }}">
                                                Panic Attacks:
                                            </strong>
                                            {{ $feedback->panic }}
                                        </li>
                                        <li><strong>Query:</strong> {{ $feedback->message }}</li>

                                        @if (empty($feedback->symptoms) && empty($feedback->suggestions) && empty($feedback->note))
                                            <!-- Red colored message when there are no responses -->
                                            <li><strong class="text-danger">Response:</strong> Doctor will give you a
                                                response soon.</li>
                                        @else
                                            @if (!empty($feedback->symptoms))
                                                <li><strong>Symptoms:</strong> {{ $feedback->symptoms }}</li>
                                            @endif
                                            @if (!empty($feedback->suggestions))
                                                <li><strong>Doctor's Suggestions:</strong> {{ $feedback->suggestions }}
                                                </li>
                                            @endif
                                            @if (!empty($feedback->note))
                                                <li><strong>Note:</strong> {{ $feedback->note }}</li>
                                            @endif
                                        @endif

                                        <li><strong>Submitted:</strong> {{ $feedback->created_at->format('F d, Y') }}
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <br>
                            <button class="theme-btn-1 btn btn-effect-1" onclick="printReport(this)">Print</button>
                        </div>
                        <!-- Feedback card end -->
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

@include('layouts.footer')

<script>
    function printReport() {
    // Get the content of the report section
    var printContent = document.querySelector('.card-body').innerHTML;

    // Add the "Printed on" text
    var currentDate = new Date();
    var dateText =
        "<p style='text-align: center; font-weight: bold; color: blue;'>Doctor Prescription Report By MindQuilo Printed on " +
        currentDate.toLocaleDateString() + "</p>";

    // Add the site logo
    var logoHtml = `
        <div style="display: flex; align-items: center; margin-bottom: 20px;">
            <img src="view/img/logo.png" alt="MindQuilo Logo" style="height: 50px; margin-right: 20px;">
            <h2 style="margin: 0; font-family: Arial, sans-serif;">MindQuilo</h2>
        </div>
    `;

    // Combine the logo, date text, and report content
    var printContents = logoHtml + dateText + printContent;

    // Save the original body content
    var originalContent = document.body.innerHTML;

    // Replace the body content with the row content to print
    document.body.innerHTML = printContents;
    window.print(); // Trigger the print dialog

    // Restore the original content after printing
    document.body.innerHTML = originalContent;
}

</script>
