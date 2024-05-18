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

        @php
            $user = Auth()->user();
        @endphp

        <div class="content-section">
            <div class="content-section-title">Your Information</div>
            <div class="apps-card mt-3">
                <div class="app-card">
                    <span>
                        <i class="fas fa-graduation-cap p-2"></i>
                        Your Details
                    </span>
                    <div class="app-card__subtext">
                        <form action="{{ route('profile.update', $user->id) }}" method="post" >
                            @method('patch')
                            @csrf
                            <div class="row">
                                <div style="margin-top:0;" class="app-content-form">
                                    <input type="text" name="phone" id="input1" class="form-control" />
                                    <label class="input-label" for="input1"> Phone: {{ $users->first()->phone }} </label>
                                </div><br>
                                <div style="margin-top:-5px;">
                                    <select class="form-control validate" id="gender" name="gender" data-error="#e3">
                                        <option value="" disabled {{ (old('gender', $users->first()->gender)) ? 'selected' : '' }} class="text-center" >Gender: {{ $users->first()->gender }}</option>
                                        <option class="text-center">Male</option>
                                        <option class="text-center">Female</option>
                                    </select>
                                </div><br>
                                <div style="margin-top:-5px;">
                                    <select class="form-control validate" id="country" name="country" data-error="#e3"
                                        placeholder="Pick a country...">
                                        <option value="" disabled class="text-center">{{ $users->first()->country }}</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->name }}" @selected(old('country') == $country) class="text-center">
                                                {{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div><br>
                                <div style="margin-top:-5px;">
                                    <input type="Date" name="dob" id="input4" class="form-control text-center" value="{{ $users->first()->date_of_birth }}"/>
                                </div><br>
                            </div>
                            <div class="app-card-buttons">
                                <button type="submit" class="content-button status-button">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- <div class="app-card">
                    <span>
                        <i class="fas fa-graduation-cap p-2"></i>
                        Your preffered industry
                    </span>
                    <div class="app-card__subtext">
                        <form action="{{ route('applications.update', $user->id) }}" method="post" class="app-content-form">
                            @method('patch')
                            @csrf
                            <div class="row">
                                <select id="inputGroupSelect04" name="jobz[]" placeholder="Add Prefered Industry"
                                    multiple>
                                    @foreach ($jobs as $job)
                                        <option value="{{ $job->id }}" @selected(old('job') == $job)>
                                            {{ $job->job_title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="app-card-buttons">
                                <button type="submit" class="content-button status-button">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="app-card">
                    <span>
                        <i class="fas fa-graduation-cap p-2"></i>
                        Your Education Background
                    </span>
                    <div class="app-card__subtext">
                        <form action="{{ route('applications.update', $user->id) }}" method="post" class="app-content-form">
                            @method('patch')
                            @csrf
                            <div class="row">
                                <div style="margin-top:0;">
                                    <input type="text" name="education" id="input5" class="form-control" />
                                    <label class="input-label" for="input5"> {{ $educations->first()->degree }}:
                                        {{ $educations->first()->degree }}
                                    </label>
                                    <input type="text" name="education" id="input5" class="form-control" />
                                    <label class="input-label" for="input5"> {{ $educations->first()->field_of_study }}:
                                        {{ $educations->first()->field_of_study }}
                                    </label>
                                    <input type="text" name="education" id="input5" class="form-control" />
                                    <label class="input-label" for="input5"> {{ $educations->first()->institution }}:
                                        {{ $educations->first()->institution }}
                                    </label>
                                    <input type="text" name="education" id="input5" class="form-control" />
                                    <label class="input-label" for="input5"> {{ $educations->first()->location }}:
                                        {{ $educations->first()->location }}
                                    </label>
                                    <input type="text" name="education" id="input5" class="form-control" />
                                    <label class="input-label" for="input5"> {{ $educations->first()->graduation_year }}:
                                        {{ $educations->first()->graduation_year }}
                                    </label>
                                    <input type="text" name="education" id="input5" class="form-control" />
                                    <label class="input-label" for="input5"> {{ $educations->first()->description }}:
                                        {{ $educations->first()->description }}
                                    </label>
                                </div><br>
                            </div>
                            <div class="app-card-buttons">
                                <button type="submit" class="content-button status-button">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="apps-card mt-3">
                    <div class="app-card">
                        <span>
                            <i class="fas fa-graduation-cap p-2"></i>
                            Your Work Experiences
                        </span>
                        <div class="app-card__subtext">
                            <form action="{{ route('applications.update', $user->id) }}" method="post" class="app-content-form">
                                @method('patch')
                                @csrf
                                <div class="row">
                                    <div style="margin-top:0;">
                                        <input type="text" name="phone" id="input6" class="form-control" />
                                        <label class="input-label" for="input6"> {{ $experiences->company_name }}:
                                            {{ $experiences->Position }} </label>
                                    </div><br>
                                </div>
                                <div class="app-card-buttons">
                                    <button type="submit" class="content-button status-button">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="app-card">
                        <span>
                            <i class="fas fa-graduation-cap p-2"></i>
                            Your Additional Certificates
                        </span>
                        <div class="app-card__subtext">
                            <form action="{{ route('applications.update', $user->id) }}" method="post" class="app-content-form">
                                @method('patch')
                                @csrf
                                <div class="row">
                                    <div style="margin-top:0;">
                                        <input type="text" name="phone" id="input7" class="form-control" />
                                        <label class="input-label" for="input7"> Certificates:
                                            {{ $certificates->certificate_name }} </label>
                                    </div><br>
                                </div>
                                <div class="app-card-buttons">
                                    <button type="submit" class="content-button status-button">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="app-card">
                        <span>
                            <i class="fas fa-graduation-cap p-2"></i>
                            Languages
                        </span>
                        <div class="app-card__subtext">
                            <form action="{{ route('applications.update', $user->id) }}" method="post" class="app-content-form">
                                @method('patch')
                                @csrf
                                <div class="row">
                                    @foreach ($preferredlanguagesArray as $index => $data)
                                        <div style="margin-top:0;">
                                            <input type="text" name="phone" id="inp{{ $index }}"
                                                class="form-control" />
                                            <label class="input-label" for="inp{{ $index }}"> language:
                                                {{ $data }} </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="app-card-buttons">
                                    <button type="submit" class="content-button status-button">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="apps-card mt-3">
                        <div class="app-card">
                            <span>
                                <i class="fas fa-graduation-cap p-2"></i>
                                Your Legal Documents
                            </span>
                            <div class="app-card__subtext">
                                <form action="{{ route('applications.update', $user->id) }}" method="post" class="app-content-form">
                                    @method('patch')
                                    @csrf
                                    <div class="row">
                                        <div style="margin-top:0;">
                                            <input type="text" name="phone" id="input8" value="{{ $users->first()->has_police_clearance }}" class="form-control"/>
                                            <select class="form-control validate input-label" id="level" name="certificate" required>
                                                <option value="" disabled {{ is_null(old('certificate', $policeClearanceStatus)) ? 'selected' : '' }}>Police Clearance: {{ $policeClearanceStatus }}</option>
                                                <option value="0" {{ old('certificate', $policeClearanceStatus) === 'Old' ? 'selected' : '' }}>Old</option>
                                                <option value="1" {{ old('certificate', $policeClearanceStatus) === 'Waiting' ? 'selected' : '' }}>Waiting</option>
                                                <option value="2" {{ old('certificate', $policeClearanceStatus) === 'No' ? 'selected' : '' }}>No</option>
                                                <option value="2" {{ old('certificate', $policeClearanceStatus) === 'Yes' ? 'selected' : '' }}>Yes</option>
                                            </select>
                                        </div><br>
                                        <div style="margin-top:-5px;">
                                            <select class="form-control validate input-label" id="level" name="Passport" required>
                                                <option value="" disabled {{ is_null(old('Passport', $passportStatus)) ? 'selected' : '' }}>Passport: {{ $passportStatus }}</option>
                                                <option value="0" {{ old('Passport', $passportStatus) === 'No' ? 'selected' : '' }}>No</option>
                                                <option value="1" {{ old('Passport', $passportStatus) === 'Waiting' ? 'selected' : '' }}>Waiting</option>
                                                <option value="2" {{ old('Passport', $passportStatus) === 'Yes' ? 'selected' : '' }}>Yes</option>
                                            </select>
                                        </div><br>
                                    </div>
                                    <div class="app-card-buttons">
                                        <button type="submit" class="content-button status-button">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="app-card">
                            <span>
                                <i class="fas fa-graduation-cap p-2"></i>
                                Your Resume
                            </span>
                            <div class="app-card__subtext">
                                <form action="{{ route('applications.update', $user->id) }}" method="post" enctype="multipart/form-data" class="app-content-form">
                                    @method('patch')
                                    @csrf
                                    <div class="row">
                                        <div style="margin-top:0;">
                                            <input class="file-path validate form-control" id="input10" name="filepath"
                                                type="file" placeholder="Select file to upload" required>
                                            <label class="input-label" for="input10"> [Edit] :
                                                <a href="{{ $fileName }}">Resume</a>
                                        </div><br>
                                    </div>
                                    <div class="app-card-buttons">
                                        <button type="submit" class="content-button status-button">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        @endsection
