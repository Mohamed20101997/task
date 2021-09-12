@extends('layouts.dashboard.app')

@section('content')
<h1>Articles</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Articles</a></li>
        <li class="breadcrumb-item" active>Add</li>
    </ul>


<div class="row">
    <div class="col-md-12">

        <div class="tile mb4">
            <form method="POST" action="{{ route('article.store') }}" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-md-4">
                        {{-- name --}}
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>{{-- end of col name --}}

                    <div class="col-md-4">
                        {{-- category --}}
                        <div class="form-group">
                            <label>Category</label>
                                <select name="category_id" class="form-control select2">
                                    @foreach ($categories as $category)
                                        <option {{ old('category_id') == $category->id ? "selected" : "" }}  value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            @error('category_id')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div> {{-- end of col category--}}

                    <div class="col-md-4">
                        {{-- date --}}
                        <div class="form-group">
                            <label>Date</label>
                            <input type="datetime-local" name="date" class="form-control" value="{{old('date')}}">
                            @error('date')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div> {{-- end of col date--}}

                </div> {{-- end of row --}}


                <div class="row">
                    <div class="col-md-4">
                        {{-- authors --}}
                        <div class="form-group">
                            <label>Authors</label>
                            <select name="author_id" class="form-control select2">
                                @foreach ($authors as $author)
                                    <option {{ old('author_id') == $author->id ? "selected" : "" }}  value="{{ $author->id }}">{{ $author->name }}</option>
                                @endforeach
                            </select>
                            @error('author_id')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div> {{-- end of col authors--}}

                    <div class="col-md-4">
                        {{-- status --}}
                        <div class="form-group">
                            <label>Status</label>
                            <div class="toggle-flip">
                                <label><input type="checkbox" value="1" name="status" data-color="success" checked>
                                    <span class="flip-indecator" data-toggle-on="Active" data-toggle-off="Not Active"></span>
                                </label>
                            </div>
                        </div>
                    </div>{{-- end of col status--}}

                    <div class="col-md-4">
                        {{-- image --}}
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                            @error('image')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>{{-- end of col image --}}


                </div>{{-- end of row --}}

                <div class="row">
                    {{-- Tags  --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tags</label>
                            <select name="tag_id[]" class="form-control select2" multiple>
                                @foreach ($tags as $tag)
                                    <option {{ (collect(old('tag_id'))->contains($tag->id)) ? 'selected':'' }}  value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            @error('tag_id')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>{{-- end of col Tags --}}

                </div>{{-- end of row --}}

                <div class="row">
                    <div class="col-md-12">
                        {{-- Description --}}
                        <div class="form-group">
                            <label>Description</label>
                            <textarea id="summernote" class="form-control" name="description" rows="50" cols="50"> {!! old('description') !!} </textarea>
                            @error('description')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div> {{-- end of col website--}}


                </div> {{-- end of row --}}

                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Add</button>
                </div>

            </form>

        </div> {{-- end of tile  --}}

    </div> {{-- end of col  --}}
</div> {{-- end of row  --}}


@endsection
