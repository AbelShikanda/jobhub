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

        <div class="pt-3">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="card-title">Jobs</h3>
                                    </div>
                                    <div class="col-md-2">
                                        @role('Staff/Support Agent')
                                        @else
                                        <a href="{{ route('job.create') }}" type="button"
                                            class="btn btn-block btn-dark btn-sm">Add Jobs</a>
                                        @endrole
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Job Title</th>
                                            <th>Job Category</th>
                                            <th>Salary Range</th>
                                            <th>Deadline</th>
                                            @role('Staff/Support Agent')
                                            @else
                                            <th style="width:20%;"></th>
                                            @endrole
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($work as $work)
                                            @foreach ($work->categories as $category)
                                                <tr>
                                                    <td>{{ $work->job_title }}</td>
                                                    <td>
                                                        {{ $category->name }}
                                                    </td>
                                                    <td>{{ $work->salary_range }}</td>
                                                    <td>{{ $work->deadline_date }}</td>

                                                    @role('Staff/Support Agent')
                                                    @else
                                                    <td class="project-actions text-right d-flex justify-content-between">
                                                        <a class="btn btn-primary btn-sm"
                                                            href="{{ route('job.show', $work->id) }}">
                                                            <i class="fas fa-folder">
                                                            </i>
                                                            View
                                                        </a>
                                                        <a class="btn btn-info btn-sm"
                                                            href="{{ route('job.edit', $work->id) }}">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Edit
                                                        </a>
                                                        {!! Form::open([
                                                            'method' => 'DELETE',
                                                            'route' => ['job.destroy', $work->id],
                                                            'style' => 'display:inline',
                                                        ]) !!}
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </button>
                                                        {!! Form::close() !!}
                                                    </td>
                                                    @endrole

                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Job Title</th>
                                            <th>Job Category</th>
                                            <th>Salary Range</th>
                                            <th>Deadline</th>
                                            @role('Staff/Support Agent')
                                            @else
                                            <th style="width:20%;"></th>
                                            @endrole
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
