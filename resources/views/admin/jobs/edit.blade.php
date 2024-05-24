@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>job ( {{ $jobs->job_title }} )</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        @if (count($errors) > 0)
            <div class="alert alert-danger col-md-8 offset-md-3">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> job <small>details</small></h3>
                            </div>
                            <!-- ./card-header -->
                            <div class="card-body p-0">
                                <form id="quickForm" method="post" action="{{ route('job.update', $jobs->id) }}">
                                    @csrf
                                    @method('patch')
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td>
                                                    <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                    Organization Category
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
                                                                                <label>Job Category</label>
                                                                                <select class="validate form-control select2" id="country" name="category" data-error="#e3"
                                                                                    placeholder="Pick a country..." required>
                                                                                    @if ($jobsCategories)
                                                                                        <option value="{{ $jobsCategories->id }}" selected>
                                                                                            {{ $jobsCategories->name }}</option>
                                                                                    @endif
                                                                                    @foreach ($categories as $category)
                                                                                        <option value="{{ $category->id }}"
                                                                                            @selected(old('category') == $category)>
                                                                                            {{ $category->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-12">
                                                                                <label>Organization</label>
                                                                                <select class="validate form-control select2" id="country" name="organization" data-error="#e3"
                                                                                    placeholder="Pick a country..." required>
                                                                                    @if ($currentOrgs)
                                                                                        <option value="{{ $currentOrgs->id }}" selected>
                                                                                            {{ $currentOrgs->Org_Name }}</option>
                                                                                    @endif
                                                                                    @foreach ($organizations as $category)
                                                                                        <option value="{{ $category->id }}"
                                                                                            @selected(old('organization') == $category)>
                                                                                            {{ $category->Org_Name }}</option>
                                                                                    @endforeach
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
                                                    job Details
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
                                                                                <label for="exampleInputEmail1">Job
                                                                                    Title</label>
                                                                                <input type="tect" name="jName" value="{{ $jobs->job_title }}"
                                                                                    class="form-control"
                                                                                    id="exampleInputEmail1"
                                                                                    placeholder="Job Title" required>
                                                                            </div>
                                                                            <div class="form-group col-6">
                                                                                <label for="dob"
                                                                                    class="col-sm-3 col-form-label text-dark">Deadline
                                                                                    Date</label>
                                                                                <div class="col-sm-9">
                                                                                    <?php
                                                                                    $dob = $jobs->deadline_date ? date('Y-m-d\TH:i', strtotime($jobs->deadline_date)) : '';
                                                                                    ?>
                                                                                    <input type="datetime-local"
                                                                                        id="dob" name="selectedDate"
                                                                                        class="form-control text-dark"
                                                                                        type="text" id="selectedDate"
                                                                                        value="{{ $dob }}">
                                                                                    <input type="text" id="endDate"
                                                                                        value="0" hidden="true">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group col-12">
                                                                                <textarea class="form-control" id="Desc" rows="3" name="responce" placeholder="">{{ old('responce', $jobs->responsibilities) }}</textarea>
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
                                                    Additional Details
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
                                                                                    <textarea class="form-control" id="Desc" rows="3" name="desc" placeholder="">{{ old('desc', $jobs->description) }}</textarea>
                                                                                    
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group col-12">
                                                                                    <textarea class="form-control" id="Desc" rows="3" name="req" placeholder="">{{ old('req', $jobs->requirements) }}</textarea>
                                                                                    
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr data-widget="expandable-table" aria-expanded="false">
                                                                    <td>
                                                                        <div class="row">
                                                                            <div class="form-group col-12">
                                                                                <label for="exampleInputEmail1">Salary
                                                                                    Range</label>
                                                                                <input type="tect" name="range"
                                                                                    class="form-control"
                                                                                    id="exampleInputEmail1"
                                                                                    value="{{ $jobs->salary_range }}" required>
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
                                            <button type="submit" class="btn btn-block btn-dark btn-sm w-50">Submit</button>
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
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
