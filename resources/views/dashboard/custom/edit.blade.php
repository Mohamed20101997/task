@extends('layouts.dashboard.app')

@section('content')
<h1>custom</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('custom.index') }}">custom</a></li>
        <li class="breadcrumb-item" active>Add</li>
    </ul>


<div class="row">
    <div class="col-md-12">

        <div class="tile mb4">
            <div class="build-wrap" id="build-wrap"></div>
        </div> {{-- end of tile  --}}

    </div> {{-- end of col  --}}
</div> {{-- end of row  --}}
@endsection

@section('script')
    <script>
        var options = {
            formData: '[{"type":"text", "label":"Text Input"}]',
            disableFields:[
                'button',
                'hidden',
                'paragraph',
                'header',
                'autocomplete',
            ],
            disabledActionButtons: [
                'data',
            ]
        };
        const wrap = $('.build-wrap');
        const formRender = wrap.formBuilder(options);
    </script>
@endsection
