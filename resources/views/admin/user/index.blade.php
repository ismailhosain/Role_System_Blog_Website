@extends('layouts.master')

@section('title', 'Users')

@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Users</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Users</li>
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
                    <td>User Id</td>
                    <td>User Name</td>
                    <td>Email</td>
                    <td>Role</td>
                    <td>Edit</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            @if ($item->role_as == 1)
                                {{ 'Admin' }}
                            @elseif($item->role_as == 0)
                                {{ 'User' }}
                            @else
                                {{ 'Blogger' }}
                            @endif
                        </td>

                        <td><a href="{{ url('admin/user_edit/' . $item->id) }}" class="btn btn-primary">Edit</a></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

@endsection
