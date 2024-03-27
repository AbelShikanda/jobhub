@extends('layouts.app')

@section('content')
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
                                <h1 class="display-3 text-white animated slideInDown mb-4">Recruitment Service from Africa, Asia</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">If you are looking to recruit long-term stable workers eager to help you scale up your business, Multi Workforce is the answer for you, with over 10 years of experience in Germany and Romania we can find the best solutions for you.</p>
                                
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
                                <h1 class="display-3 text-white animated slideInDown mb-4">We are ready to grow together</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">We consult big companies to help them build a functional team ready to grow together.</p>
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


    <!-- Jobs Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill"
                            href="#tab-1">
                            <h6 class="mt-n1 mb-0">Featured</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                            <h6 class="mt-n1 mb-0">Full Time</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill"
                            href="#tab-3">
                            <h6 class="mt-n1 mb-0">Part Time</h6>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-1.jpg"
                                        alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Software Engineer</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-danger me-2"></i>New
                                            York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-danger me-2"></i>Full
                                            Time</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-danger me-2"></i>$123
                                            - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-danger"></i></a>
                                        <a class="btn btn-success" href="">Apply Now</a>
                                    </div>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-danger me-2"></i>Date
                                        Line: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-2.jpg"
                                        alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Marketing Manager</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-danger me-2"></i>New
                                            York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-danger me-2"></i>Full
                                            Time</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-danger me-2"></i>$123
                                            - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-danger"></i></a>
                                        <a class="btn btn-success" href="">Apply Now</a>
                                    </div>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-danger me-2"></i>Date
                                        Line: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-3.jpg"
                                        alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Product Designer</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-danger me-2"></i>New
                                            York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-danger me-2"></i>Full
                                            Time</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-danger me-2"></i>$123
                                            - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-danger"></i></a>
                                        <a class="btn btn-success" href="">Apply Now</a>
                                    </div>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-danger me-2"></i>Date
                                        Line: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-4.jpg"
                                        alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Creative Director</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-danger me-2"></i>New
                                            York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-danger me-2"></i>Full
                                            Time</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-danger me-2"></i>$123
                                            - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-danger"></i></a>
                                        <a class="btn btn-success" href="">Apply Now</a>
                                    </div>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-danger me-2"></i>Date
                                        Line: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-5.jpg"
                                        alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Wordpress Developer</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-danger me-2"></i>New
                                            York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-danger me-2"></i>Full
                                            Time</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-danger me-2"></i>$123
                                            - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-danger"></i></a>
                                        <a class="btn btn-success" href="">Apply Now</a>
                                    </div>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-danger me-2"></i>Date
                                        Line: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-danger py-3 px-5" href="">Browse More Jobs</a>
                    </div>
                    <div id="tab-2" class="tab-pane fade show p-0">
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-1.jpg"
                                        alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Software Engineer</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-danger me-2"></i>New
                                            York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-danger me-2"></i>Full
                                            Time</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-danger me-2"></i>$123
                                            - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-danger"></i></a>
                                        <a class="btn btn-success" href="">Apply Now</a>
                                    </div>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-danger me-2"></i>Date
                                        Line: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-2.jpg"
                                        alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Marketing Manager</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-danger me-2"></i>New
                                            York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-danger me-2"></i>Full
                                            Time</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-danger me-2"></i>$123
                                            - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-danger"></i></a>
                                        <a class="btn btn-success" href="">Apply Now</a>
                                    </div>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-danger me-2"></i>Date
                                        Line: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-3.jpg"
                                        alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Product Designer</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-danger me-2"></i>New
                                            York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-danger me-2"></i>Full
                                            Time</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-danger me-2"></i>$123
                                            - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-danger"></i></a>
                                        <a class="btn btn-success" href="">Apply Now</a>
                                    </div>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-danger me-2"></i>Date
                                        Line: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-4.jpg"
                                        alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Creative Director</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-danger me-2"></i>New
                                            York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-danger me-2"></i>Full
                                            Time</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-danger me-2"></i>$123
                                            - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-danger"></i></a>
                                        <a class="btn btn-success" href="">Apply Now</a>
                                    </div>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-danger me-2"></i>Date
                                        Line: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-5.jpg"
                                        alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Wordpress Developer</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-danger me-2"></i>New
                                            York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-danger me-2"></i>Full
                                            Time</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-danger me-2"></i>$123
                                            - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-danger"></i></a>
                                        <a class="btn btn-success" href="">Apply Now</a>
                                    </div>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-danger me-2"></i>Date
                                        Line: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-danger py-3 px-5" href="">Browse More Jobs</a>
                    </div>
                    <div id="tab-3" class="tab-pane fade show p-0">
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-1.jpg"
                                        alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Software Engineer</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-danger me-2"></i>New
                                            York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-danger me-2"></i>Full
                                            Time</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-danger me-2"></i>$123
                                            - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-danger"></i></a>
                                        <a class="btn btn-success" href="">Apply Now</a>
                                    </div>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-danger me-2"></i>Date
                                        Line: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-2.jpg"
                                        alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Marketing Manager</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-danger me-2"></i>New
                                            York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-danger me-2"></i>Full
                                            Time</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-danger me-2"></i>$123
                                            - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-danger"></i></a>
                                        <a class="btn btn-success" href="">Apply Now</a>
                                    </div>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-danger me-2"></i>Date
                                        Line: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-3.jpg"
                                        alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Product Designer</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-danger me-2"></i>New
                                            York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-danger me-2"></i>Full
                                            Time</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-danger me-2"></i>$123
                                            - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-danger"></i></a>
                                        <a class="btn btn-success" href="">Apply Now</a>
                                    </div>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-danger me-2"></i>Date
                                        Line: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-4.jpg"
                                        alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Creative Director</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-danger me-2"></i>New
                                            York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-danger me-2"></i>Full
                                            Time</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-danger me-2"></i>$123
                                            - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-danger"></i></a>
                                        <a class="btn btn-success" href="">Apply Now</a>
                                    </div>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-danger me-2"></i>Date
                                        Line: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-5.jpg"
                                        alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Wordpress Developer</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-danger me-2"></i>New
                                            York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-danger me-2"></i>Full
                                            Time</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-danger me-2"></i>$123
                                            - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-danger"></i></a>
                                        <a class="btn btn-success" href="">Apply Now</a>
                                    </div>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-danger me-2"></i>Date
                                        Line: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-success py-3 px-5" href="">Browse More Jobs</a>
                    </div>
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
                    <p class="text-center fs-5 fw-medium text-white mb-4 pb-2">Sign up to hear from us about how can we help you.</p>
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

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-success btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
@endsection
