@extends('layouts.dashboard.app')

@section('content')

    <h1>Articles</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item" active>Articles</li>
    </ul>


    <div class="row">
        <div class="col-md-12">
            <div class="tile mb-4">
                <form action="">
                    <div class="row">

                        <div class="col-4">
                            <div class="form-group">
                                <input type="text" autofocus name="search" placeholder="search" class="form-control" value="{{ request()->search }}">
                            </div>
                        </div>

                        <div class="col-4">
                            <select name="category" class="form-control">
                                <option value="">All Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ request()->category_id == $category->id ? 'selected' : '' }}> {{ $category->name }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-success"><i class="fa fa-search"></i>Search</button>
                            <a href="{{ route('article.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
                        </div> <!-- end of col 12 -->

                    </div> <!-- end of row -->

                </form> <!-- end of form -->

                <div class="row">
                    <div class="col-md-12">
                        @if (count($articles) > 0)
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>category</th>
                                    <th>Image</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Pinned</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($articles as $index=>$article)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $article->name }}</td>
                                        <td>{{ $article->author->name }}</td>
                                        <td>{{ $article->category->name }}</td>
                                        <td>
                                            <img src="{{image_path($article->image)}}" id="blah" width="50px" alt="your image" height="50px">
                                        </td>

                                        <td>
                                            <span class="badge bg-primary p-2 text-white">{{date("d-m-y:H-m-s", strtotime($article->date)) }}</span>
                                        </td>

                                        <td><span class="badge bg-secondary p-2 text-white">{{$article->status($article->status)}}</span></td>

                                        <td><span class="badge bg-primary p-2 text-white">{{$article->status($article->pinned)}}</span></td>

                                        <td>
                                            <a href="{{ route('article.edit', $article->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Edit</a>

                                            <form method="post" action={{ route('article.destroy', $article->id)}} style="display:inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i>Delete</button>
                                            </form> <!-- end of form -->
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {{ $articles->appends(request()->query())->links() }}

                        @else
                            <h3 class="alert alert-info text-center d-flex justify-content-center" style="margin: 0 auto; font-weight: 400"><i class="fa fa-exclamation-triangle"></i> Sorry no records found</h3>
                        @endif
                    </div> <!-- end of col-md-12 -->
                </div> <!-- end of row -->

            </div> <!-- end of tile -->

        </div> {{-- end of col  --}}
    </div> {{-- end of row  --}}
@endsection
