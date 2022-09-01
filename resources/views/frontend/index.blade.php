@extends('layouts.app')
@section('title', 'home')
@section('content')
@section('description', 'Blog Is a programming website for all')
@section('keyword', 'Blog,website,program')

<div class="bg-danger py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel  mycategory-carousel owl-theme">
                    @foreach ($catcarousel as $carouselitem)
                        <div class="item">
                            <a href="{{ url('tutorials/' . $carouselitem->slug) }}" class="text-decoration-none">
                                <div class="card">
                                    <img src="{{ asset('upload/category/' . $carouselitem->image) }}" alt="image">
                                    <div class="card-body text-center">
                                        <h5>{{ $carouselitem->name }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row text-center bg-info">
            <h5 class="p-4">Advertisement area</h5>
        </div>
    </div>
</div>
<div class="py-4 ">
    <div class="container">
        <div class="row">
            <h2 class="text-primary">Web Development In IT</h2>
            <hr style="width:40%">
            <p class="justify-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe officiis vitae
                nobis amet adipisci? Pariatur, ullam necessitatibus voluptas, ut debitis itaque numquam consectetur
                fugiat molestias quas laboriosam dolore nostrum est quas laboriosam dolore nostrum est.</p>
        </div>
    </div>
</div>
<div class="py-4 bg-secondary">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>All Categories</h2>
                <hr style="width:40%">
            </div>

            @foreach ($catcarousel as $categoryitem)
                <div class="col-md-3 pt-3">
                    <div class="card card-body">
                        <a target="_blank" href="{{ url('tutorials/' . $categoryitem->slug . '/') }}"
                            class="text-decoration-none ">
                            <h4>{{ $categoryitem->name }}</h4>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="py-4 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Latest Post</h2>
                <hr style="width:40%">
            </div>
            <div class="col-md-8">
                @foreach ($latestpost as $latestpostitem)
                    <div class="card card-body m-3">
                        <a target="_blank"
                            href="{{ url('tutorials/' . $latestpostitem->category->slug . '/' . $latestpostitem->slug) }}"
                            class="text-decoration-none ">
                            <h4>{{ $latestpostitem->name }}</h4>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4">
                <div class="row text-center bg-info">
                    <h5 class="p-4">Advertisement area</h5>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
