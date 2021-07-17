@extends('layouts.front.app')

@section('content')
    <!-- Blog entries-->
    <div class="col-lg-8">
        <!-- Nested row for non-featured blog posts-->
        <div class="row">
            <!-- Blog post-->
            @if($articles->count() > 0 )
                @foreach($articles as $article)
                    <!-- Blog post-->
                        <div class="col-lg-6">
                            <div class="card mb-4">
                                <a href="#!"><img id="imgHome" class="card-img-top" src="{{image_path($article->image)}}" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">January 1, 2021</div>
                                    <h2 class="card-title h4">{{$article->title}}</h2>

                                    <p id="desHome" class="card-text">{{ Str::words($article->description ,10,'...') }}</p>

                                    <a class="btn btn-primary" href="{{route('read',$article->id)}}">Read more →</a>
                                </div>
                            </div>
                        </div>
                @endforeach
            @else
                <div class="alert alert-primary">No Articles yet ..</div>
            @endif
        </div>
        <!-- Pagination-->
        <nav aria-label="Pagination">
            <hr class="my-0" />
            <ul class="pagination justify-content-center my-4">
                {{ $articles->appends(request()->query())->links() }}
            </ul>
        </nav>
    </div>
@endsection
