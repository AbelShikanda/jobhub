@extends('layouts.app_profile')

@section('content')

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

    <div class="pt-3">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
    </div>
    <div class="content-section">
        <div class="content-section-title">Jobs</div>
        <ul>
            @if ($jobs->count() > 0)
                @foreach ($jobs as $data)
                    <li class="adobe-product">
                        <div class="products">
                            <div class="px-2">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            {{ $data['job_title'] }}
                        </div>
                        <span class="status">
                            <span class="status-circle green"></span>
                            <strong>Company:</strong> {{ $data['org_name'] }}</span>
                        <div class="button-wrapper">
                            <a href="{{ $data['site'] }}" class="content-button status-button open">Site</a>
                        </div>
                    </li>
                @endforeach
            @else
                <li>
                    <p>all your applications will be visible here</p>
                </li>
            @endif
        </ul>
    </div>
    </div>
    </div>
@endsection
