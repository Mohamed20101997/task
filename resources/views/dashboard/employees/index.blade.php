@extends('layouts.dashboard.app')

@section('content')

    <h1>Employees</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item" active>Employees</li>
    </ul>


    <div class="row">
        <div class="col-md-12">

            <div class="tile mb-4">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('employee.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
                    </div> <!-- end of col 12 -->

                </div> <!-- end of row -->

                <div class="row">
                    <div class="col-md-12">
                        @if ($employees->count() > 0)
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Company</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($employees as $index=>$employee)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $employee->first_name }}</td>
                                        <td>{{ $employee->last_name }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->phone }}</td>
                                        <td>{{ $employee->company->name }}</td>

                                        <td>
                                            <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Edit</a>

                                            <form method="post" action={{ route('employee.destroy', $employee->id)}} style="display:inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i>Delete</button>
                                            </form> <!-- end of form -->

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {{ $employees->appends(request()->query())->links() }}

                        @else
                            <h3 class="alert alert-info text-center" style="font-weight: 400"><i class="fa fa-exclamation-triangle"></i> Sorry no records found</h3>
                        @endif
                    </div> <!-- end of col-md-12 -->
                </div> <!-- end of row -->

            </div> <!-- end of tile -->

        </div> {{-- end of col  --}}
    </div> {{-- end of row  --}}
@endsection
