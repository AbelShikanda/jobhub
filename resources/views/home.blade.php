@extends('layouts.app')

@section('content')
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
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="row g-0 about-bg rounded overflow-hidden">
                        <div class="col-6 text-start">
                            <img class="img-fluid w-100" src="img/about-1.jpg">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid" src="img/about-2.jpg" style="width: 85%; margin-top: 15%;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid" src="img/about-3.jpg" style="width: 85%;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid w-100" src="img/about-4.jpg">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">Get The Best Jobs And Find Talent</h1>
                    <p class="mb-4">Connect to job seekers with potential employers,
                        and find qualified candidates. You can explore job opportunities,
                        create profiles, and apply for positions that match your skills and experience.</p>
                    <p><i class="fa fa-check text-danger me-3"></i>The ultimate resource for both job seekers and employers
                    </p>
                    <p><i class="fa fa-check text-danger me-3"></i>Seamless recruitment experience</p>
                    <p><i class="fa fa-check text-danger me-3"></i>A high-performing team</p>
                    <a class="btn btn-danger py-3 px-5 mt-3" href="{{ url('/about') }}">Read More</a>
                </div>
            </div>
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
                        <form action="{{ route('addJobs') }}" method="POST">
                            @csrf
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-1.jpg"
                                            alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <input type="text" name="jobz[]" value="{{ $data['id'] }}" hidden>
                                            @auth
                                                <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                                            @else
                                            <input type="text" name="user_id" value="" hidden>
                                            @endauth
                                            <h5 class="mb-3">{{ $data['job_title'] }}</h5>
                                            <span class="text-truncate me-3"><i
                                                    class="fa fa-map-marker-alt text-danger me-2"></i>{{ $data['org_name'] }}</span>
                                            <span class="text-truncate me-3"><i
                                                    class="far fa-clock text-danger me-2"></i>{{ $data['category_name'] }}</span>
                                            <span class="text-truncate me-0"><i
                                                    class="far fa-money-bill-alt text-danger me-2"></i>Ksh
                                                {{ $data['salary_range'] }}</span>
                                        </div>
                                    </div>
                                    <div
                                        class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            <button class="btn btn-success" type="submit">Apply Now</button>
                                        </div>
                                        <small class="text-truncate"><i
                                                class="far fa-calendar-alt text-danger me-2"></i>Deadline
                                            for application
                                            {{ $data['deadline_date'] }}</small>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Jobs End -->

    <!-- Search Start -->
    <div class="container-fluid bg-dark mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container">
            <div class="row g-2">
                <div class="col-md-12">
                    <h3 class="text-center display- text-white animated slideInDown mb-4">SUBSCRIBE FOR DETAILS</h3>
                    <p class="text-center fs-5 fw-medium text-white mb-4 pb-2">Sign up to hear from us about how can we
                        help
                        you.</p>
                    <div class="justify-content-end row g-2">
                        <div class="col-md-6 animated slideInLeft">
                            <input type="text" class="form-control border-0" placeholder="Email Address" />
                        </div>
                        <div class="col-md-4">
                            <a href="" class="btn btn-secondary py-md-2 px-md-5 animated slideInRight">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search End -->

@endsection
