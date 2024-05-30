@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Administrators</h1>
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
                                        <h3 class="card-title">Administrators and their information</h3>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="{{ route('administrators.create') }}" type="button"
                                            class="btn btn-block btn-dark btn-sm">Add Administrators</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Admin Name</th>
                                            <th>Admin email</th>
                                            <th>Admin Roles</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $admin)
                                            @unlessrole('Super Super Admin')
                                                @if ($admin->username == 'abel')
                                                    @continue
                                                @endif
                                            @endunlessrole
                                            <tr>
                                                <td>
                                                    {{ $admin->username }}
                                                </td>
                                                <td>
                                                    {{ $admin->email }}
                                                </td>
                                                <td>
                                                    @if (!@empty($admin->getRoleNames()))
                                                        @foreach ($admin->getRoleNames() as $rolename)
                                                            <label class="badge bg-primary">{{ $rolename }}</label>
                                                        @endforeach
                                                    @endif
                                                </td>

                                                <td class="project-actions text-right  justify-content-between">
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('administrators.edit', $admin->id) }}">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Edit
                                                    </a>
                                                    {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['administrators.destroy', $admin->id],
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
                                        <tr>
                                            <th>Admin Name</th>
                                            <th>Admin email</th>
                                            <th></th>
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
