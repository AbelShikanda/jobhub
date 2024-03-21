@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Organizations</h1>
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
                                        <h3 class="card-title">Organizations and their information</h3>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="{{ route('organizations.create') }}" type="button"
                                            class="btn btn-block btn-dark btn-sm">Add Organizations</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Organization's Name</th>
                                            <th>Organization's Category</th>
                                            <th>Organization's Country</th>
                                            <th style="width:20%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($work as $work)
                                            @foreach ($work->categories as $category)
                                                <tr>
                                                    <td>{{ $work->Org_Name }}</td>
                                                    <td>
                                                        {{ $category->name }}
                                                    </td>
                                                    <td>{{ $work->Country }}</td>

                                                    <td class="project-actions text-right d-flex justify-content-between">
                                                        <a class="btn btn-primary btn-sm"
                                                            href="{{ route('organizations.show', $work->id) }}">
                                                            <i class="fas fa-folder">
                                                            </i>
                                                            View
                                                        </a>
                                                        <a class="btn btn-info btn-sm"
                                                            href="{{ route('organizations.edit', $work->id) }}">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Edit
                                                        </a>
                                                        {!! Form::open([
                                                            'method' => 'DELETE',
                                                            'route' => ['organizations.destroy', $work->id],
                                                            'style' => 'display:inline',
                                                        ]) !!}
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </button>
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Organization's Name</th>
                                            <th>Organization's Category</th>
                                            <th>Organization's Country</th>
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
