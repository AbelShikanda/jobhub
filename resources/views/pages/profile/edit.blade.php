@extends('layouts.app_profile')

@section('content')

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
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <div class="box">
                        <div class="inputBox">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
        <div class="apps-card mt-3">
            <form action="{{ route('profile.update', $user->id) }}" method="post">
                @method('patch')
                @csrf
                <div class="app-card">
                    <span>
                        <i class="fas fa-graduation-cap p-2"></i>
                        Your Details
                    </span>
                    <div class="app-card__subtext">
                        <div class="row">
                            <div class="box">
                                <div class="inputBox">
                                    <input type="text" name="phone" onkeyup="this.setAttribute('value', this.value);"
                                        value="{{ $users->first()->phone }}" />
                                    <label> Phone:</label>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <div class="inputBox">
                                            <p for="certificate">Prefered Jobs</p>
                                            <select id="inputGroupSelect04" name="jobz[]"
                                                placeholder="add preferred industry" multiple>
                                                @php
                                                    $preferredIndustries = $users->first()->preferred_industry;
                                                    $preferredIndustriesIDArray = $preferredIndustries
                                                        ? json_decode($preferredIndustries, true)
                                                        : [];
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
                                    </div>
                                    <div class="col">
                                        <div class="inputBox">
                                            <p for="certificate">Prefered languages</p>
                                            @php
                                                $selectedLanguages = explode(', ', $languages->first()->language);
                                            @endphp
                                            <select class="validate" id="inputGroupSelect04" name="language[]"
                                                data-error="#e3" multiple>
                                                @if ($selectedLanguages)
                                                    <option value="" disabled>Language:
                                                        {{ implode(', ', $selectedLanguages) }}</option>
                                                @else
                                                    <option value="" disabled selected>Choose languages</option>
                                                @endif
                                                <option value="Kiswahili"
                                                    @if (in_array('Kiswahili', $selectedLanguages)) selected @endif>
                                                    Kiswahili</option>
                                                <option value="English" @if (in_array('English', $selectedLanguages)) selected @endif>
                                                    English</option>
                                                <option value="French" @if (in_array('French', $selectedLanguages)) selected @endif>
                                                    French
                                                </option>
                                                <option value="Arabic" @if (in_array('Arabic', $selectedLanguages)) selected @endif>
                                                    Arabic
                                                </option>
                                                <option value="Germern"
                                                    @if (in_array('Germern', $selectedLanguages)) selected @endif>
                                                    Germern</option>
                                                <option value="Chinies"
                                                    @if (in_array('Chinies', $selectedLanguages)) selected @endif>
                                                    Chinies</option>
                                            </select>
                                        </div>
                                        <div class="inputBox">
                                            <select class="validate" id="" name="plevel" data-error="#e3">
                                                <option value="{{ $languages->first()->proficiency }}" disabled selected>
                                                    Proficiency:
                                                    {{ $languages->first()->proficiency }}
                                                </option>
                                                <option @if ($languages->first()->proficiency == 'Beginner') selected @endif>Beginner
                                                </option>
                                                <option @if ($languages->first()->proficiency == 'Advanced') selected @endif>Advanced
                                                </option>
                                                <option @if ($languages->first()->proficiency == 'Fluent') selected @endif>Fluent</option>
                                                <option @if ($languages->first()->proficiency == 'Native') selected @endif>Native</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="inputBox mt-3">
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
                                            <label class="custom-control-label" for="customRadio6">Waiting</label>
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
                                <hr>
                                <div class="inputBox  mt-3">
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
                                            <label class="custom-control-label" for="customRadio10">Waiting</label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="text-center mt-5"><input type="submit" name="update" value="Save changes">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endsection
