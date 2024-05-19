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

        <div class="pt-3">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
        </div>

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
                        <form action="{{ route('profile.update', $user->id) }}" method="post">
                            @method('patch')
                            @csrf
                            <div class="row">
                                <div class="box" style="margin-top:0;">
                                    <div class="inputBox">
                                        <input type="text" name="phone"
                                            onkeyup="this.setAttribute('value', this.value);"
                                            value="{{ $users->first()->phone }}" />
                                        <label> Phone:</label>
                                    </div>
                                    <div class="inputBox">
                                        <select class="validate" id="gender" name="gender" data-error="#e3">
                                            <option value="{{ $users->first()->gender }}" disabled selected>Gender:
                                                {{ $users->first()->gender }}
                                            </option>
                                            <option @if ($users->first()->gender == 'Male') selected @endif>Male</option>
                                            <option @if ($users->first()->gender == 'Female') selected @endif>Female</option>
                                        </select>
                                    </div>
                                    <div class="inputBox">
                                        <select class="validate" id="country" name="country" data-error="#e3"
                                            placeholder="Pick a country..." required>
                                            @if ($users->first())
                                                <option value="{{ $users->first()->country }}" selected>
                                                    {{ $users->first()->country }}</option>
                                            @endif
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->name }}"
                                                    @if (old('country') == $country->name) selected @endif>
                                                    {{ $country->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="inputBox">
                                        <div class="">
                                            <?php
                                            $dob = $users->first()->date_of_birth ? date('Y-m-d\TH:i', strtotime($users->first()->date_of_birth)) : '';
                                            ?>
                                            <div class="row">
                                                <div class="col-md-4" style="margin-top: 4%">
                                                    <small>Birth Date</small>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="datetime-local" name="date_of_birth"
                                                        value="{{ $dob }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mt-2"><input type="submit" name="update" value="Update">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="app-card">
                    <span>
                        <i class="fas fa-graduation-cap p-2"></i>
                        Your Preferred jobs
                    </span>
                    <div class="app-card__subtext">
                        <form action="{{ route('profile.update', $user->id) }}" method="post" class="app-content-form">
                            @method('patch')
                            @csrf
                            <div class="row">
                                <div class="box" style="margin-top:0;">
                                    <div class="inputBox">
                                        <select id="inputGroupSelect04" name="jobz[]" placeholder="add prefered industry"
                                            multiple>
                                            @php
                                                $preferredIndustriesIDArray = json_decode(
                                                    $user->preferred_industry,
                                                    true,
                                                );
                                                $preferredIndustriesIDArray = array_map(
                                                    'intval',
                                                    $preferredIndustriesIDArray,
                                                );
                                                $oldJobValues = old('job')
                                                    ? array_map('intval', (array) old('job'))
                                                    : [];
                                            @endphp
                                            @foreach ($jobs as $job)
                                                <option value="{{ $job->id }}"
                                                    @if (in_array($job->id, $preferredIndustriesIDArray) || in_array($job->id, $oldJobValues)) selected @endif>
                                                    {{ $job->job_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="text-center mt-2"><input type="submit" name="update" value="Update">
                                    </div>
                                </div>
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
                        <form action="{{ route('profile.update', $user->id) }}" method="post" class="app-content-form">
                            @method('patch')
                            @csrf
                            <div class="row">
                                <div class="box" style="margin-top:0;">
                                    <div class="inputBox">
                                        @php
                                            $selectedLanguages = explode(', ', $languages->first()->language);
                                        @endphp
                                        <select class="validate" id="inputGroupSelect04" name="language[]" data-error="#e3" multiple>
                                            @if ($selectedLanguages)
                                                <option value="" disabled>Language:
                                                    {{ implode(', ', $selectedLanguages) }}</option>
                                            @else
                                                <option value="" disabled selected>Choose languages</option>
                                            @endif
                                            <option value="Kiswahili" @if (in_array('Kiswahili', $selectedLanguages)) selected @endif>
                                                Kiswahili</option>
                                            <option value="English" @if (in_array('English', $selectedLanguages)) selected @endif>
                                                English</option>
                                            <option value="French" @if (in_array('French', $selectedLanguages)) selected @endif>French
                                            </option>
                                            <option value="Arabic" @if (in_array('Arabic', $selectedLanguages)) selected @endif>Arabic
                                            </option>
                                            <option value="Germern" @if (in_array('Germern', $selectedLanguages)) selected @endif>
                                                Germern</option>
                                            <option value="Chinies" @if (in_array('Chinies', $selectedLanguages)) selected @endif>
                                                Chinies</option>
                                        </select>
                                    </div>
                                    <div class="inputBox">
                                        <select class="validate" id="" name="plevel" data-error="#e3">
                                            <option value="{{ $languages->first()->proficiency }}" disabled selected>
                                                Proficiency:
                                                {{ $languages->first()->proficiency }}
                                            </option>
                                            <option @if ($languages->first()->proficiency == 'Beginner') selected @endif>Beginner</option>
                                            <option @if ($languages->first()->proficiency == 'Advanced') selected @endif>Advanced</option>
                                            <option @if ($languages->first()->proficiency == 'Fluent') selected @endif>Fluent</option>
                                            <option @if ($languages->first()->proficiency == 'Native') selected @endif>Native</option>
                                        </select>
                                    </div>
                                    <div class="text-center mt-2"><input type="submit" name="update" value="Update">
                                    </div>
                                </div>
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
                            <form action="{{ route('profile.update', $user->id) }}" method="post"
                                class="app-content-form">
                                @method('patch')
                                @csrf
                                <div class="row">
                                    <div class="box" style="margin-top:0;">
                                        <div class="inputBox">
                                            <input type="text" name="cName"
                                                onkeyup="this.setAttribute('value', this.value);"
                                                value="{{ $experiences->first()->company_name }}" />
                                            <label> Company:</label>
                                        </div>
                                        <div class="inputBox">
                                            <input type="text" name="position"
                                                onkeyup="this.setAttribute('value', this.value);"
                                                value="{{ $experiences->first()->Position }}" />
                                            <label> Position:</label>
                                        </div>
                                        <div class="inputBox">
                                            <div class="">
                                                <?php
                                                $dob = $experiences->first()->start_date ? date('Y-m-d\TH:i', strtotime($experiences->first()->start_date)) : '';
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-4" style="margin-top: 4%">
                                                        <small>Start Date</small>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="datetime-local" name="selectedPosDate"
                                                            value="{{ $dob }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inputBox">
                                            <div class="">
                                                <?php
                                                $dob = $experiences->first()->end_date ? date('Y-m-d\TH:i', strtotime($experiences->first()->end_date)) : '';
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-4" style="margin-top: 4%">
                                                        <small>End Date</small>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="datetime-local" name="selectedExDate"
                                                            value="{{ $dob }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inputBox">
                                            <div class="">
                                                <textarea class="" id="wDesc" rows="3" name="wDesc"
                                                    placeholder="">{{ old('wDesc', $experiences->first()->description) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="inputBox">
                                            <input type="text" name="wLocation"
                                                onkeyup="this.setAttribute('value', this.value);"
                                                value="{{ $experiences->first()->location }}" />
                                            <label> Location:</label>
                                        </div>
                                        <div class="text-center mt-2"><input type="submit" name="update"
                                                value="Update">
                                        </div>
                                    </div>
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
                            <form action="{{ route('profile.update', $user->id) }}" method="post"
                                class="app-content-form">
                                @method('patch')
                                @csrf
                                <div class="row">
                                    <div class="box" style="margin-top:0;">
                                        <div class="inputBox">
                                            <input type="text" name="certName"
                                                onkeyup="this.setAttribute('value', this.value);"
                                                value="{{ $certificates->first()->certificate_name }}" />
                                            <label> Certificate:</label>
                                        </div>
                                        <div class="inputBox">
                                            <input type="text" name="certIssue"
                                                onkeyup="this.setAttribute('value', this.value);"
                                                value="{{ $certificates->first()->issuing_authority }}" />
                                            <label> Certificate:</label>
                                        </div>
                                        <div class="inputBox">
                                            <div class="">
                                                <?php
                                                $dob = $certificates->first()->issue_date ? date('Y-m-d\TH:i', strtotime($experiences->first()->issue_date)) : '';
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-4" style="margin-top: 4%">
                                                        <small>Issue Date</small>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="datetime-local" name="selectedCertDate"
                                                            value="{{ $dob }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inputBox">
                                            <div class="">
                                                <?php
                                                $dob = $certificates->first()->expiry_date ? date('Y-m-d\TH:i', strtotime($experiences->first()->expiry_date)) : '';
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-4" style="margin-top: 4%">
                                                        <small>Expiry Date</small>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="datetime-local" name="selectedCertExDate"
                                                            value="{{ $dob }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inputBox">
                                            <div class="">
                                                <textarea class="" id="wDesc" rows="3" name="certDesc"
                                                    placeholder="">{{ old('certDesc', $certificates->first()->description) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="text-center mt-2"><input type="submit" name="update"
                                                value="Update">
                                        </div>
                                    </div>
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
                            <form action="{{ route('profile.update', $user->id) }}" method="post"
                                class="app-content-form">
                                @method('patch')
                                @csrf
                                <div class="row">
                                    <div class="box" style="margin-top:0;">
                                        <div class="inputBox">
                                            <select class="validate" id="education" name="education" data-error="#e3">
                                                <option value="{{ $educations->first()->degree }}" disabled selected>
                                                    Current
                                                    Education:
                                                    {{ $educations->first()->degree }}
                                                </option>
                                                <option @if ($educations->first()->degree == 'Masters') selected @endif>Masters</option>
                                                <option @if ($educations->first()->degree == 'Degree') selected @endif>Degree</option>
                                                <option @if ($educations->first()->degree == 'High School Certificate') selected @endif>High School
                                                    Certificate</option>
                                                <option @if ($educations->first()->degree == 'Primary School Certificate') selected @endif>Primary School
                                                    Certificate</option>
                                            </select>
                                        </div>
                                        <div class="inputBox">
                                            <input type="text" name="field"
                                                onkeyup="this.setAttribute('value', this.value);"
                                                value="{{ $educations->first()->field_of_study }}" />
                                            <label> Field:</label>
                                        </div>
                                        <div class="inputBox">
                                            <input type="text" name="institution"
                                                onkeyup="this.setAttribute('value', this.value);"
                                                value="{{ $educations->first()->institution }}" />
                                            <label> Institution:</label>
                                        </div>
                                        <div class="inputBox">
                                            <input type="text" name="sLocation"
                                                onkeyup="this.setAttribute('value', this.value);"
                                                value="{{ $educations->first()->location }}" />
                                            <label> Location:</label>
                                        </div>
                                        <div class="inputBox">
                                            <div class="">
                                                <?php
                                                $dob = $educations->first()->graduation_year ? date('Y-m-d\TH:i', strtotime($educations->first()->graduation_year)) : '';
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-4" style="margin-top: 4%">
                                                        <small>Graduation</small>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="datetime-local" name="selectedGradDate"
                                                            value="{{ $dob }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inputBox">
                                            <div class="">
                                                <textarea class="" id="proff" rows="3" name="proff"
                                                    placeholder="">{{ old('proff', $certificates->first()->description) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="text-center mt-2"><input type="submit" name="update"
                                                value="Update">
                                        </div>
                                    </div>
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
                                <form action="{{ route('profile.update', $user->id) }}" method="post"
                                    class="app-content-form">
                                    @method('patch')
                                    @csrf
                                    <div class="row">
                                        <div class="box" style="margin-top:0;">
                                            <div class="inputBox">
                                                <div class="form row p-2" style="margin-left: 20px;">
                                                    <p for="certificate">Police Clearance</p>
                                                    <div class="custom-control custom-radio col">
                                                        <input type="radio" id="customRadio4" name="pcertificate"
                                                            class="custom-control-input" value="3"
                                                            @if ($users->first()->has_police_clearance == 3) checked @endif>
                                                        <label class="custom-control-label" for="customRadio4">Yes</label>
                                                    </div>
                                                    <div class="custom-control custom-radio col">
                                                        <input type="radio" id="customRadio5" name="pcertificate"
                                                            class="custom-control-input" value="2"
                                                            @if ($users->first()->has_police_clearance == 2) checked @endif>
                                                        <label class="custom-control-label" for="customRadio5">No</label>
                                                    </div>
                                                    <div class="custom-control custom-radio col">
                                                        <input type="radio" id="customRadio6" name="pcertificate"
                                                            class="custom-control-input" value="1"
                                                            @if ($users->first()->has_police_clearance == 1) checked @endif>
                                                        <label class="custom-control-label"
                                                            for="customRadio6">Waiting</label>
                                                    </div>
                                                    <div class="custom-control custom-radio col">
                                                        <input type="radio" id="customRadio7" name="pcertificate"
                                                            class="custom-control-input" value="0"
                                                            @if ($users->first()->has_police_clearance == 0) checked @endif>
                                                        <label class="custom-control-label" for="customRadio7">It's
                                                            Old</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="inputBox">
                                                <div class="for row p-2" style="margin-left: 20px;">
                                                    <p for="Passport">Passport?</p>
                                                    <div class="custom-control custom-radio col">
                                                        <input type="radio" id="customRadio8" name="Passport"
                                                            class="custom-control-input" value="2"
                                                            @if ($users->first()->has_passport == 2) checked @endif>
                                                        <label class="custom-control-label" for="customRadio8">Yes</label>
                                                    </div>
                                                    <div class="custom-control custom-radio col">
                                                        <input type="radio" id="customRadio9" name="Passport"
                                                            class="custom-control-input" value="1"
                                                            @if ($users->first()->has_passport == 1) checked @endif>
                                                        <label class="custom-control-label" for="customRadio9">No</label>
                                                    </div>
                                                    <div class="custom-control custom-radio col">
                                                        <input type="radio" id="customRadio10" name="Passport"
                                                            class="custom-control-input" value="0"
                                                            @if ($users->first()->has_passport == 0) checked @endif>
                                                        <label class="custom-control-label"
                                                            for="customRadio10">Waiting</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center mt-2"><input type="submit" name="update"
                                                    value="Update">
                                            </div>
                                        </div>
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
                                <form action="{{ route('profile.update', $user->id) }}" method="post"
                                    enctype="multipart/form-data" class="app-content-form">
                                    @method('patch')
                                    @csrf
                                    <div class="row">
                                        <div class="box" style="margin-top:0;">
                                            @if (!empty($fileName))
                                                <a style="margin-left: 30%; margin-bottom: 15%;"
                                                    href="{{ $fileName }}">Resume:</a>
                                            @endif

                                            <div class="inputBox">
                                                <!-- File input for uploading a new file -->
                                                <input class="file-path validate form-control" name="filepath"
                                                    type="file" placeholder="...">

                                                <!-- Hidden input to store the current file path -->
                                                <input type="hidden" name="current_filepath"
                                                    value="{{ $fileName }}">
                                            </div>
                                            <div class="text-center mt-2"><input type="submit" name="update"
                                                    value="Update">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
