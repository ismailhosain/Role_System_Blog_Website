@extends('layouts.app')
@section('title', "$category->meta_title")
@section('description', "$category->meta_description")
@section('keyword', "$category->meta_keyword")



@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-9 ">
                    <div class="border p-3">
                        <h4>{{ $category->name }}</h4>
                    </div>
                    @forelse ($post as $postname)
                        <div class="card mt-3">
                            <div class="card-body">
                                <a href="{{ url('tutorials/' . $category->slug . '/' . $postname->slug) }}"
                                    class="text-decoration-none">
                                    <h4>{{ $postname->name }}</h4>
                                </a>
                                <h6>Post On:{{ $postname->created_at->format('d-m-y') }}
                                    <span class="ms-3"> Post By:{{ $postname->user->name }}</span>
                                </h6>
                            </div>
                        </div>
                    @empty
                        <div class="card">
                            <div class="card-body">
                                <h4>Post Not Found</h4>
                            </div>
                        </div>
                    @endforelse
                    <div class="mt-3">
                        <h6>{{ $post->links() }}</h6>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="border p-2">
                        <h4>Advertisement</h4>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
@endsection
