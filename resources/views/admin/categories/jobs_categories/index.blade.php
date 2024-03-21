@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Jobs Categories</h1>
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

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="card-title">Jobs Categories</h3>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('job_categories.create') }}" type="button"
                                class="btn btn-block btn-dark btn-sm">Add Category</a>
                        </div>
                    </div>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 3%">
                                    #
                                </th>
                                <th class="text-center" style="width: 50%">
                                    Category Name
                                </th>
                                <th>
                                    Date Created
                                </th>
                                <th style="width: 20%">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $category)
                                <tr>
                                    <td>
                                        {{ $category->id }}
                                    </td>
                                    <td class="text-center">
                                        <a>
                                            {{ $category->name }}
                                        </a>
                                    </td>
                                    <td>
                                        <a>
                                            {{ $category->created_at }}
                                        </a>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="{{ route('job_categories.edit', $category->id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['job_categories.destroy', $category->id],
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
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
