@extends('layouts.dashboard.app')

@section('content')

    <h1>Companies</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item" active>Companies</li>
    </ul>


    <div class="row">
        <div class="col-md-12">

            <div class="tile mb-4">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('company.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
                    </div> <!-- end of col 12 -->

                </div> <!-- end of row -->

                <div class="row">
                    <div class="col-md-12">
                        @if ($companies->count() > 0)
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>webSite</th>
                                    <th>logo</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($companies as $index=>$company)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $company->name }}</td>
                                        <td>{{ $company->email }}</td>
                                        <td>{{ $company->website }}</td>
                                        <td>
                                            <img src="{{image_path($company->logo)}}" id="blah" width="50px" alt="your image" height="50px">
                                        </td>
                                        <td>
                                            <a href="{{ route('company.edit', $company->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Edit</a>

                                            <form method="post" action={{ route('company.destroy', $company->id)}} style="display:inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i>Delete</button>
                                            </form> <!-- end of form -->

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {{ $companies->appends(request()->query())->links() }}

                        @else
                            <h3 class="alert alert-info text-center" style="font-weight: 400"><i class="fa fa-exclamation-triangle"></i> Sorry no records found</h3>
                        @endif
                    </div> <!-- end of col-md-12 -->
                </div> <!-- end of row -->

            </div> <!-- end of tile -->

        </div> {{-- end of col  --}}
    </div> {{-- end of row  --}}
@endsection
