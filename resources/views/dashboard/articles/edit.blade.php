@extends('layouts.dashboard.app')

@section('content')

<h1>Articles</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Articles</a></li>
        <li class="breadcrumb-item" active>edit</li>
    </ul>


    <div class="row">
        <div class="col-md-12">
            <div class="tile mb4">
                <form class="form"  method="post" action="{{ route('article.update', $article->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input name="id" value="{{$article->id}}" type="hidden">
                    <div class="row">
                        <div class="col-md-3">
                            {{-- title --}}
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $article->name) }}">
                                @error('title')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col title --}}

                        <div class="col-md-3">
                            {{-- category --}}
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category_id" class="form-control select2">
                                    @foreach ($categories as $category)
                                        <option {{ old('category_id',$article->category_id) == $category->id ? "selected" : "" }}  value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div> {{-- end of col category--}}
                        <div class="col-md-3">
                        {{-- type --}}
                        <div class="form-group">
                            <label>types</label>
                            <select name="type_id" class="form-control select2">
                                <option value="">Choose Type</option>
                                @foreach ($types as $type)
                                    <option {{ old('type_id',$article->type->id) == $type->id ? "selected" : "" }}  value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                            @error('type_id')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            </div>
                        </div> {{-- end of col type--}}
                        <div class="col-md-3">
                            {{-- image --}}
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                                @error('image')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col image --}}


                    </div> {{-- end of row --}}


                    <div class="row">
                        {{-- Tags  --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tags</label>
                                <select name="tag_id[]" class="form-control select2" multiple>
                                    @foreach ($tags as $tag)
                                        <option {{ old('tag_id', $article->tag->tag_id) == $tag->id  ? 'selected':'' }}  value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                                @error('tag_id')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col Tags --}}

                    </div>

                    <div class="row">

                        <div class="col-md-12">
                            {{-- Description --}}
                            <div class="form-group">
                                <label>Description</label>

                                <textarea id="summernote" class="form-control" name="description"> {!! old('description',$article->description) !!} </textarea>

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

            </div>{{-- end of tile  --}}

        </div> {{-- end of col  --}}
    </div> {{-- end of row  --}}
@endsection
