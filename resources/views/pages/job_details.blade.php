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

    <!-- Job Detail Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gy-5 gx-4">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center mb-5">
                        @if ($job->organizations->isNotEmpty())
                            @foreach ($job->organizations as $organization)
                                @foreach ($organization->images as $img)
                                    <img class="flex-shrink-0 img-fluid border rounded"
                                        src="{{ asset('storage/img/pictures/' . $img->image_path) }}" alt=""
                                        style="width: 80px; height: 80px;">
                                @endforeach
                            @endforeach
                        @else
                            No organizations found.
                        @endif
                        <div class="text-start ps-4">
                            <h3 class="mb-3">{{ $job->job_title }}</h3>
                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>
                                @if ($job->organizations->isNotEmpty())
                                    @foreach ($job->organizations as $organization)
                                        {{ $organization->Country }}
                                    @endforeach
                                @else
                                    No organizations found.
                                @endif
                            </span>
                            <span class="text-truncate me-0"><i
                                    class="far fa-money-bill-alt text-primary me-2"></i>{{ $job->salary_range }}</span>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h4 class="mb-3">Job description</h4>
                        <p>{{ $job->description }}</p>
                        <h4 class="mb-3">Responsibility</h4>
                        <p>{{ $job->responsibilities }}</p>
                        {{-- <ul class="list-unstyled">
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Dolor justo tempor duo ipsum accusam</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Elitr stet dolor vero clita labore gubergren</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Rebum vero dolores dolores elitr</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Est voluptua et sanctus at sanctus erat</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Diam diam stet erat no est est</li>
                    </ul> --}}
                        <h4 class="mb-3">Qualifications</h4>
                        <p>{{ $job->requirements }}</p>
                        {{-- <ul class="list-unstyled">
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Dolor justo tempor duo ipsum accusam</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Elitr stet dolor vero clita labore gubergren</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Rebum vero dolores dolores elitr</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Est voluptua et sanctus at sanctus erat</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Diam diam stet erat no est est</li>
                    </ul> --}}
                    </div>

                    <div class="">
                        <h4 class="mb-4">Apply For The Job</h4>
                        <form action="{{ route('addJobs') }}" method="POST">
                            @csrf
                            <div class="col-sm-12 col-md-4 d-flex flex-column">
                                @auth
                                    <input type="text" name="jobz[]" value="{{ $job->id }}" hidden>
                                    <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                                @else
                                    <input type="text" name="user_id" value="00000000" hidden>
                                @endauth
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                        <button class="btn btn-success px-5" type="submit">Apply</button>
                                    </div>
                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-danger me-2"></i>Deadline
                                    for application
                                    {{ $job->deadline_date }}</small>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Job Summery</h4>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Published On: {{ $job->created_at }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: Ksh {{ $job->salary_range }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>
                            @if ($job->organizations->isNotEmpty())
                                @foreach ($job->organizations as $organization)
                                    {{ $organization->Country }}
                                @endforeach
                            @else
                                No organizations found.
                            @endif
                        </p>
                        <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>Date Line:
                            {{ $job->deadline_date }}</p>
                    </div>
                    <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Company Name</h4>
                        <p class="m-0">
                            @if ($job->organizations->isNotEmpty())
                                @foreach ($job->organizations as $organization)
                                    {{ $organization->Org_Name }}
                                @endforeach
                            @else
                                No organizations found.
                            @endif
                        </p>
                        <h4 class="mb-4 mt-4">Company Detail</h4>
                        <p class="m-0">
                            @if ($job->organizations->isNotEmpty())
                                @foreach ($job->organizations as $organization)
                                    {{ $organization->Description }}
                                @endforeach
                            @else
                                No organizations found.
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Job Detail End -->
@endsection
