@extends('layouts.dashboard.app')

@section('content')

    <h1>Students</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item" active>Students Results</li>
    </ul>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mr-3" id="exampleModalLabel">Import Data</h5>
                    <a  class="btn btn-primary" href="{{asset('template/template.xlsx')}}" download="Template"> <i class="fa fa-download"></i> Download Template </a>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                        <form method="post" id="import" action={{ route('import')}} style="display:inline-block" enctype="multipart/form-data">
                                <div class="form-group">
                                    @csrf
                                    @method('post')
                                    <label>Upload Excel</label>
                                    <input name="file" type="file" class="form-control">
                                    @error('file')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div >
                        </form> <!-- end of form -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary"  type="submit" form="import">Upload Data</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="tile mb-4">
                <form action="">
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-success"><i class="fa fa-search"></i>Search</button>
                            <a href="{{ route('student_result.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-upload"> </i> Import </button>
                        </div> <!-- end of col 4 -->

                    </div> <!-- end of row -->
                </form> <!-- end of form -->
                <div class="row">
                    <div class="col-md-12">
                        @if ($studentResults->count() > 0)
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Grade</th>
                                    <th>Seating Number</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($studentResults as $index=>$student)
                                    <tr>
                                        <td>{{  $index + 1 }}</td>
                                        <td>{{ $student->student->full_name }}</td>
                                        <td>{{ $student->grade }}</td>
                                        <td>{{ $student->seating_number }}</td>
                                        <td>
                                            <a href="{{ route('student_result.edit', $student->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Edit</a>

                                            <form method="post" action={{ route('student_result.destroy', $student->id)}} style="display:inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i>Delete</button>
                                            </form> <!-- end of form -->

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {{ $studentResults->appends(request()->query())->links() }}

                        @else
                            <h3 class="alert alert-info text-center d-flex justify-content-center" style="margin: 0 auto; font-weight: 400"><i class="fa fa-exclamation-triangle"></i> Sorry no records found</h3>
                        @endif
                    </div> <!-- end of col-md-12 -->
                </div> <!-- end of row -->

            </div> <!-- end of tile -->

        </div> {{-- end of col  --}}
    </div> {{-- end of row  --}}
@endsection
