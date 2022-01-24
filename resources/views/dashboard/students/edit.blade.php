@extends('layouts.dashboard.app')

@section('content')

<h1>Students</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Students</a></li>
        <li class="breadcrumb-item" active>edit</li>
    </ul>


    <div class="row">
        <div class="col-md-12">

            <div class="tile mb4">
                <form class="form" action="{{route('student.update', $student->id)}}"
                      method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input name="id" value="{{$student->id}}" type="hidden">

                    <div class="row">
                        <div class="col-md-3">
                            {{-- f_Name --}}
                            <div class="form-group">
                                <label>first Name</label>
                                <input type="text" name="f_name" class="form-control" value="{{ old('f_name', $student->f_name) }}">
                                @error('f_name')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col f_name --}}
                        <div class="col-md-3">
                            {{-- s_Name --}}
                            <div class="form-group">
                                <label>Second Name</label>
                                <input type="text" name="s_name" class="form-control" value="{{ old('s_name',$student->s_name) }}">
                                @error('s_name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col s_name --}}
                        <div class="col-md-3">
                            {{-- t_Name --}}
                            <div class="form-group">
                                <label>Third Name</label>
                                <input type="text" name="t_name" class="form-control" value="{{ old('t_name',$student->t_name) }}">
                                @error('t_name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col t_name --}}
                        <div class="col-md-3">
                            {{-- l_Name --}}
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="l_name" class="form-control" value="{{ old('l_name',$student->l_name) }}">
                                @error('l_name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col l_name --}}
                    </div> {{-- end of row --}}
                    <div class="row">
                        <div class="col-md-4">
                            {{-- Email --}}
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email',$student->email) }}">
                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col email --}}
                        <div class="col-md-4 mt-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Edit</button>
                            </div>
                        </div>
                    </div>

                </form>

            </div>{{-- end of tile  --}}

        </div> {{-- end of col  --}}

    </div> {{-- end of row  --}}

@endsection
