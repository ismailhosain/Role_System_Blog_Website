@extends('layouts.master')

@section('title', 'Edit Post')

@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Post</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Add Post</li>
        </ol>
        <div class="card">
            <div class="card-header">
                <h5>Add Post</h5>

            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('admin/update_post/' . $post->id) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="">Category Name</label>

                            <select id="my-select" class="form-control" name="category_id">
                                <option>--selected--</option>
                                @foreach ($category as $catitem)
                                    <option value="{{ $catitem->id }}"
                                        {{ $post->category_id == $catitem->id ? 'selected' : ' ' }}>
                                        {{ $catitem->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ $post->name }}" class="form-control">

                    </div>
                    <div class="mb-3">
                        <label for="">Slug</label>
                        <input type="text" name="slug" value="{{ $post->slug }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea name="description" id="my_summernote" class="form-control">{!! $post->description !!}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">YT Frame</label>
                        <input type="text" name="yt_frame" value="{{ $post->yt_frame }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" name="meta_title" value="{{ $post->meta_title }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" class="form-control">{{ $post->meta_description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Keyword</label>
                        <textarea name="meta_keyword" class="form-control">{!! $post->meta_keyword !!}</textarea>
                    </div>
                    <div class="row">
                        <h6>Status Mode</h6>
                        <div class="col-md-3 mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" {{ $post->status == '1' ? 'checked' : '' }}>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Update Post</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>



    </div>

@endsection
