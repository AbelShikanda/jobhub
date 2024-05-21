@extends('layouts.app')

@section('content')
    @include('layouts.header')


    @if (count($errors) > 0)
        <div class="alert alert-danger col-md-12">
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
                                <div class="dropdown-button-category" onclick="toggleDropdown()">
                                    <span class="dropdown-text">Categories</span>
                                    <span class="dropdown-chevron"></span>
                                </div>
                                <div class="dropdown-menu-category">
                                    @foreach ($categories as $c)
                                        <a href="{{ route('jobsCategory', $c['id']) }}">{{ $c['name'] }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div> <!--class continer-->
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
                                        @auth
                                            <input type="text" name="jobz[]" value="{{ $data['id'] }}" hidden>
                                            <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                                        @else
                                            <input type="text" name="user_id" value="00000000" hidden>
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
            <div class="row justify-content-center">
                {{ $organizations->links() }}
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- Jobs End -->
@endsection
