@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>General Form</h1>
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
                    <!-- left column -->
                    <div class="col-md-6 offset-3">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ $users->first_name }} {{ $users->last_name }} <small>({{ $progress->progress == '100' ? 'already approved' : 'not approved' }})</small></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('progress.update', $users->id) }}" method="post"
                                enctype="multipart/form-data">
                                @method('patch')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <div 
                                            class="custom-control custom-switch {{ $progress->progress == '100' ? 'custom-switch-on-success' : 'custom-switch-off-danger' }} custom-switch-on-success">
                                            {{-- class="custom-control custom-switch custom-switch-on-success"> --}}
                                            <input type="hidden" name="approve" value="0">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch3" name="approve" value="1">
                                            <label class="custom-control-label" for="customSwitch3">Toggle To Approve Applicants</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Approve</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
