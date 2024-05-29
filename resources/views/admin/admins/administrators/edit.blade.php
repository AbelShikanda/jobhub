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

        @if (count($errors) > 0)
            <div class="alert alert-danger col-md-12">
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
                                <h3 class="card-title">Administrator {{ $admin->username }}</h3>
                            </div>
                            <!-- ./card-header -->
                            <div class="card-body p-0">
                                <form action="{{ route('administrators.update', $admin->id) }}" method="post">
                                    @method('patch')
                                    @csrf
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td>
                                                    <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                    Admin Details
                                                </td>
                                            </tr>
                                            <tr class="expandable-body">
                                                <td>
                                                    <div class="p-0">
                                                        <table class="table table-hover">
                                                            <tbody>
                                                                <tr data-widget="expandable-table" aria-expanded="false">
                                                                    <td>
                                                                        <div class="row d-flex flex-wrap">
                                                                            <div class="col s12">
                                                                                <div class="form-group col">
                                                                                    <label for="exampleInputEmail1">User
                                                                                        Name</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="exampleInputEmail1"
                                                                                        placeholder="First Name"
                                                                                        value="{{ $admin->username }}"
                                                                                        name="user_name">
                                                                                </div>
                                                                                <div class="form-group col">
                                                                                    <label for="exampleInputEmail1">Email
                                                                                        Address</label>
                                                                                    <input type="email"
                                                                                        class="form-control"
                                                                                        id="exampleInputEmail1"
                                                                                        placeholder="Enter email"
                                                                                        value="{{ $admin->email }}"
                                                                                        name="email">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="form-group col">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="exampleInputEmail1"
                                                                                        value="staff"
                                                                                        placeholder="Last Name"
                                                                                        name="name" hidden>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                        <div class="row">
                                                                            <div class="input-field col s12">
                                                                                <div class="for">
                                                                                    <p for="pcertificate">Rank
                                                                                    </p>
                                                                                    <div
                                                                                        class="custom-control custom-radio col">
                                                                                        <input type="radio"
                                                                                            id="customRadio4"
                                                                                            name="pcertificate"
                                                                                            class="custom-control-input"
                                                                                            value="3"
                                                                                            @if ($admin->is_admin == 1) checked @endif>
                                                                                        <label class="custom-control-label"
                                                                                            for="customRadio4">Admin</label>
                                                                                    </div>
                                                                                    <div
                                                                                        class="custom-control custom-radio col">
                                                                                        <input type="radio"
                                                                                            id="customRadio5"
                                                                                            name="pcertificate"
                                                                                            class="custom-control-input"
                                                                                            value="0"
                                                                                            @if ($admin->is_mod == 1) checked @endif>
                                                                                        <label class="custom-control-label"
                                                                                            for="customRadio5">Moderator</label>
                                                                                    </div>
                                                                                    <div
                                                                                        class="custom-control custom-radio col">
                                                                                        <input type="radio"
                                                                                            id="customRadio6"
                                                                                            name="pcertificate"
                                                                                            class="custom-control-input"
                                                                                            value="1"
                                                                                            @if ($admin->is_staff == 1) checked @endif>
                                                                                        <label class="custom-control-label"
                                                                                            for="customRadio6">Staff</label>
                                                                                    </div>Old</label>
                                                                                </div>
                                                                                <div class="input-field">
                                                                                    <div id="e4"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                        <div class="row">
                                                                            <div class="input-field col s12">
                                                                                <div class="for">
                                                                                    <p for="certificate">Create New Password
                                                                                    </p>

                                                                                    <div class="form-group col">
                                                                                        <input type="password"
                                                                                            class="form-control"
                                                                                            id="exampleInputEmail1"
                                                                                            placeholder="Enter password"
                                                                                            name="password">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="for">
                                                                                    <p for="certificate">Password
                                                                                        Confirmation
                                                                                    </p>

                                                                                    <div class="form-group col">
                                                                                        <input type="password"
                                                                                            class="form-control"
                                                                                            id="exampleInputEmail1"
                                                                                            placeholder="Password Confirmation"
                                                                                            name="password_confirmation">
                                                                                    </div>
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
                                                    Roles
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
                                                                            <div class="col-sm-12">
                                                                                <!-- checkbox -->
                                                                                <div
                                                                                    class="form-group justify-content-between d-flex flex-wrap">
                                                                                    <div class="row">
                                                                                        @foreach ($roles as $role)
                                                                                            {{-- @if ($role->name == 'Super Super Admin')
                                                                                                @continue
                                                                                            @endif --}}
                                                                                            <div
                                                                                                class="form-check pr-2 col-12 col-md-6 col-lg-4">
                                                                                                <input
                                                                                                    name="role[{{ $role->name }}]"
                                                                                                    class="form-check-input"
                                                                                                    type="checkbox"
                                                                                                    value="{{ $role->name }}"
                                                                                                    {{ in_array($role->name, $roleroles) ? 'checked' : '' }}>
                                                                                                <label
                                                                                                    class="form-check-label">{{ $role->name }}</label>
                                                                                            </div>
                                                                                        @endforeach
                                                                                    </div>
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
                                            <button type="submit" class="btn btn-block btn-dark btn-sm">Update
                                                Admin</button>
                                        </div>
                                        <div class="col-md-4"></div>
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
