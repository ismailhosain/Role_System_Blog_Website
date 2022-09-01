@extends('layouts.master')

@section('title', 'Categories')

@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Categories</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Categories</li>
        </ol>
        @if (session('messege'))
            <div class="alert alert-success" role="alert">
                {{ session('messege') }}
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-danger" role="alert">
                {{ session('status') }}
            </div>
        @endif


        <table id="myTable" class="table table-bordered">
            <thead>
                <tr>
                    <td>Category Id</td>
                    <td>Category Name</td>
                    <td>Image</td>
                    <td>Status</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td><img src="{{ asset('upload/category/' . $item->image) }}" width="50" height="50"></td>
                        <td>{{ $item->status == 1 ? 'Hidden' : 'shown' }}</td>
                        <td><a href="{{ url('admin/edit_category/' . $item->id) }}" class="btn btn-primary">Edit</a></td>
                        <td><a href="{{ url('admin/delete_category/' . $item->id) }}" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

@endsection
