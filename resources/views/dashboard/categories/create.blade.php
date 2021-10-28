@extends('layouts.dashboard.app')

@section('content')
<h1>Categories</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Categories</a></li>
        <li class="breadcrumb-item" active>Add</li>
    </ul>


<div class="row">
    <div class="col-md-12">

        <div class="tile mb4">
            <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-md-6">
                        {{-- Name --}}
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>{{-- end of col name --}}

                </div> {{-- end of row --}}

                    @component('components.Inputs.input',[
                                'label' => 'Enter password',
                                'type' => 'select',
                                'values' => '[{"label":"Option 1","value":"option-1","selected":"true"},{"label":"Option 2","value":"option-2","selected":"true"},{"label":"Option 3","value":"option-3"}]',
                                'placeholder' => 'asdsada',
                                'selected' => true,
                                'multiple' => true,
                                'subtype' =>null,
                                'name' => 'password',
                                'required' => true,
                            ])
                    @endcomponent

                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Add</button>
                </div>
            </form>

        </div> {{-- end of tile  --}}

    </div> {{-- end of col  --}}
</div> {{-- end of row  --}}


@endsection
