@extends('layouts.main')

@section('content')

<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">Categories</h1>

        <ul class="list-group w-50">
            @foreach ($categories as $category)
            <li class="list-group-item"><a href="{{ route('category.post.index', $category->id) }}">{{ $category->title }}</a></li>
            @endforeach
        </ul>

    </div>

</main>
@endsection