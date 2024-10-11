@include('layouts.header')

<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image " data-bs-bg="{{ asset('view/img/bg/14.png') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">symptom</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="{{ route('index') }}"><span class="ltn__secondary-color"><i
                                            class="fas fa-home"></i></span> Home</a></li>
                            <li>symptom</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- BLOG AREA START -->
<div class="ltn__blog-area ltn__blog-item-3-normal mb-100">
    <div class="container">
        <div class="row">
            @foreach ($symptoms as $symptom)
                <!-- Blog Item -->
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="ltn__blog-item ltn__blog-item-3">
                        <div class="ltn__blog-img">
                            <a href="{{ route('symptom.details', $symptom->id) }}"><img
                                    src="{{ asset('images/'.$symptom->image) }}" alt="#"></a>
                        </div>
                        <div class="ltn__blog-brief">
                            <div class="ltn__blog-meta">
                            </div>
                            <h3 class="ltn__blog-title"><a
                                    href="{{ route('symptom.details', $symptom->id) }}">{{ $symptom->title }}</a>
                            </h3>
                            <div class="ltn__blog-meta-btn">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-date"><i
                                                class="far fa-calendar-alt"></i>{{ $symptom->created_at->format('F d, Y') }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="ltn__blog-btn">
                                    <a href="{{ route('symptom.details', $symptom->id) }}">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Blog Item -->
            @endforeach
        </div>
    </div>
</div>
<!-- BLOG AREA END -->
@include('layouts.footer')
