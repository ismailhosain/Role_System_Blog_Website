@extends('layouts.master')

@section('title', 'Add Post')

@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Post</h1>
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

            <form method="POST" action="{{ url('admin/add_post') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="">Category Name</label>

                            <select id="my-select" class="form-control" name="category_id">
                                @foreach ($category as $catitem)
                                    <option value="{{ $catitem->id }}">{{ $catitem->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">

                    </div>
                    <div class="mb-3">
                        <label for="">Slug</label>
                        <input type="text" name="slug" value="{{ old('slug') }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea name="description" id="my_summernote" class="form-control" value="{{ old('description') }}"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">YT Frame</label>
                        <input type="text" name="yt_frame" value="{{ old('yt_frame') }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" name="meta_title" value="{{ old('meta_title') }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" class="form-control" value="{{ old('meta_description') }}"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Keyword</label>
                        <textarea name="meta_keyword" class="form-control" value="{{ old('meta_keyword') }}"></textarea>
                    </div>
                    <div class="row">
                        <h6>Status Mode</h6>
                        <div class="col-md-3 mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status">
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Save Post</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>



    </div>

@endsection
