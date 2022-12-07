@extends('personal.layouts.main')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-6 mt-3">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Admin</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container text-center">
    <div class="row align-items-center justify-content-around">
        <div class="card mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <h3 class="card-title">{{ $data['usersCount'] }}</h3>
                <a href="{{ route('users.index') }}" class="btn btn-primary">Users</a>
            </div>
        </div>
        <div class="card mb-3" style="max-width: 18rem;">

            <div class="card-body">
                <h3>{{ $data['postsCount'] }}</h3>
                <a href="{{ route('posts.index') }}" class="btn btn-primary">Posts</a>
            </div>
        </div>
        <div class="card mb-3" style="max-width: 18rem;">

            <div class="card-body">
            <h3>{{ $data['categoriesCount'] }}</h3>
            <a href="{{ route('categories.index') }}" class="btn btn-primary">Categories</a>
            </div>
        </div>
        <div class="card mb-3" style="max-width: 18rem;">

            <div class="card-body">
            <h3>{{ $data['tagsCount'] }}</h3>
            <a href="{{ route('tags.index') }}" class="btn btn-primary">Tags</a>
            </div>
        </div>

    </div>
</div>

@endsection