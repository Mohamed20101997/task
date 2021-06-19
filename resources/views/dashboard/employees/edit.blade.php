@extends('layouts.dashboard.app')

@section('content')

<h1>Employee</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('employee.index') }}">Employee</a></li>
        <li class="breadcrumb-item" active>edit</li>
    </ul>


    <div class="row">
        <div class="col-md-12">

            <div class="tile mb4">
                <form class="form" action="{{route('employee.update', $employee->id)}}"
                      method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input name="id" value="{{$employee->id}}" type="hidden">

                    <div class="row">
                        <div class="col-md-4">

                            {{-- first_name --}}
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="first_name" class="form-control" value="{{ old('first_name',$employee->first_name) }}">
                                @error('first_name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col first_name --}}

                        <div class="col-md-4">

                            {{-- last_name --}}
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="{{ old('last_name',$employee->last_name) }}">
                                @error('last_name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col last_name --}}

                        <div class="col-md-4">
                            {{-- email --}}
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email',$employee->email) }}">
                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div> {{-- end of col email--}}
                    </div> {{-- end of row --}}

                    <div class="row">

                        <div class="col-md-6">
                            {{-- phone --}}
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone',$employee->phone) }}">
                                @error('phone')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col logo --}}

                        <div class="col-md-6">
                            {{-- companies --}}
                            <div class="form-group">
                                <label> companies </label>
                                <select name="company_id" class="form-control select2">
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}" {{$employee->company_id == $company->id ? 'selected' : ''}}>{{ $company->name }}</option>
                                    @endforeach
                                </select>

                                @error('company_id')
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