@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Invoice</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Invoice</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">


                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> {{ $orgs->Org_Name }}
                                        <small class="float-right"><strong>Founded_Date: </strong>{{ $orgs->Founded_Date }}</small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    <address>
                                        <strong>{{ $orgs->Org_Name }}</strong><br>
                                        {{ $orgs->Country }}<br>
                                        <a href="{{ $orgs->Website }}">{{ $orgs->Website }}</a><br>
                                    </address>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Jobs</th>
                                                <th>Description</th>
                                                <th>Salary</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($jobs->count() > 0)
                                                @foreach ($jobs as $data)
                                                    <tr>
                                                        <td>#</td>
                                                        <td>{{ $data->job_title }}</td>
                                                        <td>{{ $data->description }}</td>
                                                        <td>{{ $data->salary_range }}</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <td>No Informatoin</td>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-6">
                                    <p class="lead">Payment Methods:</p>
                                    <img src="{{ asset('admin/dist/img/credit/visa.png') }}" alt="Visa">
                                    <img src="{{ asset('admin/dist/img/credit/mastercard.png') }}" alt="Mastercard">
                                    <img src="{{ asset('admin/dist/img/credit/american-express.png') }}"
                                        alt="American Express">
                                    <img src="{{ asset('admin/dist/img/credit/paypal2.png') }}" alt="Paypal">
                                </div>
                                <!-- /.col -->
                                <div class="col-6">
                                    <p class="lead"><strong>Portential Applicants:</strong></p>

                                    <div class="table-responsive">
                                        <table class="table">
                                            @if ($applicants->count() > 0)
                                                @foreach ($applicants as $data)
                                                    <tr>
                                                        <th style="width:50%">{{ $data->first_name }} {{ $data->last_name }}</th>
                                                        <td>{{ $data->phone }}</td>
                                                        <td>{{ $data->country }}</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                    <p>all portential applications will be visible here</p>
                                            @endif
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">
                                    <div class="text-center mb-3">
                                        <a class="btn btn-warning btn-sm px-5 float-right"
                                            href="{{ route('organizations.edit', $orgs->id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
