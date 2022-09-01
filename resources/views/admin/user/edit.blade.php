@extends('layouts.master')

@section('title', 'Edit User')

@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit User</li>
        </ol>
        <div class="card">
            <div class="card-header">
                <h5>Edit User</h5>

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

            <div class="card-body">
                <form action="{{ url('admin/user_update/' . $user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">User Name</label>
                        <p class="form-control"> {{ $user->name }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <p class="form-control">{{ $user->email }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="">Created At</label>
                        <p class="form-control">{{ $user->created_at->format('d-m-y') }}</p>
                    </div>
                    <div class="mb-3">
                        <select name="roles" id="" class="form-control">
                            <option value="1" {{ $user->role_as == '1' ? 'selected' : '' }}>Admin</option>
                            <option value="0" {{ $user->role_as == '0' ? 'selected' : '' }}>User</option>
                            <option value="2" {{ $user->role_as == '2' ? 'selected' : '' }}>Blogger</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="submit" class="btn btn-primary"> Update Role</button>
                    </div>

                </form>
            </div>

            </form>

        </div>



    </div>

@endsection
