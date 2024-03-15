@extends('layouts.app')

@section('content')

@include('layouts.header')

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
                <p><i class="fa fa-check text-danger me-3"></i>The ultimate resource for both job seekers and employers</p>
                <p><i class="fa fa-check text-danger me-3"></i>Seamless recruitment experience</p>
                <p><i class="fa fa-check text-danger me-3"></i>A high-performing team</p>
                <a class="btn btn-danger py-3 px-5 mt-3" href="{{ url('/about') }}">Read More</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

@endsection
