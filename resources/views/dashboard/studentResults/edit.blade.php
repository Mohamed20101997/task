@extends('layouts.dashboard.app')

@section('content')

<h1>Student Results</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('student_result.index') }}">Student Results</a></li>
        <li class="breadcrumb-item" active>edit</li>
    </ul>


    <div class="row">
        <div class="col-md-12">

            <div class="tile mb4">
                <form class="form" action="{{route('student_result.update', $studentResults->id)}}"
                      method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input name="id" value="{{$studentResults->id}}" type="hidden">

                    <div class="row">
                        <div class="col-md-6">
                            {{-- Student Name --}}
                            <div class="form-group">
                                <label>Student Name</label>
                                <select name="student_id" class="form-control">
                                    @foreach($students as $student)
                                        <option value="{{ $student->id}}" {{$student->id == $studentResults->student_id ? 'selected' : '' }} > {{$student->full_name}} </option>
                                    @endforeach
                                </select>

                                @error('student_id')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div> {{-- end of col student name --}}

                        <div class="col-md-3">
                            {{-- grade --}}
                            <div class="form-group">
                                <label>Grade</label>
                                <input type="number" name="grade" class="form-control" value="{{ old('grade', $studentResults->grade ) }}">
                                @error('grade')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div> {{-- end of col student grade  --}}

                        <div class="col-md-3">
                            {{-- seating_number --}}
                            <div class="form-group">
                                <label>Seating Number</label>
                                <input type="text" name="seating_number" class="form-control" value="{{ old('seating_number', $studentResults->seating_number) }}">
                                @error('seating_number')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div> {{-- end of col seating number --}}

                    </div> {{-- end of row --}}
                    <div class="col-md-4 mt-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Edit</button>
                        </div>
                    </div>

                </form>

            </div>{{-- end of tile  --}}

        </div> {{-- end of col  --}}

    </div> {{-- end of row  --}}

@endsection
