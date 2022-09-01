@extends('layouts.master')

@section('title', 'Posts')

@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Posts</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Posts</li>
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
                    <td>Id</td>
                    <td>Category Name</td>
                    <td> Name</td>
                    <td>Status</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($getpost as $postitem)
                    <tr>
                        <td>{{ $postitem->id }}</td>
                        <td>{{ $postitem->category->name }}</td>{{-- model er function name bosce --}}
                        <td>{{ $postitem->name }}</td>
                        <td>{{ $postitem->status == 1 ? 'Hidden' : 'Visible' }}</td>
                        <td><a href="{{ url('admin/edit_post/' . $postitem->id) }}" class="btn btn-primary">Edit</a></td>
                        <td><a href="{{ url('admin/delete_post/' . $postitem->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

@endsection
