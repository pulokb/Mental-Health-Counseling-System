@include('layouts.header')

<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image" data-bs-bg="view/img/bg/14.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">My Feedback</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="{{ route('profilev') }}"><span class="ltn__secondary-color"><i
                                            class="fas fa-home"></i></span> {{ Auth::user()->name }}</a></li>

                            <li>My Feedback</li>
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
            <h3>{{ Auth::user()->name }}'s Queries and Responses</h3>

            @if ($feedbacks->isEmpty())
                <p>You have not submitted any feedback yet.</p>
            @else
                @foreach ($feedbacks as $feedback)
                    <div class="col-lg-4 col-sm-6 col-12 mb-4">
                        <!-- Feedback card start -->
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h6 class="card-title">{{ Auth::user()->name }}'s
                                    {{ $feedback->created_at->format('F d, Y') }} Report</h6>
                                {{-- <h5 class="card-title">Overall Generated Score: {{ $feedback->totalScore }}</h5> --}}

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
                                            class="{{ $feedback->depression > 66 ? 'text-danger' : ($feedback->depression == 66 ? 'text-warning' : '') }}">
                                            Depression:
                                        </strong>
                                        {{ $feedback->depression }}
                                    </li>
                                    <li>
                                        <strong
                                            class="{{ $feedback->anxiety > 66 ? 'text-danger' : ($feedback->anxiety == 66 ? 'text-warning' : '') }}">
                                            Anxiety:
                                        </strong>
                                        {{ $feedback->anxiety }}
                                    </li>
                                    <li>
                                        <strong
                                            class="{{ $feedback->irritability > 66 ? 'text-danger' : ($feedback->irritability == 66 ? 'text-warning' : '') }}">
                                            Irritability:
                                        </strong>
                                        {{ $feedback->irritability }}
                                    </li>
                                    <li>
                                        <strong
                                            class="{{ $feedback->emotional > 66 ? 'text-danger' : ($feedback->emotional == 66 ? 'text-warning' : '') }}">
                                            Emotional Dysregulation:
                                        </strong>
                                        {{ $feedback->emotional }}
                                    </li>
                                    <li>
                                        <strong
                                            class="{{ $feedback->social > 66 ? 'text-danger' : ($feedback->social == 66 ? 'text-warning' : '') }}">
                                            Social Withdrawal:
                                        </strong>
                                        {{ $feedback->social }}
                                    </li>
                                    <li>
                                        <strong
                                            class="{{ $feedback->fatigue > 66 ? 'text-danger' : ($feedback->fatigue == 66 ? 'text-warning' : '') }}">
                                            Fatigue:
                                        </strong>
                                        {{ $feedback->fatigue }}
                                    </li>
                                    <li>
                                        <strong
                                            class="{{ $feedback->concentrating > 66 ? 'text-danger' : ($feedback->concentrating == 66 ? 'text-warning' : '') }}">
                                            Difficulty Concentrating:
                                        </strong>
                                        {{ $feedback->concentrating }}
                                    </li>
                                    <li>
                                        <strong
                                            class="{{ $feedback->sleep > 66 ? 'text-danger' : ($feedback->sleep == 66 ? 'text-warning' : '') }}">
                                            Sleep Disturbances:
                                        </strong>
                                        {{ $feedback->sleep }}
                                    </li>
                                    <li>
                                        <strong
                                            class="{{ $feedback->esteem > 66 ? 'text-danger' : ($feedback->esteem == 66 ? 'text-warning' : '') }}">
                                            Low Self-Esteem:
                                        </strong>
                                        {{ $feedback->esteem }}
                                    </li>
                                    <li>
                                        <strong
                                            class="{{ $feedback->panic > 66 ? 'text-danger' : ($feedback->panic == 66 ? 'text-warning' : '') }}">
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

                                    <li><strong>Submitted:</strong> {{ $feedback->created_at->format('F d, Y') }}</li>
                                </ul>


                            </div>
                        </div>
                        <!-- Feedback card end -->
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>


@include('layouts.footer')
