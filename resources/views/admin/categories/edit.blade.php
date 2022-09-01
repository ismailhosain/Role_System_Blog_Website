@extends('layouts.master')

@section('title', 'Edit Categories')

@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Add category</li>
        </ol>
        <div class="card">
            <div class="card-header">
                <h5>Edit Category</h5>

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

            <form method="POST" action="{{ url('admin/update_category/' . $category->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ $category->name }}" class="form-control">

                    </div>
                    <div class="mb-3">
                        <label for="">Slug</label>
                        <input type="text" name="slug" value="{{ $category->slug }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea name="description" id="my_summernote" class="form-control">{{ $category->description }}</textarea>

                    </div>
                    <div class="mb-3">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control">
                        <img src="{{ url('upload/category/' . $category->image) }}" alt="" width="100" height="100" class="mt-3">
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" name="meta_title" value="{{ $category->meta_title }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" class="form-control">{{ $category->meta_description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Keyword</label>
                        <textarea name="meta_keyword" class="form-control">{{ $category->meta_keyword }}</textarea>
                    </div>
                    <div class="row">
                        <h6>Status Mode</h6>

                        <div class="col-md-3 mb-3">
                            <label for="">Navbar Status Hidden</label>
                            <input type="checkbox" name="navbar_status"
                                {{ $category->navbar_status == '1' ? 'checked' : '' }}>

                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="">Status Hidden</label>
                            <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked' : '' }}>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>



    </div>

@endsection
