@extends('layouts.front.app')

@section('content')
    <div class="col-lg-8">
        <!-- Post content-->
        <article>
            <!-- Post header-->
            <header class="mb-4">
                <!-- Post title-->
                <h1 class="fw-bolder mb-1">{{$article->title}}</h1>
                <!-- Post meta content-->
                <div class="text-muted fst-italic mb-2">Posted on {{ $article->created_at->toFormattedDateString() }} </div>

                <!-- Post categories-->
                <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{$article->category->name}}</a>

            </header>
            <!-- Preview image figure-->
            <figure class="mb-4"><img id="imgRead" class="img-fluid rounded" src="{{image_path($article->image)}}" alt="..." /></figure>
            <!-- Post content-->
            <section class="mb-5">
                <p class="fs-5 mb-4">{{$article->description}}</p>

        </article>
        <!-- Comments section-->
        <section class="mb-5">
            <div class="card bg-light">
                <div class="card-body">
                    <!-- Comment form-->
                    <form class="mb-4" action="{{route('comment')}}" method="post">
                        @csrf
                        @method('post')

                        @error('comment')
                            <p class="text-danger">{{$message}}</p>
                        @enderror

                        <input type="hidden" name="article_id" value="{{$article->id}}">

                        <textarea name="comment" class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea>
                        <button type="submit" class="btn btn-primary btn-sm mt-2"> Comment </button>
                    </form>
                    <!-- Comment with nested comments-->
                    @if($comments->count() > 0)
                        @foreach($comments as $comment)
                            <div class="d-flex mb-4">
                                <!-- Parent comment-->
                                <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                <div class="ms-3">
                                    <div class="fw-bold">{{$comment->user->name}} <span class="fw-normal"> {{ $comment->created_at->toFormattedDateString() }}</span></div> {{$comment->comment}}
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection
