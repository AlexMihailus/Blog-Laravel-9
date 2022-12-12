@extends('personal.layouts.main')
@section('content')

<main class="blog">
    <div class="container">
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-6 mt-3">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                    <li class="breadcrumb-item active">likes</li>
                </ol>
            </div>
        </div>
    </div>
</div>


        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach ($posts as $post)
            <div class="col">
                <div class="card shadow-sm">
                    <a href="{{ route('post.show', $post->id) }}">
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="blog post">
                    </a>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <p class="blog-post-category">{{ $post->category->title }}</p>
                            @auth()
                            <form action="{{ route('post.like.store', $post->id) }}" method="post">
                                @csrf
                                <span>{{ $post->liked_users_count }}</span>
                                <button type="submit" class="border-0 bg-transparent">

                                    @if (auth()->user()->likedPosts->contains($post->id))
                                    <span class="badge rounded-pill text-bg-danger">like</span>
                                    @else
                                    <span class="badge rounded-pill text-bg-dark">like</span>
                                    @endif
                                </button>
                            </form>
                            @endauth
                            @guest()
                            <div>
                                <span>{{ $post->liked_users_count }}</span>
                                <i class="far fa-heart"></i>
                            </div>
                            @endguest
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('post.show', $post->id) }}">
                                <h6 class="blog-post-title">{{ $post->title }}</h6>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>

@endsection