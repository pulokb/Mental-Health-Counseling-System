@include('layouts.header')

<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image " data-bs-bg="{{ asset('view/img/bg/14.png') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">{{ $suggestion->title }}</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="{{ route('suggestions') }}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Suggestion</a></li>
                            <li>{{ $suggestion->title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- SUGGESTION DETAILS AREA START -->
<div class="ltn__blog-area ltn__blog-item-3-normal mb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__blog-item ltn__blog-item-3">
                    <div class="ltn__blog-img">
                        <img src="{{ asset('images/'.$suggestion->image) }}" alt="{{ $suggestion->title }}">
                    </div>
                    <div class="ltn__blog-brief">
                        <h3>{{ $suggestion->title }}</h3>
                        <p>{{ $suggestion->details }}</p>
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i> {{ $suggestion->created_at->format('F d, Y') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- SUGGESTION DETAILS AREA END -->

<!-- LATEST SUGGESTIONS AREA START -->
<div class="ltn__latest-suggestions-area mb-100">
    <div class="container">
        <div class="section-title-area ltn__section-title-2--- text-center">
            <h1 class="section-title">Latest Suggestion</h1>
        </div>
        <div class="row">
            @foreach ($latestSuggestions as $latestSuggestion)
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="ltn__blog-item ltn__blog-item-3">
                        <div class="ltn__blog-img">
                            <a href="{{ route('suggestion.details', $latestSuggestion->id) }}">
                                <img src="{{ asset('images/'.$latestSuggestion->image) }}" alt="{{ $latestSuggestion->title }}">
                            </a>
                        </div>
                        <div class="ltn__blog-brief">
                            <h3 class="ltn__blog-title">
                                <a href="{{ route('suggestion.details', $latestSuggestion->id) }}">{{ $latestSuggestion->title }}</a>
                            </h3>
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i> {{ $latestSuggestion->created_at->format('F d, Y') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- LATEST SUGGESTIONS AREA END -->

@include('layouts.footer')
