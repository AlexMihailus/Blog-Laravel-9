@extends('layouts.main')

@section('content')
<main class="blog-post">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
        <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">{{ $date->format('F') }} {{ $date->day }}, {{ $date->year }}, {{ $date->format('H:i') }}, {{ $post->comments->count()}} Comments</p>
        <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
            <img src="{{ asset('storage/' . $post->image) }}" alt="featured image" class="w-100">
        </section>
        <section class="post-content">
            <div class="row">
                <div class="col-lg-12 mt-3">
                    <h5>{!! $post->content !!}</h5>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <h1 class="text-center">Related Posts</h1>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                    @foreach ($relatedPosts as $relatedPost)
                    <div class="col">
                        <div class="card shadow-sm">
                            <a href="{{ route('post.show', $relatedPost->id) }}">
                                <img src="{{ asset('storage/' . $relatedPost->image) }}" class="card-img-top" alt="blog post">
                            </a>
                            <div class="card-body">
                                <p class="card-text">{{ $relatedPost->category->title }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{ route('post.show', $relatedPost->id) }}">
                                        <h6 class="blog-post-title">{{ $relatedPost->title }}</h6>
                                    </a>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <section class="mb-5">

                    <h3 class="mb-5 mt-3">
                        Comments <span class="badge text-bg-info">{{ $post->comments->count() }}</span>
                    </h3>

                    @foreach ($post->comments as $comment)
                    <div class="mb-3">
                        <span>
                            <div>
                            <span class="badge rounded-pill text-bg-info">{{ $comment->user->name }}</span>
                                <span>{{ $comment->dateAsCarbon->diffForHumans() }}</span>
                            </div>

                        </span>
                        <h5 class="mt-3">{{ $comment->message }}</h5>
                    </div>
                    @endforeach
                </section>
                @auth()
                <section class="comment-section">
                    <h2 class="section-title mb-5" data-aos="fade-up">Leave a Reply</h2>
                    <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12" data-aos="fade-up">
                                <label for="comment" class="sr-only">Comment</label>
                                <textarea name="message" id="comment" class="form-control" placeholder="Comment" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-3">
                                <input type="submit" value="Send Message" class="btn btn-info">
                            </div>
                        </div>
                    </form>
                </section>
                @endauth






            </div>
        </div>
    </div>
</main>
@endsection