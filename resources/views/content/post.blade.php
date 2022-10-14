@extends('master')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">

                       <h3> category: {{ $post->category->name }}</h3>

                </header>
                <!-- Preview image figure
                <figure class="mb-4"><img class="img-fluid rounded" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." /></figure> -->
                <!-- Post content-->



                <section class="mb-5">
                    @if ($post->url)
                    <figure class="mb-4"><img class="img-fluid rounded" src="http://127.0.0.1:8000/upload/{{ $post->url }}" alt="..." /></figure>
                   @endif
                    <h2 class="fw-bolder mb-4 mt-5">{{$post->title }}</h2>
                    <p class="fs-5 mb-4">{{ $post->body }}</p>

                </section>

            </article>
            <!-- Comments section-->
            <section class="mb-5">
                <div class="card bg-light">
                    <div class="card-body">
                        <!-- Comment form-->
                        @if($stop_comment == 1)
                        <h3>sorry, comments for this post are disabled</h3>
                        @else
                        <form method="POST" action="/posts/{{ $post->id }}/store" class="mb-4">
                            {{ csrf_field() }}
                            <textarea name="body" class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea>
                            <input type="submit" name="leave a comment" class="btn btn-primary" style="padding: 5px; margin:5px;">
                        </form>

                        @endif

                            <!-- Single comment-->


                        @foreach ($post->comments as $comment)

                        <div class="d-flex" style="padding: 5px; margin:5px;">
                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                            <div class="ms-3">
                                <div class="fw-bold">Commenter Name</div>
                                {{ $comment->body }}
                            </div>
                            <p>
                                <small> posted on {{ $post->created_at->toDayDateTimeString() }}</small>
                            </p>
                        </div>


                        @endforeach



                    </div>
                </div>
            </section>
        </div>
@endsection

