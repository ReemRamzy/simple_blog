@extends('master')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header -->
                <header class="mb-4">
                    {{-- <!-- Post title-->
                    <h1 class="fw-bolder mb-1">Welcome to Blog Post!</h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">Posted on January 1, 2022 by Start Bootstrap</div>
                    <!-- Post categories-->
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a> --> --}}
@if ( $categories->name )
<h3>{{ $categories->name }}</h3>
@endif


                </header>


                <!-- Post content-->
                @foreach ($posts as $post)


                <section class="mb-5">

                    <h2 class="fw-bolder mb-4 mt-5">
                        <a href="/posts/{{ $post->id }}">{{$post->title }}</a>
                        <hr>
                        <div>
                            @if ($post->url)
                        <img src="http://127.0.0.1:8000/upload/{{ $post->url }}" alt="..." class="img-thumbnail">
                            @endif
                    </div>
                    </h2>
                    <p class="fs-5 mb-4">{{ $post->body }}</p>
                    <p>
                        <small> posted on {{ $post->created_at }}</small>
                    </p>

                </section>

                @endforeach
            </article>


        </div>

@endsection
