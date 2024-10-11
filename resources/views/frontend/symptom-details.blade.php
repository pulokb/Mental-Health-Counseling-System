@include('layouts.header')

<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image " data-bs-bg="{{ asset('view/img/bg/14.png') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">{{ $symptom->title }}</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="{{ route('symptoms') }}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Symptom</a></li>
                            <li>{{ $symptom->title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- SYMPTOM DETAILS AREA START -->
<div class="ltn__blog-area ltn__blog-item-3-normal mb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__blog-item ltn__blog-item-3">
                    <div class="ltn__blog-img">
                        <img src="{{ asset('images/'.$symptom->image) }}" alt="{{ $symptom->title }}">
                    </div>
                    <div class="ltn__blog-brief">
                        <h3>{{ $symptom->title }}</h3>
                        <p>{{ $symptom->details }}</p>
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i> {{ $symptom->created_at->format('F d, Y') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- SYMPTOM DETAILS AREA END -->

<!-- LATEST SYMPTOMS AREA START -->
<div class="ltn__latest-symptoms-area mb-100">
    <div class="container">
        <div class="section-title-area ltn__section-title-2--- text-center">
            <h1 class="section-title">Latest Symptom</h1>
        </div>
        <div class="row">
            @foreach ($latestSymptoms as $latestSymptom)
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="ltn__blog-item ltn__blog-item-3">
                        <div class="ltn__blog-img">
                            <a href="{{ route('symptom.details', $latestSymptom->id) }}">
                                <img src="{{ asset('images/'.$latestSymptom->image) }}" alt="{{ $latestSymptom->title }}">
                            </a>
                        </div>
                        <div class="ltn__blog-brief">
                            <h3 class="ltn__blog-title">
                                <a href="{{ route('symptom.details', $latestSymptom->id) }}">{{ $latestSymptom->title }}</a>
                            </h3>
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i> {{ $latestSymptom->created_at->format('F d, Y') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- LATEST SYMPTOMS AREA END -->

@include('layouts.footer')
