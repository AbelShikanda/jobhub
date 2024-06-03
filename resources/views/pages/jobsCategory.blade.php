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
                                <h5>Job Category: ({{ $category->name }}) </h5>
                            </label>
                        </div>
                        <div class="col-8">
                            <div class="dropdown-container">
                                <div class="dropdown-button-category" onclick="toggleDropdown()">
                                    <span class="dropdown-text">Category</span>
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
                @foreach ($jobs as $data)
                    @include('pages.partials.form-card')
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
