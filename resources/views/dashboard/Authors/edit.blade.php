@extends('layouts.dashboard.app')

@section('content')

<h1>Author</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('author.index') }}">Author</a></li>
        <li class="breadcrumb-item" active>edit</li>
    </ul>


    <div class="row">
        <div class="col-md-12">

            <div class="tile mb4">
                <form class="form" action="{{route('author.update', $author->id)}}"
                      method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input name="id" value="{{$author->id}}" type="hidden">

                    <div class="row">
                        <div class="col-md-6">
                            {{-- name --}}
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name',$author->name) }}">
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col name --}}

                        <div class="col-md-6">
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

                        <div class="col-md-12">
                            {{-- brief --}}
                            <div class="form-group">
                                <label>Brief</label>

                                <textarea id="summernote" class="form-control" name="brief"> {!! old('brief',$author->brief) !!} </textarea>

                                @error('brief')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div> {{-- end of col brief--}}


                    </div> {{-- end of row --}}

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>Edit</button>
                    </div>

                </form>

            </div>{{-- end of tile  --}}

        </div> {{-- end of col  --}}

    </div> {{-- end of row  --}}

@endsection
