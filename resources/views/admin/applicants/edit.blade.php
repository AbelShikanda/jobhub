@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Simple Tables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Simple Tables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Expandable Table Tree</h3>
                        </div>
                        <!-- ./card-header -->
                        <div class="card-body p-0">
                            <form>
                            <table class="table table-hover">
                                <tbody>
                                        <tr data-widget="expandable-table" aria-expanded="false">
                                            <td>
                                                <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                Client Details
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
                                                                        <div class="form-group col-3">
                                                                            <label for="exampleInputEmail1">First
                                                                                Name</label>
                                                                            <input type="email" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                placeholder="First Name"
                                                                                name="first_name">
                                                                        </div>
                                                                        <div class="form-group col-3">
                                                                            <label for="exampleInputEmail1">Last
                                                                                Name</label>
                                                                            <input type="email" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                placeholder="Last Name"
                                                                                name="last_name">
                                                                        </div>
                                                                        <div class="form-group col-3">
                                                                            <label for="exampleInputEmail1">Email
                                                                                Address</label>
                                                                            <input type="email" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                placeholder="Enter email"
                                                                                name="email">
                                                                        </div>
                                                                        <div class="form-group col-3">
                                                                            <label for="exampleInputEmail1">Phone
                                                                                Number</label>
                                                                            <input type="email" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                placeholder="Phone number"
                                                                                name="phone">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-3">
                                                                            <label for="exampleInputEmail1">DOB</label>
                                                                            <input type="email" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                placeholder="Date of birth"
                                                                                name="dob">
                                                                        </div>
                                                                        <div class="form-group col-3">
                                                                            <label
                                                                                for="exampleInputEmail1">Gender</label>
                                                                            <input type="email" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                placeholder="gender" name="gender">
                                                                        </div>
                                                                        <div class="form-group col-3">
                                                                            <label
                                                                                for="exampleInputEmail1">Address</label>
                                                                            <input type="email" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                placeholder="Address" name="address">
                                                                        </div>
                                                                        <div class="form-group col-3">
                                                                            <label
                                                                                for="exampleInputEmail1">Country</label>
                                                                            <input type="email" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                placeholder="Country" name="country">
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
                                                Job Details
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
                                                                        <div class="form-group col-3">
                                                                            <label for="exampleInputEmail1">Job
                                                                                Name</label>
                                                                            <input type="email" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                placeholder="Enter email">
                                                                        </div>
                                                                        <div class="form-group col-3">
                                                                            <label for="exampleInputEmail1">Salary
                                                                                range</label>
                                                                            <input type="email" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                placeholder="Enter email">
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
                                                Skills Details
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
                                                                        <div class="form-group col-3">
                                                                            <label
                                                                                for="exampleInputEmail1">Name</label>
                                                                            <input type="email" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                placeholder="Enter email">
                                                                        </div>
                                                                        <div class="form-group col-3">
                                                                            <label
                                                                                for="exampleInputEmail1">Description</label>
                                                                            <input type="email" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                placeholder="Enter email">
                                                                        </div>
                                                                        <div class="form-group col-3">
                                                                            <label
                                                                                for="exampleInputEmail1">Level</label>
                                                                            <input type="email" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                placeholder="Enter email">
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
                                                Education Details
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
                                                                        <div class="form-group col-3">
                                                                            <label
                                                                                for="exampleInputEmail1">Degree</label>
                                                                            <input type="email" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                placeholder="Enter email">
                                                                        </div>
                                                                        <div class="form-group col-3">
                                                                            <label for="exampleInputEmail1">Field of
                                                                                study</label>
                                                                            <input type="email" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                placeholder="Enter email">
                                                                        </div>
                                                                        <div class="form-group col-3">
                                                                            <label
                                                                                for="exampleInputEmail1">Institution</label>
                                                                            <input type="email" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                placeholder="Enter email">
                                                                        </div>
                                                                        <div class="form-group col-3">
                                                                            <label for="exampleInputEmail1">Graduation
                                                                                date</label>
                                                                            <input type="email" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                placeholder="Enter email">
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
                                                Experience Details
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
                                                                        <div class="form-group col-3">
                                                                            <label for="exampleInputEmail1">Company
                                                                                Name</label>
                                                                            <input type="email" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                placeholder="Enter email">
                                                                        </div>
                                                                        <div class="form-group col-3">
                                                                            <label
                                                                                for="exampleInputEmail1">Position</label>
                                                                            <input type="email" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                placeholder="Enter email">
                                                                        </div>
                                                                        <div class="form-group col-3">
                                                                            <label for="exampleInputEmail1">Start
                                                                                date</label>
                                                                            <input type="email" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                placeholder="Enter email">
                                                                        </div>
                                                                        <div class="form-group col-3">
                                                                            <label for="exampleInputEmail1">End
                                                                                date</label>
                                                                            <input type="email" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                placeholder="Enter email">
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
                                                Proffessional certs Details
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
                                                                        <div class="form-group col-3">
                                                                            <label for="exampleInputEmail1">Certificate
                                                                                Name</label>
                                                                            <input type="email" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                placeholder="Enter email">
                                                                        </div>
                                                                        <div class="form-group col-3">
                                                                            <label for="exampleInputEmail1">Issuing
                                                                                Authority</label>
                                                                            <input type="email" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                placeholder="Enter email">
                                                                        </div>
                                                                        <div class="form-group col-3">
                                                                            <label for="exampleInputEmail1">Issue
                                                                                date</label>
                                                                            <input type="email" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                placeholder="Enter email">
                                                                        </div>
                                                                        <div class="form-group col-3">
                                                                            <label for="exampleInputEmail1">Expiry
                                                                                date</label>
                                                                            <input type="email" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                placeholder="Enter email">
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
                                                Language Details
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
                                                                        <div class="form-group col-3">
                                                                            <label
                                                                                for="exampleInputEmail1">Language</label>
                                                                            <input type="email" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                placeholder="Enter email">
                                                                        </div>
                                                                        <div class="form-group col-3">
                                                                            <label
                                                                                for="exampleInputEmail1">Proficiency</label>
                                                                            <input type="email" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                placeholder="Enter email">
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
                                                Comment
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
                                                                        <div class="form-group col-3">
                                                                            <label
                                                                                for="exampleInputEmail1">Description</label>
                                                                            <input type="email" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                placeholder="Enter email">
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
                                    <a href="#" type="button" class="btn btn-block btn-dark btn-sm">update</a>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
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