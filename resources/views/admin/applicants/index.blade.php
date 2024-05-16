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
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="card-title">Applicants and their information</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Applicant Name</th>
                                            <th>Phone number</th>
                                            <th>Police clearance</th>
                                            <th>Age</th>
                                            <th>passport</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($applicants as $applicant)
                                            <tr>
                                                <td>{{ $applicant->first_name }}</td>
                                                <td>{{ $applicant->phone }}</td>
                                                <td>
                                                    @if ($applicant->has_police_clearance === 0)
                                                        <span class="badge badge-danger">No</span>
                                                    @elseif ($applicant->has_police_clearance === 1)
                                                        <span class="badge badge-warning">Waiting</span>
                                                    @elseif ($applicant->has_police_clearance === 2)
                                                        <span class="badge badge-info">Renewing</span>
                                                    @elseif ($applicant->has_police_clearance === 3)
                                                        <span class="badge badge-success">Yes</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <?php
                                                    // Calculate the age based on the date of birth
                                                    $dob = $applicant->date_of_birth;
                                                    $dobObj = new DateTime($dob);
                                                    $currentDate = new DateTime();
                                                    $ageInterval = $currentDate->diff($dobObj);
                                                    $age = $ageInterval->y;
                                                    ?>
                                                    {{ $age }} Years
                                                </td>
                                                <td>
                                                    @if ($applicant->has_passport === 0)
                                                        <span class="badge badge-danger">No</span>
                                                    @elseif ($applicant->has_passport === 1)
                                                        <span class="badge badge-warning">Waiting</span>
                                                    @elseif ($applicant->has_passport === 2)
                                                        <span class="badge badge-success">Yes</span>
                                                    @endif
                                                </td>

                                                <td class="project-actions text-right  justify-content-between">
                                                    <a class="btn btn-primary btn-sm"
                                                        href="{{ route('applicants.show', $applicant->id) }}">
                                                        <i class="fas fa-folder">
                                                        </i>
                                                        View
                                                    </a>
                                                    {{-- <a class="btn btn-info btn-sm"
                                                        href="{{ route('applicants.edit', $applicant->id) }}">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Edit
                                                    </a> --}}
                                                    {{-- {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['applicants.destroy', $applicant->id],
                                                        'style' => 'display:inline',
                                                    ]) !!}
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                    {!! Form::close() !!} --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Applicant Name</th>
                                            <th>Phone number</th>
                                            <th>Police clearance</th>
                                            <th>Age</th>
                                            <th>passport</th>
                                            <th style="width:20%;"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
