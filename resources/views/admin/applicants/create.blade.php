@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Applicants</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Expandable Table Tree</h3>
                            </div>
                            <!-- ./card-header -->
                            <div class="card-body p-0">
                                <form method="post" action="{{ route('applicants.store') }}">
                                    @csrf
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td>
                                                    <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                    Client Details
                                                </td>
                                            </tr>
                                            <tr class="expandable-body">
                                                <td>
                                                    <div class="p-0">
                                                        <table class="table table-hover">
                                                            <tbody>
                                                                <tr data-widget="expandable-table" aria-expanded="false">
                                                                    <td>
                                                                        <div class="row">
                                                                            <div class="form-group col-3">
                                                                                <label for="first_name">First
                                                                                    Name</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="first_name" placeholder="First Name"
                                                                                    name="first_name">
                                                                            </div>
                                                                            <div class="form-group col-3">
                                                                                <label for="last_name">Last
                                                                                    Name</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="last_name" placeholder="Last Name"
                                                                                    name="last_name">
                                                                            </div>
                                                                            <div class="form-group col-3">
                                                                                <label for="email">Email
                                                                                    Address</label>
                                                                                <input type="email" class="form-control"
                                                                                    id="email" placeholder="Enter email"
                                                                                    name="aemail">
                                                                            </div>
                                                                            <div class="form-group col-3">
                                                                                <label for="phoneNumber">Phone Number
                                                                                    (254)</label>
                                                                                <input type="tel" id="phoneNumber"
                                                                                    name="phoneNumber" class="form-control"
                                                                                    id="phoneNumber"
                                                                                    placeholder="254789456123" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group col-4">
                                                                                <label for="dob"
                                                                                    class=" col-form-label text-dark">Date
                                                                                    of
                                                                                    Birth</label>
                                                                                <div class="">
                                                                                    <input type="datetime-local"
                                                                                        id="dob"
                                                                                        name="selectedDeadDate"
                                                                                        class="form-control text-dark"
                                                                                        type="text" value="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-4">
                                                                                <label for="gender">Gender</label>
                                                                                <select class="form-control validate"
                                                                                    id="gender" name="gender"
                                                                                    data-error="#e3" required>
                                                                                    <option value="" disabled
                                                                                        selected>Choose Gender</option>
                                                                                    <option>Male</option>
                                                                                    <option>Female</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-4">
                                                                                <label for="select_state">Country</label>
                                                                                <select class="form-control validate"
                                                                                    id="select_state" name="country"
                                                                                    placeholder="Pick a country..."
                                                                                    required>
                                                                                    <option value="">Pick a country...
                                                                                    </option>
                                                                                    <option value="AL">Alabama</option>
                                                                                    <option value="AK">Alaska</option>
                                                                                    <option value="AZ">Arizona</option>
                                                                                    <option value="AR">Arkansas</option>
                                                                                    <option value="CA">California
                                                                                    </option>
                                                                                    <option value="CO">Colorado</option>
                                                                                    <option value="CT">Connecticut
                                                                                    </option>
                                                                                    <option value="DE">Delaware</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td>
                                                    <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                    Job Details
                                                </td>
                                            </tr>
                                            <tr class="expandable-body">
                                                <td>
                                                    <div class="p-0">
                                                        <table class="table table-hover">
                                                            <tbody>
                                                                <tr data-widget="expandable-table" aria-expanded="false">
                                                                    <td>
                                                                        <div class="row">
                                                                            <div class="form-group col-6">
                                                                                <label for="jpb">Job
                                                                                    Name</label>
                                                                                <select class="form-control select2"
                                                                                    style="width: 100%;" name="job"
                                                                                    id="job">
                                                                                    @foreach ($jobs as $job)
                                                                                        <option value="{{ $job->id }}"
                                                                                            @selected(old('job') == $job)>
                                                                                            {{ $job->job_title }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-6">
                                                                                <label for="range">Salary
                                                                                    Range</label>
                                                                                <input type="text" name="range"
                                                                                    class="form-control" id="range"
                                                                                    placeholder="Enter a salary (1000)"
                                                                                    required>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td>
                                                    <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                    Skills Details
                                                </td>
                                            </tr>
                                            <tr class="expandable-body">
                                                <td>
                                                    <div class="p-0">
                                                        <table class="table table-hover">
                                                            <tbody>
                                                                <tr data-widget="expandable-table" aria-expanded="false">
                                                                    <td>
                                                                        <div class="row">
                                                                            <div class="form-group col-4">
                                                                                <label for="sName">Skill
                                                                                    Name</label>
                                                                                <input type="email" class="form-control"
                                                                                    id="sName" name="sName"
                                                                                    placeholder="Enter email">
                                                                            </div>
                                                                            <div class="form-group col-4">
                                                                                <label for="sDesc">Description</label>
                                                                                <input type="email" class="form-control"
                                                                                    id="sDesc" name="sDesc"
                                                                                    placeholder="Short description">
                                                                            </div>
                                                                            <div class="form-group col-4">
                                                                                <label for="level">Level</label>
                                                                                <select class="form-control validate"
                                                                                    id="level" name="level"
                                                                                    required>
                                                                                    <option value="" disabled
                                                                                        selected>Choose skill level</option>
                                                                                    <option>Entry</option>
                                                                                    <option>Intermediate</option>
                                                                                    <option>Experienced</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td>
                                                    <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                    Education Details
                                                </td>
                                            </tr>
                                            <tr class="expandable-body">
                                                <td>
                                                    <div class="p-0">
                                                        <table class="table table-hover">
                                                            <tbody>
                                                                <tr data-widget="expandable-table" aria-expanded="false">
                                                                    <td>
                                                                        <div class="row">
                                                                            <div class="form-group col-3">
                                                                                <label for="education">Education</label>
                                                                                <select class="form-control validate"
                                                                                    id="education" name="education"
                                                                                    required>
                                                                                    <option value="" disabled
                                                                                        selected>Choose education level
                                                                                    </option>
                                                                                    <option>Masters</option>
                                                                                    <option>Degree</option>
                                                                                    <option>High School Certificate</option>
                                                                                    <option>Primary School Certificate
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-3">
                                                                                <label for="field">Field of
                                                                                    study</label>
                                                                                <input type="email" class="form-control"
                                                                                    id="field" name="field"
                                                                                    placeholder="Enter email">
                                                                            </div>
                                                                            <div class="form-group col-3">
                                                                                <label
                                                                                    for="institution">Institution</label>
                                                                                <input type="email" class="form-control"
                                                                                    id="institution" name="institution"
                                                                                    placeholder="Enter email">
                                                                            </div>
                                                                            <div class="form-group col-3">
                                                                                <label for="dob"
                                                                                    class=" col-form-label text-dark">Graduation
                                                                                    Date</label>
                                                                                <div class="">
                                                                                    <input type="datetime-local"
                                                                                        id="dob"
                                                                                        name="selectedGradDate"
                                                                                        class="form-control text-dark"
                                                                                        type="text" value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td>
                                                    <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                    Experience Details
                                                </td>
                                            </tr>
                                            <tr class="expandable-body">
                                                <td>
                                                    <div class="p-0">
                                                        <table class="table table-hover">
                                                            <tbody>
                                                                <tr data-widget="expandable-table" aria-expanded="false">
                                                                    <td>
                                                                        <div class="row">
                                                                            <div class="form-group col-3">
                                                                                <label for="cName">Company
                                                                                    Name</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="cName" name="cName"
                                                                                    placeholder="Enter Name">
                                                                            </div>
                                                                            <div class="form-group col-3">
                                                                                <input type="text" class="form-control"
                                                                                    id="position" name="position"
                                                                                    placeholder="Enter position">
                                                                            </div>
                                                                            <div class="form-group col-3">
                                                                                <label for="dob"
                                                                                    class=" col-form-label text-dark">Start
                                                                                    Date</label>
                                                                                <div class="">
                                                                                    <input type="datetime-local"
                                                                                        id="dob"
                                                                                        name="selectedStartDate"
                                                                                        class="form-control text-dark"
                                                                                        type="text" value="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-3">
                                                                                <label for="dob"
                                                                                    class=" col-form-label text-dark">End
                                                                                    Date</label>
                                                                                <div class="">
                                                                                    <input type="datetime-local"
                                                                                        id="dob"
                                                                                        name="selectedEndDate"
                                                                                        class="form-control text-dark"
                                                                                        type="text" value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td>
                                                    <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                    Proffessional certs Details
                                                </td>
                                            </tr>
                                            <tr class="expandable-body">
                                                <td>
                                                    <div class="p-0">
                                                        <table class="table table-hover">
                                                            <tbody>
                                                                <tr data-widget="expandable-table" aria-expanded="false">
                                                                    <td>
                                                                        <div class="row">
                                                                            <div class="form-group col-3">
                                                                                <label for="cert">Certificate
                                                                                    Name</label>
                                                                                <input type="type" class="form-control"
                                                                                    id="cert" class="cert"
                                                                                    placeholder="Enter Certificate Name">
                                                                            </div>
                                                                            <div class="form-group col-3">
                                                                                <label for="auth">Issuing
                                                                                    Authority</label>
                                                                                <input type="email" class="form-control"
                                                                                    id="auth" name="auth"
                                                                                    placeholder="Enter Issuing authority">
                                                                            </div>
                                                                            <div class="form-group col-3">
                                                                                <label for="dob"
                                                                                    class=" col-form-label text-dark">Issue
                                                                                    Date</label>
                                                                                <div class="">
                                                                                    <input type="datetime-local"
                                                                                        id="dob"
                                                                                        name="selectedDobDate"
                                                                                        class="form-control text-dark"
                                                                                        type="text" value="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-3">
                                                                                <label for="dob"
                                                                                    class=" col-form-label text-dark">Expiry
                                                                                    Date</label>
                                                                                <div class="">
                                                                                    <input type="datetime-local"
                                                                                        id="dob"
                                                                                        name="selectedExDate"
                                                                                        class="form-control text-dark"
                                                                                        type="text" value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td>
                                                    <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                    Language Details
                                                </td>
                                            </tr>
                                            <tr class="expandable-body">
                                                <td>
                                                    <div class="p-0">
                                                        <table class="table table-hover">
                                                            <tbody>
                                                                <tr data-widget="expandable-table" aria-expanded="false">
                                                                    <td>
                                                                        <div class="row">
                                                                            <div class="form-group col-6">
                                                                                <label for="language">Language</label>
                                                                                <select class="form-control validate"
                                                                                    id="language" name="language"
                                                                                    required>
                                                                                    <option value="" disabled
                                                                                        selected>Choose Language</option>
                                                                                    <option value="Tiktok">Kiswahili
                                                                                    </option>
                                                                                    <option value="English">English
                                                                                    </option>
                                                                                    <option value="French">French</option>
                                                                                    <option value="Arabic">Arabic</option>
                                                                                    <option value="Germern">Germern
                                                                                    </option>
                                                                                    <option value="Germern">Chinies
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-6">
                                                                                <label
                                                                                    for="proficiency">Proficiency</label>
                                                                                <select class="form-control validate"
                                                                                    id="proficiency" name="proficiency"
                                                                                    required>
                                                                                    <option value="" disabled
                                                                                        selected>Choose proficiency</option>
                                                                                    <option value="Tiktok">Beginner
                                                                                    </option>
                                                                                    <option value="English">Advanced
                                                                                    </option>
                                                                                    <option value="French">Fluent</option>
                                                                                    <option value="Arabic">Native</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td>
                                                    <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                    Comment
                                                </td>
                                            </tr>
                                            <tr class="expandable-body">
                                                <td>
                                                    <div class="p-0">
                                                        <table class="table table-hover">
                                                            <tbody>
                                                                <tr data-widget="expandable-table" aria-expanded="false">
                                                                    <td>
                                                                        <div class="row">
                                                                            <div class="form-group col-12">
                                                                                <label for="comment">Comment</label>
                                                                                <textarea class="form-control" id="comment" rows="3" name="comment" required placeholder="Add a Comment"></textarea>
                                                                            </div>
                                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4 text-center">
                                    <a href="#" type="button" class="btn btn-block btn-dark btn-sm">Submit</a>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </div>
                        </form>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
