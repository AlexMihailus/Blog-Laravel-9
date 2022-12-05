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

<form action="{{ route('users.update', $user->id) }}" method="POST" class="w-25">
    @csrf
    @method('PATCH')
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="name" placeholder="Name user" value="{{ $user->name }}">
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}">
        @error('email')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <input type="submit" class="btn btn-primary" value="Update">
</form>

@endsection