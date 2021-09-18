@extends('layouts.dashboard.app')

@section('content')

    <h1>Comments</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item" active>Comments</li>
    </ul>


    <div class="row">
        <div class="col-md-12">

            <div class="tile mb-4">
                <form action="">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" autofocus name="search" placeholder="search" class="form-control" value="{{ request()->search }}">
                            </div>
                        </div><!-- end of col 4 -->
                        <div class="col-4">
                            <select name="article_id" class="form-control">
                                <option value="">All Articles</option>
                                @foreach ($articles as $article)
                                    <option value="{{ $article->id }}" {{ request()->article_id == $article->id ? 'selected' : '' }}> {{ $article->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-success"><i class="fa fa-search"></i>Search</button>
                        </div> <!-- end of col 12 -->

                    </div> <!-- end of row -->
                </form> <!-- end of form -->
                <div class="row">
                        @if ($comments->count() > 0)
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>email</th>
                                    <th>comment</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($comments as $index=>$comment)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $comment->name }}</td>
                                        <td>{{ $comment->email }}</td>
                                        <td>{{ $comment->comment }}</td>

                                        <td>
                                            <a data-url="{{ route('comment.show', $comment->id) }}" data-id="{{$comment->id}}" id="show" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a>
                                            <form method="post" action={{ route('comment.destroy', $comment->id)}} style="display:inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button>
                                            </form> <!-- end of form -->
                                        </td>
                                    </tr>
                                        <div class="modal fade" id="model_{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>
                                @endforeach
                                </tbody>
                            </table>

                            {{ $comments->appends(request()->query())->links() }}

                        @else
                            <h3 class="alert alert-info text-center d-flex justify-content-center" style="margin: 0 auto; font-weight: 400"><i class="fa fa-exclamation-triangle"></i> Sorry no records found</h3>
                        @endif
                    </div> <!-- end of col-md-12 -->
                </div> <!-- end of row -->

            </div> <!-- end of tile -->

        </div> {{-- end of col  --}}
    </div> {{-- end of row  --}}
@endsection


@push('js')
<script>
    //for show extra model
    $(document).on('click', '#show', function (event) {
        event.preventDefault();
        let url = $(this).data('url');
        let id = $(this).data('id');
        $.ajax({
            url: url,
            data: {
                id: id,
            },
            method: 'GET',
            success: function (data) {
                $('#model_' + id).html(data);
                $('#model_' + id).modal('show');
            },
        });
    });
</script>
@endpush
