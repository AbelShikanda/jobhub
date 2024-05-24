@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Organizations ( {{ $orgs->Org_Name }} )</h1>
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
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Organizations <small>details</small></h3>
                            </div>
                            <!-- ./card-header -->
                            <div class="card-body p-0">
                                <form id="quickForm" method="post" action="{{ route('organizations.update', $orgs->id) }}">
                                    @method('patch')
                                    @csrf
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td>
                                                    <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                    Organization Category
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
                                                                            <div class="form-group col-12">
                                                                                <label>Category</label>
                                                                                <select class="form-control select2"
                                                                                    style="width: 100%;" name="category">
                                                                                    @if ($orgsCategories)
                                                                                        <option value="{{ $orgsCategories->id }}" selected>
                                                                                            {{ $orgsCategories->name }}</option>
                                                                                    @endif
                                                                                    @foreach ($categories as $category)
                                                                                        <option value="{{ $category->id }}"
                                                                                            @selected(old('category') == $category)>
                                                                                            {{ $category->name }}</option>
                                                                                    @endforeach
                                                                                </select>
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
                                                    Organizations Details
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
                                                                            <div class="form-group col-6">
                                                                                <label for="exampleInputEmail1">Organization
                                                                                    Name</label>
                                                                                <input type="tect" name="eName" value="{{ $orgs->Org_Name }}"
                                                                                    class="form-control"
                                                                                    id="exampleInputEmail1"
                                                                                    placeholder="Organization Name" required>
                                                                            </div>
                                                                            <div class="form-group col-6">
                                                                                <label
                                                                                    for="exampleInputPassword1">Websilte</label>
                                                                                <input type="text" name="website" value="{{ $orgs->Website }}"
                                                                                    class="form-control"
                                                                                    id="exampleInputPassword1"
                                                                                    placeholder="Website">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group col-6">
                                                                                <label>Country</label>
                                                                                <select class="form-control select2"
                                                                                    style="width: 100%;" name="country">
                                                                                    @if ($users->first())
                                                                                        <option value="{{ $users->first()->country }}" selected>
                                                                                            {{ $users->first()->country }}</option>
                                                                                    @endif
                                                                                    @foreach ($countries as $country)
                                                                                        <option value="{{ $country->name }}"
                                                                                            @if (old('country') == $country->name) selected @endif>
                                                                                            {{ $country->name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-6">
                                                                                <label for="dob"
                                                                                    class="col-sm-3 col-form-label text-dark">Founded
                                                                                    Date</label>
                                                                                    <?php
                                                                                    $dob = $orgs->Founded_Date ? date('Y-m-d\TH:i', strtotime($orgs->Founded_Date)) : '';
                                                                                    ?>
                                                                                    <div class="row">
                                                                                        <div class="col-md-8 form-control">
                                                                                            <input type="datetime-local" name="selectedDate"
                                                                                                value="{{ $dob }}" />
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
                                                    Additional Details
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
                                                                            <div class="form-group col-12">
                                                                                    <textarea class="form-control" id="Desc" rows="3" name="desc" placeholder="">{{ old('desc', $orgs->Description) }}</textarea>
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
                                            <button type="submit" class="btn btn-block btn-dark btn-sm w-50">Submit</button>
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
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
