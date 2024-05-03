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
                    <a class="content-button">Edit Profile</a>
                </div>
            </div>
            <img class="content-wrapper-img" src="https://assets.codepen.io/3364143/glass.png" alt="">
        </div>

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

        <div class="content-section">
            <div class="content-section-title">Apps in your plan</div>
            <div class="apps-card">
                <div class="app-card">
                    <span>
                        <i class="fas fa-graduation-cap p-2"></i>
                        Current Available jobs
                    </span>
                    <div class="app-card__subtext">Edit, master and create fully proffesional videos</div>
                    <div class="app-card-buttons">
                        <button class="content-button status-button">Update</button>
                        <div class="menu"></div>
                    </div>
                </div>
                <div class="app-card">
                    <span>
                        <i class="fas fa-graduation-cap p-2"></i>
                        Current Available jobs
                    </span>
                    <div class="app-card__subtext">Design and publish great projects & mockups</div>
                    <div class="app-card-buttons">
                        <button class="content-button status-button">Update</button>
                        <div class="menu"></div>
                    </div>
                </div>
                <div class="app-card">
                    <span>
                        <i class="fas fa-graduation-cap p-2"></i>
                        Current Available jobs
                    </span>
                    <div class="app-card__subtext">Industry Standart motion graphics & visual effects</div>
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
