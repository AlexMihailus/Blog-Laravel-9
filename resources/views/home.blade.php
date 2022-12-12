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
                <h3 class="card-title">{{ $likedCount }}</h3>
                <a href="{{ route('likes.index') }}" class="btn btn-primary">Liked posts</a>
            </div>
        </div>
        <div class="card mb-3" style="max-width: 18rem;">

            <div class="card-body">
                <h3 class="card-title">{{ $commentsCount }}</h3>
                <a href="{{ route('comments.index') }}" class="btn btn-primary">Comments</a>
            </div>
        </div>
    </div>
</div>

@endsection