@extends('layouts.app_profile')

@section('content')
        <div class="content-wrapper">
            <div class="content-wrapper-header">
                <div class="content-wrapper-context">
                    <h3 class="img-content">
                        <div class="profile-img">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="" style="padding-left: 10%">
                            {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                        </div>
                    </h3>
                    <div class="content-text">Grab yourself jobs internationally and open up to oppotunities,
                        that will help you get to the next level in your life.</div>
                    <div class="pt-4 text-light">
                        <a href="{{ route('profile.edit', Auth::user()->id) }}" class="content-button">Edit Profile</a>
                    </div>
                </div>
                <img class="content-wrapper-img" src="https://assets.codepen.io/3364143/glass.png" alt="">
            </div>
            <div class="content-section">
                <div class="content-section-title">Jobs</div>
                <ul>
                    @if ($jobs->count() > 0)
                        @foreach ($jobs as $data)
                            <li class="adobe-product">
                                <div class="products">
                                    <div class="px-2">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                    {{ $data['job_title'] }}
                                </div>
                                <span class="status">
                                    <span class="status-circle green"></span>
                                    progress</span>
                                <div class="button-wrapper">
                                    <button class="content-button status-button open">More</button>
                                    <div class="menu">
                                        <button class="dropdown-profile">
                                            <ul>
                                                <li><a href="#">delete</a></li>
                                            </ul>
                                        </button>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @else
                        <li>
                            <p>all your applications will be visible here</p>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="content-section">
                <div class="content-section-title">Related Jobs</div>
                <div class="apps-card">
                    <div class="app-card">
                        <span>
                            <i class="fas fa-graduation-cap p-2"></i>
                            Current Job
                        </span>
                        <div class="app-card__subtext">Edit, master and create fully proffesional videos</div>
                        <div class="app-card-buttons">
                            <button class="content-button status-button">Update</button>
                            <div class="menu"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
