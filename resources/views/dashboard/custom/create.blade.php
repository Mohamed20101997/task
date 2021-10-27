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
        var fbEditor = document.getElementById('build-wrap');
        var formBuilder = $(fbEditor).formBuilder(options);

        $(document).on('click','.save-template',function (){
            var formData =  formBuilder.actions.getData();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            });
            $.ajax({
                method : 'POST',
                url: '{{route('custom.store')}}',
                data:{'data':formData},
                success: function( msg ) {
                    window.location.href = "{{route('custom.index')}}";
                }
            });
        });

    </script>
@endsection

