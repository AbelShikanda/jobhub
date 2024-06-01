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
                <h4>ABOUT US</h4>
                <p class="mb-4">With over 24 years of experience in providing our clients with the best services, Multi WorkForce has built a reputation for excellence in recruitment. Our team of recruiters has a deep understanding of the job market and can help candidates navigate the hiring process with confidence.</p>
                <h4>OUR VISION</h4>
                <p class="mb-4">We aim to provide job opportunities in Romania, Italy, and other European countries to create a diverse and talented workforce. By tapping into a pool of skilled professionals from various backgrounds, the company aims to drive innovation and excellence in its operations across Europe </p>
                <h4>ONBOARDING</h4>
                <p class="mb-4">As part of our ongoing efforts to expand our workforce and bring diverse talent into our company, we will  be onboarding foreign workers and proactively addressing cultural differences and fostering an inclusive environment. It's crucial for us to ensure a smooth transition for these individuals as they integrate into our local society and workplace culture. </p>
                <p><i class="fa fa-check text-danger me-3"></i>The ultimate resource for both job seekers and employers</p>
                <p><i class="fa fa-check text-danger me-3"></i>Seamless recruitment experience</p>
                <p><i class="fa fa-check text-danger me-3"></i>A high-performing team</p>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

@endsection
