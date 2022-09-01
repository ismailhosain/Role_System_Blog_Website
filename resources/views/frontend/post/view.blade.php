@extends('layouts.app')

@section('title', "$post->meta_title")
@section('description', "$post->meta_description")
@section('keyword', "$post->meta_keyword")

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div>
                        <h3>{{ $post->name }}</h3>
                    </div>
                    <div class="card border mt-3">
                        <div class="card-body post-description">
                            <h6>{!! $post->description !!}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="border p-2">
                        <h4>Advertisement</h4>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            Latest Post
                        </div>

                        <div class="card-body">
                            @foreach ($latest_posts as $latest_posts_item)
                                <a href="{{ url('tutorials/' . $latest_posts_item->category->slug . '/' . $latest_posts_item->slug) }}"
                                    class="text-decoration-none ">
                                    <h5> > {{ $latest_posts_item->name }}</h5>
                                </a>
                            @endforeach

                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
@endsection
