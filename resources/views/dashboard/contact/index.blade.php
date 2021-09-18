@extends('layouts.dashboard.app')

@section('content')

    <h1>Contacts</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item" active>Contacts</li>
    </ul>


    <div class="row">
        <div class="col-md-12">

            <div class="tile mb-4">
                <form action="">
                    <div class="row">

                    </div> <!-- end of row -->
                </form> <!-- end of form -->
                <div class="row">
                    <div class="col-md-12">
                        @if ($contacts->count() > 0)
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>email</th>
                                    <th>subject</th>
                                    <th>message</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($contacts as $index=>$contact)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->subject }}</td>
                                        <td>{{ $contact->message }}</td>
                                        <td>
                                            <form method="post" action={{ route('setting.contact.delete', $contact->id)}} style="display:inline-block">
                                                @csrf
                                                @method('post')
                                                <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button>
                                            </form> <!-- end of form -->
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {{ $contacts->appends(request()->query())->links() }}

                        @else
                            <h3 class="alert alert-info text-center d-flex justify-content-center" style="margin: 0 auto; font-weight: 400"><i class="fa fa-exclamation-triangle"></i> Sorry no records found</h3>
                        @endif
                    </div> <!-- end of col-md-12 -->
                </div> <!-- end of row -->

            </div> <!-- end of tile -->

        </div> {{-- end of col  --}}
    </div> {{-- end of row  --}}
@endsection
