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
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-8 offset-2 pt-5">
                        <!-- jquery validation -->
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title"> Roles <small>for admins</small></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" method="post" action="{{ route('roles.store') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Role Name</label>
                                        <input type="tect" name="rName" class="form-control" id="exampleInputEmail1"
                                            placeholder="Role Name" required>
                                    </div>
                                    <div class="row">
                                        <p>Add Permissions to New Role</p>
                                        <div class="col-sm-12">
                                            <!-- checkbox -->
                                            <div class="form-group justify-content-between d-flex flex-wrap">
                                                <div class="row">
                                                    @foreach ($permissions as $permission)
                                                        <div class="form-check pr-2 col-12 col-md-6 col-lg-3">
                                                            <input name="permission[{{ $permission->name }}]"
                                                                class="form-check-input" type="checkbox"
                                                                value="{{ $permission->name }}">
                                                            <label class="form-check-label">{{ $permission->name }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-primary w-50">Add Roles</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
