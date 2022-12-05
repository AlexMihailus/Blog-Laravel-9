@extends('admin.layouts.main')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-6 mt-3">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                    <li class="breadcrumb-item active">{{ $user->name }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="card mt-3 w-50">
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tbody>
                <tr>
                    <td>ID</td>
                    <td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{ $user->name }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="col-sm-6 d-flex align-items-center justify-content-around mt-3">
    <h1 class="m-0 mr-2">{{ $user->name }}</h1>
    <a href="{{ route('users.edit', $user->id)}}" class="btn btn-primary mr-2">Edit</a>
    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-primary mr-2">
        Delete
        </button>
    </form>
</div>

@endsection