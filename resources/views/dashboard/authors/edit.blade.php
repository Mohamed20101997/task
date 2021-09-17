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
                        <div class="col-md-4">
                            {{-- site name --}}
                            <div class="form-group">
                                <label>Facebook</label>
                                <input type="url" name="social_links[facebook]" class="form-control" value="{{ old("social_links[facebook]",!empty($linkes['facebook']) ? $linkes['facebook'] : '') }}">
                                @error("social_links[facebook]")
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col site name --}}
                        <div class="col-md-4">
                            {{-- site name --}}
                            <div class="form-group">
                                <label>Youtube</label>
                                <input type="url" name="social_links[youtube]" class="form-control" value="{{ old("social_links[youtube]",!empty($linkes['youtube']) ? $linkes['youtube']: '') }}">
                                @error("social_links[youtube]")
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col site name --}}
                        <div class="col-md-4">
                            {{-- site name --}}
                            <div class="form-group">
                                <label>Instagram</label>
                                <input type="url" name="social_links[instagram]" class="form-control" value="{{ old("social_links[instagram]",!empty($linkes['instagram']) ? $linkes['instagram']: '') }}">
                                @error("social_links[instagram]")
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col site name --}}
                    </div> {{-- end of row --}}

                    <div class="row">
                        <div class="col-md-4">
                            {{-- site name --}}
                            <div class="form-group">
                                <label>LinkedIn</label>
                                <input type="url" name="social_links[linkedin]" class="form-control" value="{{ old("social_links[linkedin]",!empty($linkes['linkedin']) ? $linkes['linkedin']: '') }}">
                                @error("social_links[linkedin]")
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col site name --}}
                        <div class="col-md-4">
                            {{-- site name --}}
                            <div class="form-group">
                                <label>Twitter</label>
                                <input type="url" name="social_links[twitter]" class="form-control" value="{{ old("social_links[twitter]",!empty($linkes['twitter'] ) ? $linkes['twitter'] : '') }}">
                                @error("social_links[twitter]")
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col site name --}}
                        <div class="col-md-4">
                            {{-- site name --}}
                            <div class="form-group">
                                <label>Gmail</label>
                                <input type="email" name="social_links[gmail]" class="form-control" value="{{ old("social_links[gmail]",!empty($linkes['gmail']) ? $linkes['gmail']: '') }}">
                                @error("social_links[gmail]")
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col site name --}}
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
