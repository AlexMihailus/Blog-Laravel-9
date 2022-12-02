@extends('admin.layouts.main')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-6 mt-3">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Posts</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<h3>Add post</h3>
<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3 w-25">
        <input type="text" class="form-control" name="title" placeholder="Name post" value="{{ old('title') }}">
        @error('title')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <textarea name="content">

        {{ old('content') }}
        </textarea>
        @error('content')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3 mt-3">
        <label for="formFile" class="form-label">Choose image</label>
        <input class="form-control" type="file" id="formFile" name="image">
        @error('image')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group w-50">
        <label>Select category</label>
        <select name="category_id" class="form-control">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? ' selected' : '' }}>{{ $category->title }}</option>
            @endforeach
        </select>
    </div>

    <input type="submit" class="btn btn-primary mt-3" value="Add post">
</form>

@endsection