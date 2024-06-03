@extends('layouts.app')

@section('content')
    @include('layouts.header')

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="case-study-gallery">
                    @foreach ($images as $image)
                    <div class="case-study study1">
                        <figure>
                            <img class="case-study__img"
                                src="{{ asset('storage/img/pictures/'.$image->image_path) }}"
                                alt="image" />
                        </figure>
                        <div class="case-study__overlay">
                            <h2 class="case-study__title">{{ $image->text }}</h2>
                            <a class="case-study__link" href="{{ asset('storage/img/pictures/'.$image->image_path) }}">View Image</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            {{ $images->links() }}
        </div>
    @endsection
