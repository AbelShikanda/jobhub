@extends('layouts.app')

@section('content')

@include('layouts.header')

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        @include('pages.partials.about-card')
    </div>
</div>
<!-- About End -->

@endsection
