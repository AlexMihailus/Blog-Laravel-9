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
                    {!! $post->content !!}
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-lg-9 mx-auto">
            <h1 class="text-center">Related Posts</h1> 
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                @foreach ($relatedPosts as $post)
                <div class="col">
                    <div class="card shadow-sm">
                        <a href="{{ route('post.show', $post->id) }}">
                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="blog post">
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

                



                <section class="comment-section">
                    <h2 class="section-title mb-5" data-aos="fade-up">Leave a Reply</h2>
                    <form action="/" method="post">
                        <div class="row">
                            <div class="form-group col-12" data-aos="fade-up">
                                <label for="comment" class="sr-only">Comment</label>
                                <textarea name="comment" id="comment" class="form-control" placeholder="Comment" rows="10">Comment</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6" data-aos="fade-right">
                                <label for="name" class="sr-only">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name*">
                            </div>
                            <div class="form-group col-md-6" data-aos="fade-up">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email*" required>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-12 mt-3" data-aos="fade-up">
                                <input type="submit" value="Send Message" class="btn btn-warning">
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</main>
@endsection