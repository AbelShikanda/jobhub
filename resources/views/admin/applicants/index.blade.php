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
                                    <div class="col-md-2">
                                        <a href="{{ route('applicants.create') }}" type="button" class="btn btn-block btn-dark btn-sm">Add applicants</a>
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
                                            <th>Educational Background:</th>
                                            <th>Age</th>
                                            <th>passport</th>
                                            <th style="width:17%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Trident</td>
                                            <td>Internet
                                                Explorer 4.0
                                            </td>
                                            <td>Win 95+</td>
                                            <td> 4</td>
                                            <td>X</td>

                                            <td class="project-actions text-right d-flex justify-content-between">
                                                <a class="btn btn-primary btn-sm" href="{{-- {{ route('products.show', $product->id) }} --}}">
                                                    <i class="fas fa-folder">
                                                    </i>
                                                    View
                                                </a>
                                                <a class="btn btn-info btn-sm" href="{{-- {{ route('products.edit', $product->id) }} --}}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>
                                                <a class="btn btn-info btn-sm" href="{{-- {{ route('products.edit', $product->id) }} --}}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>
                                                {{-- {!! Form::open(['method' => 'DELETE', 'route' => ['products.destroy', $product->id], 'style' => 'display:inline']) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                                {!! Form::close() !!} --}}
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Applicant Name</th>
                                            <th>Phone number</th>
                                            <th>Educational Background:</th>
                                            <th>Age</th>
                                            <th>passport</th>
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
