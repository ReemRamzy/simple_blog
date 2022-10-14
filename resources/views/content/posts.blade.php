@extends('master')
@extends('content.sidebar')

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



                    @if (Auth::check())
                    @if (Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Editor'))
                    <h3>Add a new post</h3>
                    <form method="POST" action="/posts/store" enctype="multipart/form-data" style="padding: 5px; margin:5px;">
                        {{ csrf_field() }}

                          <label for="title">Post Title</label>
                          <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp" >

                          <label for="body">Add your content</label>
                          <textarea type="text" class="form-control" id="body"  name="body" cols="40" rows="5"></textarea>


                          <label for="url">upload post image</label>
                          <input type="file" class="form-control-file" name="url" id="url" style="padding: 5px; margin:5px;">



                          <input type="submit" name="submit" class="btn btn-primary" style="padding: 5px; margin:5px;">

                          <select class="form-select" aria-label="Default select example" name="category_id" >
                            <option selected>select a category</option>
                            @foreach ($categories as $category )
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                          </select>

                        </form>
                        @endif

                        @else
                            <div class="container">
                               <q>  login as Admin/Editor to add new posts </q>
                            </div>
                        @endif
        <div>

            @foreach ($errors->all() as $error)
             <div style="background-color: red;">
                {{ $error }}
                </div>   <br>
            @endforeach
        </div>
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
                        <small> posted on {{ $post->created_at->toDayDateTimeString() }}</small>
                        <hr>
                        <strong> {{ $post->category->name}} </strong>
                    </p>
                    @php
                    $like_count =0;
                    $dislike_count=0;
                    $like_status="btn-secondry";
                    $dislike_status="btn-secondry";
                @endphp
                    @foreach ($post->likes as $like)
                    @php
                       if($like->like == 1)
                           $like_count++;

                       if($like->like == 0)
                           $dislike_count++;

                       if(Auth::check())
                     {
                       if($like-> like == 1 &&  $like->user_id == Auth::user()->id )

                            $like_status="btn-success";

                    if($like-> like == 0 &&  $like->user_id == Auth::user()->id )

                            $dislike_status="btn-danger";

                     }

                    @endphp
                    @endforeach
            <button type="button" data-postid="{{ $post->id }}_L"  data-like="{{ $like_status }}" class="like btn {{ $like_status }}">like
                <b><span class="like_count">{{ $like_count }}</span></b>
                <span><i class="fa-regular fa-thumbs-up"></i></span></button>

            <button type="button" data-postid="{{ $post->id }}_D"  class="dislike btn {{ $dislike_status }}">dislike
                <b><span class="dislike_count">{{ $dislike_count }}</span></b>
                <span><i class="fa-regular fa-thumbs-down"></i></span></button>
            <hr>

                </section>

                @endforeach
            </article>

        </div>

@endsection
