<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .card-img-top {
            width: 100%;
            height: 270px;
        }
    </style>
    <title>Laravel</title>
</head>

<body>
    @extends('layouts.main')

    @section('content')

    <main class="container">
        <div class="row mb-2">
            <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    @foreach ($randomPosts as $post)
                    <div class="carousel-item active" data-bs-interval="5000">
                        <a href="{{ route('post.show', $post->id) }}">
                            <img src="{{ 'storage/' . $post->image }}" class="d-block w-100" alt="blog post">
                        </a>
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="blog-post-title">{{ $post->title }}</h1>
                        </div>
                    </div>
                    @endforeach

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <h1 class="text-center">All posts</h1>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($posts as $post)
                <div class="col">
                    <div class="card shadow-sm">
                        <a href="{{ route('post.show', $post->id) }}">
                            <img src="{{ 'storage/' . $post->image }}" class="card-img-top" alt="blog post">
                        </a>
                        <div class="card-body">
                            <p class="card-text">{{ $post->category->title }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('post.show', $post->id) }}">
                                    <h6 class="blog-post-title">{{ $post->title }}</h6>
                                </a>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>

            <div class="mt-3">
                {{ $posts->links() }}
            </div>


            <h1 class="text-center">Popular posts</h1>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                @foreach ($likedPosts as $post)
                <div class="col">
                    <div class="card shadow-sm">
                        <a href="{{ route('post.show', $post->id) }}">
                            <img src="{{ 'storage/' . $post->image }}" class="card-img-top" alt="blog post">
                        </a>
                        <div class="card-body">
                            <p class="card-text">{{ $post->category->title }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('post.show', $post->id) }}">
                                    <h6 class="blog-post-title">{{ $post->title }}</h6>
                                </a>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
        </div>
    </main>
    @endsection
</body>

</html>