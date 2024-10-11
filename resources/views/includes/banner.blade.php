{{-- <section class="sub-bnr" style="background:url('{{asset('frontend/images/bg/sub-bnr-bg-2.jpg')}}') no-repeat"
    data-stellar-background-ratio="0.5">
    <div class="position-center-center">
        <div class="container">
            <h1>{{$programName}}</h1>
            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">{{$programName}}</li>
            </ol>
        </div>
    </div>
</section> --}}

<section id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto text-center">
                <div class="page-title-content">
                    <h1 class="h2">{{$title}}</h1>
                    <p>{{$details}}</p>
                    <a href="#" class="btn btn-brand smooth-scroll">Let's See</a>
                </div>
            </div>
        </div>
    </div>
</section>
@include('includes.message')
