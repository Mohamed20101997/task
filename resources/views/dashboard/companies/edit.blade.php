@extends('layouts.dashboard.app')

@section('content')

<h1>Companies</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('company.index') }}">Companies</a></li>
        <li class="breadcrumb-item" active>edit</li>
    </ul>


    <div class="row">
        <div class="col-md-12">

            <div class="tile mb4">
                <form class="form" action="{{route('company.update', $company->id)}}"
                      method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input name="id" value="{{$company->id}}" type="hidden">

                    <div class="row">
                        <div class="col-md-6">
                            {{-- name --}}
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name',$company->name) }}">
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col name --}}

                        <div class="col-md-6">
                            {{-- email --}}
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email',$company->email) }}">
                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div> {{-- end of col email--}}


                    </div> {{-- end of row --}}

                    <div class="row">

                        <div class="col-md-6">
                            {{-- logo --}}
                            <div class="form-group">
                                <label>Logo</label>
                                <input type="file" name="logo" class="form-control">
                                @error('logo')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col logo --}}

                        <div class="col-md-6">
                            {{-- website --}}
                            <div class="form-group">
                                <label>website</label>
                                <input type="url" name="website" class="form-control" value="{{ old('email',$company->website) }}">
                                @error('website')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div> {{-- end of col website--}}

                    </div> {{-- end of row --}}

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>Edit</button>
                    </div>

                </form>

            </div>{{-- end of tile  --}}

        </div> {{-- end of col  --}}
    </div> {{-- end of row  --}}
@endsection
