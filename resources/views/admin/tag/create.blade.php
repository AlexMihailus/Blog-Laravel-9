@extends('admin.layouts.main')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-6 mt-3">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('tags.index') }}">Tags</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<form action="{{ route('tags.store') }}" method="POST" class="w-25">
    @csrf
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="title" placeholder="Name tag">
        @error('title')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <input type="submit" class="btn btn-primary" value="Add tag">
</form>

@endsection