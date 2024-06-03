@extends('layouts.app')

@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger col-md-8 offset-md-3">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="pt-3">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
    </div>
    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('img/carousel-1.png') }}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(43, 57, 64, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-3 text-white animated slideInDown mb-4">Recruitment Service from Africa,
                                    Asia</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">If you are looking to recruit long-term
                                    stable workers eager to help you scale up your business, Multi Workforce is the answer
                                    for you, with over 10 years of experience in Germany and Romania we can find the best
                                    solutions for you.</p>
                                <div class="row">
                                    <div class="col">
                                        <a href="{{ route('jobs') }}" class="custom-button">See Latest Jobs</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('img/carousel-2.png') }}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(43, 57, 64, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-3 text-white animated slideInDown mb-4">We are ready to grow together
                                </h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">We consult big companies to help them build a
                                    functional team ready to grow together.</p>
                                <div class="row">
                                    <div class="col">
                                        <a href="{{ route('jobs') }}" class="custom-button">See Latest Jobs</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            @include('pages.partials.about-card')
        </div>
    </div>
    <!-- About End -->

    <!-- Jobs Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                <div class="tab-content">
                    @foreach ($organizations as $data)
                        @include('pages.partials.form-card')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Jobs End -->

    <!-- Search Start -->
    <div class="container-fluid bg-dark mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container">
            <form action="{{ route('emailSignup') }}" method="post">
                @csrf
                <div class="row g-2">
                    <div class="col-md-12">
                        <h3 class="text-center display- text-white animated slideInDown mb-4">SUBSCRIBE FOR DETAILS</h3>
                        <p class="text-center fs-5 fw-medium text-white mb-4 pb-2">Sign up to hear from us about how can we
                            help
                            you.</p>
                        <div class="justify-content-end row g-2">
                            <div class="col-md-6 animated slideInLeft">
                                <input type="text" class="form-control border-0" placeholder="Email Address"
                                    name="email" />
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-secondary py-md-2 px-md-5 animated slideInRight">Sign
                                    Up</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Search End -->
@endsection
