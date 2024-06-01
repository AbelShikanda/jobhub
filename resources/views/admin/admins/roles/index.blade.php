@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Roles</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

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
                                        <h3 class="card-title">Roles and their information</h3>
                                    </div>
                                    @role('Staff/Support Agent')
                                    <div class="col-md-2">
                                        <a href="{{ route('roles.create') }}" type="button"
                                            class="btn btn-block btn-dark btn-sm">Add roles</a>
                                    </div>
                                    @else
                                    @endrole
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>role Name</th>
                                            <th>Date created</th>
                                            <th style="width: 20%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                            @unlessrole('Super Super Admin')
                                                @if ($role->name == 'Super Super Admin')
                                                    @continue
                                                @endif
                                            @endunlessrole
                                            <tr>
                                                <td>
                                                    {{ $role->id }}
                                                </td>
                                                <td>
                                                    {{ $role->name }}
                                                </td>
                                                <td>
                                                    {{ $role->created_at }}
                                                </td>

                                                <td class="project-actions text-right  justify-content-between">
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('roles.edit', $role->id) }}">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Edit
                                                    </a>
                                                    {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['roles.destroy', $role->id],
                                                        'style' => 'display:inline',
                                                    ]) !!}
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <th>#</th>
                                        <th>role Name</th>
                                        <th>Date created</th>
                                        <th></th>
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
