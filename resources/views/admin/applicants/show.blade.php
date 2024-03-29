@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Applicant Detail</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Applicants Detail</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Applicant Country</span>
                                            <span
                                                class="info-box-number text-center text-muted mb-0">{{ $user->country }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Applicant Gender</span>
                                            <span
                                                class="info-box-number text-center text-muted mb-0">{{ $user->gender }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Applicant Age</span>
                                            <span class="info-box-number text-center text-muted mb-0"><?php
                                            // Calculate the age based on the date of birth
                                            $dob = $user->date_of_birth;
                                            $dobObj = new DateTime($dob);
                                            $currentDate = new DateTime();
                                            $ageInterval = $currentDate->diff($dobObj);
                                            $age = $ageInterval->y;
                                            ?>
                                                {{ $age }} Years</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h4>Activities</h4>
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm"
                                                src="{{ asset('admin/dist/img/user1-128x128.jpg') }}" alt="user image">
                                            <span class="username">
                                                <a href="#">{{ $user->first_name . ' ' . $user->last_name }}</a>
                                            </span>
                                            <span class="description">Shared publicly - {{ $user->created_at }}</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Work Experience Details</h3>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 10px">#</th>
                                                                    <th>Company Name</th>
                                                                    <th>Position</th>
                                                                    <th>Descriptiom</th>
                                                                    <th>Start Date</th>
                                                                    <th style="">End Date</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if ($experiences)
                                                                    <tr>
                                                                        <td>1.</td>
                                                                        <td>{{ $experiences->company_name }}</td>
                                                                        <td>{{ $experiences->Position }}</td>
                                                                        <td>{{ $experiences->description }}</td>
                                                                        <td>{{ $experiences->start_date }}</td>
                                                                        <td>{{ $experiences->end_date }}</td>
                                                                    </tr>
                                                                @else
                                                                    <tr>
                                                                        <td colspan="6">No experiences found</td>
                                                                    </tr>
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.card-body -->
                                                    <div class="card-footer clearfix">
                                                        {{-- <ul class="pagination pagination-sm m-0 float-right">
                                                            <li class="page-item"><a class="page-link"
                                                                    href="#">&laquo;</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">1</a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link" href="#">2</a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link" href="#">3</a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link"
                                                                    href="#">&raquo;</a></li>
                                                        </ul> --}}
                                                    </div>
                                                </div>
                                                <!-- /.card -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.user-block -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Education Details</h3>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 10px">#</th>
                                                                    <th>Education</th>
                                                                    <th>Field</th>
                                                                    <th>Institution</th>
                                                                    <th>Location</th>
                                                                    <th>graduation Date</th>
                                                                    <th>description</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if ($educations)
                                                                    <tr>
                                                                        <td>1.</td>
                                                                        <td>{{ $educations->degree }}</td>
                                                                        <td>{{ $educations->field_of_study }}</td>
                                                                        <td>{{ $educations->institution }}</td>
                                                                        <td>{{ $educations->location }}</td>
                                                                        <td>{{ $educations->graduation_year }}</td>
                                                                        <td>{{ $educations->description }}</td>
                                                                    </tr>
                                                                @else
                                                                    <tr>
                                                                        <td colspan="6">No education found</td>
                                                                    </tr>
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.card-body -->
                                                    <div class="card-footer clearfix">
                                                        {{-- <ul class="pagination pagination-sm m-0 float-right">
                                                            <li class="page-item"><a class="page-link"
                                                                    href="#">&laquo;</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">1</a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link" href="#">2</a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link" href="#">3</a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link"
                                                                    href="#">&raquo;</a></li>
                                                        </ul> --}}
                                                    </div>
                                                </div>
                                                <!-- /.card -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.user-block -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Legal Documents Details</h3>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 10px">#</th>
                                                                    <th>Documents</th>
                                                                    <th style="">Label</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1.</td>
                                                                    <td>Police Clearance</td>
                                                                    <td><span class="badge bg-">
                                                                            @if ($user->has_police_clearance === 0)
                                                                                <span class="badge badge-danger">No</span>
                                                                            @elseif ($user->has_police_clearance === 1)
                                                                                <span
                                                                                    class="badge badge-warning">Waiting</span>
                                                                            @elseif ($user->has_police_clearance === 2)
                                                                                <span
                                                                                    class="badge badge-info">Renewing</span>
                                                                            @elseif ($user->has_police_clearance === 3)
                                                                                <span class="badge badge-success">Yes</span>
                                                                            @endif
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2.</td>
                                                                    <td>Passport</td>
                                                                    <td><span class="badge bg-">
                                                                            @if ($user->has_passport === 0)
                                                                                <span class="badge badge-danger">No</span>
                                                                            @elseif ($user->has_passport === 1)
                                                                                <span
                                                                                    class="badge badge-warming">Waiting</span>
                                                                            @elseif ($user->has_passport === 2)
                                                                                <span class="badge badge-success">Yes</span>
                                                                            @endif
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.card-body -->
                                                    <div class="card-footer clearfix">
                                                        {{-- <ul class="pagination pagination-sm m-0 float-right">
                                                            <li class="page-item"><a class="page-link"
                                                                    href="#">&laquo;</a></li>
                                                            <li class="page-item"><a class="page-link"
                                                                    href="#">1</a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link"
                                                                    href="#">2</a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link"
                                                                    href="#">3</a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link"
                                                                    href="#">&raquo;</a></li>
                                                        </ul> --}}
                                                    </div>
                                                </div>
                                                <!-- /.card -->
                                            </div>
                                            <!-- /.col -->
                                        </div>

                                        <p>
                                            <a href="#" class="link-black text-sm"><i
                                                    class="fas fa-link mr-1"></i>File 1 v2</a>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                            <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Job Hub</h3>
                            <p class="text-muted">
                                @if ($educations)
                                    {{ $comments->comment_text }}
                                @else
                                    No comment found
                                @endif
                            </p>
                            <br>
                            <div class="text-muted">
                                <p class="text-sm">Most Recent Company
                                    <b class="d-block">
                                        @if ($educations)
                                        {{ $latestex->company_name }}
                                        @else
                                            No company found
                                        @endif
                                    </b>
                                </p>
                                <p class="text-sm">Refference
                                    <b class="d-block">{{ $user->reference_source }}</b>
                                </p>
                            </div>

                            <h5 class="mt-5 text-muted">Applicant personal details</h5>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="{{ $fileName }}" class="btn-link text-secondary"><i
                                            class="far fa-fw fa-file-word"></i>
                                        Resume</a>
                                </li>
                                <li>
                                    <a href="#" class="btn-link text-secondary"><i
                                            class="fas fa-fw fa-phone"></i>{{ $user->phone }}</a>
                                </li>
                                <li>
                                    <a href="" class="btn-link text-secondary"><i
                                            class="far fa-fw fa-envelope"></i>
                                        {{ $user->email }}</a>
                                </li>
                            </ul>
                            <div class="text-center mt-5 mb-3">
                                <a class="btn btn-warning btn-sm px-5" href="{{-- {{ route('products.edit', $product->id) }} --}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
