@extends('layouts.app')

@section('content')
    <div class="ctrlqFormContentWrapper">
        <div class="ctrlqHeaderMast"></div>
        <div class="ctrlqCenteredContent">
            <div class="ctrlqFormCard">
                <div class="ctrlqAccent"></div>
                <div class="ctrlqFormContent">

                    @php
                        $user = Auth()->user();
                    @endphp

                    <form action="{{ route('applications.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        @method('patch')
                        @csrf

                        <div class="row">
                            <div class="input-field col s12 text-center">
                                <h4>Candidate Interview Form</h4>
                                <p>All fields are required</p>
                            </div>
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
                        <hr>

                        <!-- Applicant details -->
                        <p>Applicants Details</p>

                        <div class="row">
                            <div class="input-field col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="tel" id="phoneNumber" name="phoneNumber" class="form-control"
                                        placeholder=" " required>
                                    <label for="phoneNumber">Phone Number (254)</label>
                                </div>
                                {{-- <div id="e2"></div> --}}
                            </div>
                            <div class="input-field col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <select class="form-control validate" id="gender" name="gender" data-error="#e3"
                                        required>
                                        <option value="" disabled selected>Choose Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div id="e3"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <select class="form-control validate" id="country" name="country" data-error="#e3"
                                        placeholder="Pick a country..." required>
                                        <option value="">Pick a country...</option>
                                        <option value="Alabama">Alabama</option>
                                        <option value="Alaska">Alaska</option>
                                        <option value="Arizona">Arizona</option>
                                        <option value="Arkansas">Arkansas</option>
                                        <option value="California">California</option>
                                    </select>
                                </div>
                                <div id="e3"></div>
                            </div>
                        </div>

                        <div class="row py-4">
                            <div class="col s12">
                                <div class="form row">
                                    <label for="dob" class="col-sm-3 col-form-label text-dark">Date of
                                        birth:</label>
                                    <div class="col-sm-9">
                                        <input type="datetime-local" id="dob" name="selectedDobDate"
                                            class="form-control text-dark" type="text" id="selectedDate" value="">
                                        <input type="text" id="endDate" value="0" hidden="true">
                                    </div>
                                </div>
                                <div id="e5"></div>
                            </div>
                        </div>
                        <hr>
                        <p>Job Details</p>

                        <div class="row">
                            <div class="input-field col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <select id="inputGroupSelect04" name="jobz[]" placeholder="Add Prefered Industry"
                                        multiple>
                                        @foreach ($jobs as $job)
                                            <option value="{{ $job->id }}" @selected(old('job') == $job)>
                                                {{ $job->job_title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="e2"></div>
                            </div>
                            <div class="input-field col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="range" class="form-control" id="range" placeholder=""
                                        required>
                                    <label for="range">Enter a salary (1000)</label>
                                </div>
                                <div id="e3"></div>
                            </div>
                        </div>
                        <hr>
                        <p>Skills</p>

                        <div class="input-field row">
                            <div class="form-group col-6">
                                <input type="text" class="form-control" id="sName" name="sName" placeholder="">
                                <label for="sName">Skill Name</label>
                            </div>
                            <div class="form-group col-6">
                                <select class="form-control validate" id="level" name="slevel" required>
                                    <option value="" disabled selected>Choose skill level</option>
                                    <option value="Entry">Entry</option>
                                    <option value="Intermediate">Intermediate</option>
                                    <option value="Experienced">Experienced</option>
                                </select>
                            </div>
                            <div id="e3"></div>
                        </div>
                        <div class="input-field row">
                            <div class="form-group col-12">
                                <textarea class="form-control" id="certificate" rows="3" name="sDesc" required placeholder="Describe the skill"></textarea>
                            </div>
                            <div id="e3"></div>
                        </div>
                        <hr>
                        <p>Education Background</p>

                        <div class="row">
                            <div class="form-group col-6">
                                <select class="form-control validate" id="education" name="education" required>
                                    <option value="" disabled selected>Choose education level
                                    </option>
                                    <option>Masters</option>
                                    <option>Degree</option>
                                    <option>High School Certificate</option>
                                    <option>Primary School Certificate
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <input type="text" class="form-control" id="field" name="field"
                                    placeholder="">
                                <label for="field">Field of study</label>
                                <div id="e3"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <input type="text" class="form-control" id="institution" name="institution"
                                    placeholder="">
                                <label for="institution">Institution</label>
                                <div id="e3"></div>
                            </div>
                            <div class="form-group col-6">
                                <div class="row">
                                    <div class="col-4">
                                        <label for="dog" class=" col-form-label text-dark">Graduation</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="datetime-local" id="dog" name="selectedGradDate"
                                            class="col-8 form-control text-dark" type="text" value="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row pt-2">
                            <div class="input-field col-12">
                                <div class="form-group">
                                    <textarea class="form-control" id="certificate" rows="3" name="proff" required
                                        placeholder="Add (list) Proffessional certificates if any"></textarea>
                                </div>
                                <div id="e6"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="sLocation" name="sLocation"
                                        placeholder="">
                                    <label for="sLocation">School location</label>
                                </div>
                                <div id="e1"></div>
                            </div>
                        </div>
                        <hr>
                        <p>Previous work experience</p>

                        <div class="row">
                            <div class="input-field col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="cName" name="cName"
                                        placeholder="">
                                    <label for="cName">Company
                                        Name</label>
                                </div>
                                <div id="e1"></div>
                            </div>
                            <div class="input-field col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="position" name="position"
                                        placeholder="">
                                    <label for="position">Position</label>
                                </div>
                                <div id="e1"></div>
                            </div>
                        </div>

                        <div class="row py-4">
                            <div class="col s12">
                                <div class="form row">
                                    <label for="wDate" class="col-sm-3 col-form-label text-dark">Start
                                        Date:</label>
                                    <div class="col-sm-9">
                                        <input type="datetime-local" id="wDate" name="selectedPosDate"
                                            class="form-control text-dark" type="text" id="wDate" value="">
                                        <input type="text" id="endDate" value="0" hidden="true">
                                    </div>
                                </div>
                                <div id="e5"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <div class="form row">
                                    <label for="expiryDate" class="col-sm-3 col-form-label text-dark">End
                                        Date:</label>
                                    <div class="col-sm-9">
                                        <input type="datetime-local" id="expiryDate" name="selectedExDate"
                                            class="form-control text-dark" type="text" id="expiryDate"
                                            value="">
                                        <input type="text" id="endDate" value="0" hidden="true">
                                    </div>
                                </div>
                                <div id="e5"></div>
                            </div>
                        </div>
                        <div class="row  pt-4">
                            <div class="form-group col-12">
                                <textarea class="form-control" id="certificate" rows="3" name="wDesc" required
                                    placeholder="Describe the work"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="wLocation" name="wLocation"
                                        placeholder="">
                                    <label for="wLocation">Work location</label>
                                </div>
                                <div id="e1"></div>
                            </div>
                        </div>
                        <hr>
                        <p>Additional certificates (if any)</p>

                        <div class="row">
                            <div class="input-field col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="certName" name="certName"
                                        placeholder="">
                                    <label for="certName">Certificate Name</label>
                                </div>
                                <div id="e1"></div>
                            </div>
                            <div class="input-field col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="certIssue" name="certIssue"
                                        placeholder="">
                                    <label for="certIssue">Issue Authority</label>
                                </div>
                                <div id="e1"></div>
                            </div>
                        </div>

                        <div class="row py-4">
                            <div class="col s12">
                                <div class="form row">
                                    <label for="selectedCertDate" class="col-sm-3 col-form-label text-dark">Issue
                                        Date:</label>
                                    <div class="col-sm-9">
                                        <input type="datetime-local" id="dob" name="selectedCertDate"
                                            class="form-control text-dark" type="text" id="selectedCertDate"
                                            value="">
                                        <input type="text" id="endDate" value="0" hidden="true">
                                    </div>
                                </div>
                                <div id="e5"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <div class="form row">
                                    <label for="selectedCertExDate" class="col-sm-3 col-form-label text-dark">Expiry
                                        Date:</label>
                                    <div class="col-sm-9">
                                        <input type="datetime-local" id="selectedCertExDate" name="selectedCertExDate"
                                            class="form-control text-dark" type="text" id="selectedDate"
                                            value="">
                                        <input type="text" id="endDate" value="0" hidden="true">
                                    </div>
                                </div>
                                <div id="e5"></div>
                            </div>
                        </div>
                        <div class="row  pt-4">
                            <div class="form-group col-12">
                                <textarea class="form-control" id="certificate" rows="3" name="certDesc" required placeholder="Description"></textarea>
                            </div>
                        </div>
                        <hr>
                        <p>Language</p>

                        <div class="row">
                            <div class="col s12">
                                <div class="form row">
                                    <label for="inputGroupSelect05"
                                        class="col-sm-4 col-form-label text-dark">Language:</label>
                                    <div class="col-sm-8">
                                        <select id="inputGroupSelect05" name="language[]" placeholder="Add Language"
                                            multiple>
                                            <option value="Tiktok">Kiswahili</option>
                                            <option value="English">English</option>
                                            <option value="French">French</option>
                                            <option value="Arabic">Arabic</option>
                                            <option value="Germern">Germern</option>
                                            <option value="Germern">Chinies</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="e5"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <div class="form row">
                                    <label for="inputGroupSelect05" class="col-sm-4 col-form-label text-dark">Language
                                        Proficiency:</label>
                                    <div class="col-sm-8">
                                        <select class="form-control validate" id="level" name="plevel" required>
                                            <option value="" disabled selected>Proficiency</option>
                                            <option value="Tiktok">Beginner</option>
                                            <option value="English">Advanced</option>
                                            <option value="French">Fluent</option>
                                            <option value="Arabic">Native</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="e5"></div>
                                <hr>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <div class="for">
                                    <p for="certificate">Do You Have a Police Clearance certificate (max 4 months ago)?
                                    </p>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio4" name="certificate"
                                            class="custom-control-input" value="3">
                                        <label class="custom-control-label" for="customRadio4">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio5" name="certificate"
                                            class="custom-control-input" value="2">
                                        <label class="custom-control-label" for="customRadio5">No</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio6" name="certificate"
                                            class="custom-control-input" value="1">
                                        <label class="custom-control-label" for="customRadio6">Waiting</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio7" name="certificate"
                                            class="custom-control-input" value="0">
                                        <label class="custom-control-label" for="customRadio7">Older than 4 months (to
                                            be
                                            renewed)</label>
                                    </div>
                                </div>
                                <div class="input-field">
                                    <div id="e4"></div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="input-field col s12">
                                <div class="form">
                                    <p for="Passport">Do You Have a Valid Passport?</p>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio8" name="Passport"
                                            class="custom-control-input" value="2">
                                        <label class="custom-control-label" for="customRadio8">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio9" name="Passport"
                                            class="custom-control-input" value="1">
                                        <label class="custom-control-label" for="customRadio9">No</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio10" name="Passport"
                                            class="custom-control-input" value="0">
                                        <label class="custom-control-label" for="customRadio10">Waiting</label>
                                    </div>
                                </div>
                                <div class="input-field">
                                    <div id="e4"></div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row py-4">
                            <div class="col s12">
                                <div class="form row">
                                    <label for="inputGroupSelect06" class="col-sm-4 col-form-label text-dark">Where
                                        did
                                        you find us:</label>
                                    <div class="col-sm-8">
                                        <select id="inputGroupSelect06" name="platform[]"
                                            placeholder="Where did you find us" multiple>
                                            <option value="Kiswahili">Tiktok</option>
                                            <option value="Instagram">Instagram</option>
                                            <option value="Facebook">Facebook</option>
                                            <option value="LinkedIn">LinkedIn</option>
                                            <option value="Agents">Agents</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="e5"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col-12 col-md-6 col-lg-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="agents" name="agentName"
                                        placeholder=" " required>
                                    <label for="agents">Agents Name</label>
                                </div>
                                <div id="e1"></div>
                            </div>
                        </div>

                        <div class="row py-4">
                            <div class="col s12">
                                <div class="form row">
                                    <label for="available" class="col-sm-5 col-form-label text-dark">When will you be
                                        available to start work in romania:</label>
                                    <div class="col-sm-7">
                                        <input type="datetime-local" name="selectedAvailDate"
                                            class="form-control text-dark" type="text" id="available" value="">
                                        <input type="text" id="endDate" value="0" hidden="true">
                                    </div>
                                </div>
                                <div id="e5"></div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="file-field input-field col s12">
                                <div class="file-upload">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <span>Resume</span>
                                        </div>
                                        <div class="col-md-10">
                                            <input class="file-path validate form-control" name="filepath" type="file"
                                                placeholder="Select file to upload" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-field">
                                    <div id="e9"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row py-4">
                            <div class="input-field col s12">
                                <div class="form-group">
                                    <textarea class="form-control" id="comments" rows="3" name="comment" data-error="#e6" required
                                        placeholder="Additional Comments"></textarea>
                                </div>
                                <div id="e6"></div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="input-field col s12">
                                <div class="form">
                                    <div class="custom-control custom-radio">
                                        <div class="row">
                                            <div class="col">
                                                <label for="agree">Terms and Conditions</label> &nbsp; &nbsp; &nbsp;
                                                &nbsp;
                                            </div>
                                            <div class="col">
                                                <input type="radio" id="agree" name="agree"
                                                    class="custom-control-input" value="1" required>
                                                <label class="custom-control-label" for="agree">Agree</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-field">
                                    <div id="e4"></div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>

                        <div class="col-12">
                            <button class="btn btn-secondary w-100 py-3" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
