@extends('layouts.main')

@section('content')

<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">Tags</h1>

        <ul class="list-group w-50">
            @foreach ($tags as $tag)
            <li class="list-group-item"><a href="{{ route('tag.post.index', $tag->id) }}">{{ $tag->title }}</a></li>
            @endforeach
        </ul>

    </div>

</main>
@endsection