@extends('layouts.app')

@section('content')

@include('layouts.header')

<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Contact For Any Query</h1>
        <div class="row g-4">
            <div class="col-12">
                <div class="row gy-4">
                    <div class="col-md-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="d-flex align-items-center bg-light rounded p-4">
                            <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                <i class="fa fa-map-marker-alt text-danger"></i>
                            </div>
                            <span>Westcom Point, Nairobi, Kenya</span>
                        </div>
                    </div>
                    <div class="col-md-4 wow fadeIn" data-wow-delay="0.3s">
                        <div class="d-flex align-items-center bg-light rounded p-4">
                            <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                <i class="fa fa-envelope-open text-danger"></i>
                            </div>
                            <span>mihai@multiworkforceafrica.com</span>
                        </div>
                    </div>
                    <div class="col-md-4 wow fadeIn" data-wow-delay="0.5s">
                        <div class="d-flex align-items-center bg-light rounded p-4">
                            <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                <i class="fa fa-phone-alt text-danger"></i>
                            </div>
                            <span>+254 748 280 321</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <iframe class="position-relative rounded w-100 h-100"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3988.8512358255716!2d36.784872!3d-1.261543!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f176181a8ef2b%3A0x74a8f71af09b3253!2sWestcom%20Point!5e0!3m2!1sen!2ske!4v1709508974504!5m2!1sen!2ske"
                    frameborder="0" style="min-height: 400px; border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
            </div>
            <div class="col-md-6">
                <div class="wow fadeInUp" data-wow-delay="0.5s">
                    <p class="mb-4">WE WANT TO HEAR FROM YOU!</a>.</p>
                    <p class="mb-4"><a href="https://wa.me/40721472821">You Can Also Message Us On Whatsapp</a>.</p>
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-danger w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

@endsection