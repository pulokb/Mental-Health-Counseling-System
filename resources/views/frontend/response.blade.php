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
                            <li><a href="{{ route('profilev') }}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> {{ Auth::user()->name }}</a></li>

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

            @if($feedbacks->isEmpty())
                <p>You have not submitted any feedback yet.</p>
            @else
                @foreach ($feedbacks as $feedback)
                    <div class="col-lg-4 col-sm-6 col-12 mb-4">
                        <!-- Feedback card start -->
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h6 class="card-title">{{ Auth::user()->name }}'s {{ $feedback->created_at->format('F d, Y') }} Report</h6>
                                <h5 class="card-title">Overall Generated Score: {{ $feedback->overall_result }}</h5>

                                <!-- Status with color based on value -->
                                <h5 class="card-title">
                                    Status:
                                    <span class="
                                        @if(strtolower($feedback->status) === 'weak') text-danger
                                        @elseif(strtolower($feedback->status) === 'moderate') text-warning
                                        @elseif(strtolower($feedback->status) === 'good') text-success
                                        @endif">
                                        {{ ucfirst($feedback->status) }}
                                    </span>
                                </h5>

                                <ul class="list-unstyled">
                                    <li><strong>Educational:</strong> {{ $feedback->educational }}</li>
                                    <li><strong>Family:</strong> {{ $feedback->family }}</li>
                                    <li><strong>Relationship:</strong> {{ $feedback->relationship }}</li>
                                    <li><strong>Job:</strong> {{ $feedback->job }}</li>
                                    <li><strong>General:</strong> {{ $feedback->general }}</li>
                                    <li><strong>Query:</strong> {{ $feedback->message }}</li>

                                    @if(empty($feedback->symptoms) && empty($feedback->suggestions) && empty($feedback->note))
                                        <!-- Red colored message when there are no responses -->
                                        <li><strong class="text-danger">Response:</strong> Doctor will give you a response soon.</li>
                                    @else
                                        @if(!empty($feedback->symptoms))
                                            <li><strong>Symptoms:</strong> {{ $feedback->symptoms }}</li>
                                        @endif
                                        @if(!empty($feedback->suggestions))
                                            <li><strong>Doctor's Suggestions:</strong> {{ $feedback->suggestions }}</li>
                                        @endif
                                        @if(!empty($feedback->note))
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
