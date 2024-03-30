@extends('layouts.app')

@section('content')
    @include('layouts.header')

    <!-- Jobs Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                <!-- place the category or filter button here -->

                <section class="section section-small col-xs-12">
                    <div class="row">
                        <div class="col-4">
                            <label>
                                <h5>Job Category</h5>
                            </label>
                        </div>
                        <div class="col-8">
                            <div class="dropdown-container">
                                <div class="dropdown-button" onclick="toggleDropdown()">
                                    <span class="dropdown-text">Category</span>
                                    <span class="dropdown-chevron"></span>
                                </div>
                                <div class="dropdown-menu">
                                    @foreach ($categories as $c)
                                        <a
                                            href="{{ route('jobsCategory', $c['id']) }}">{{ $c['name'] }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div> <!--class continer-->
            <div class="tab-content">
                @foreach ($jobs as $data)
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid border rounded" src="../img/com-logo-1.jpg" alt=""
                                    style="width: 80px; height: 80px;">
                                <div class="text-start ps-4">
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
                                    <a class="btn btn-success" href="">Apply Now</a>
                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-danger me-2"></i>Deadline
                                    for application
                                    {{ $data['deadline_date'] }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                {{ $jobs->links() }}
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- Jobs End -->
@endsection
