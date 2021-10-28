@extends('layouts.dashboard.app')

@section('content')
<h1>custom</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('custom.index') }}">custom</a></li>
        <li class="breadcrumb-item" active>Add</li>
    </ul>

<input hidden value="{{$fields}}" id="data">
<input hidden data-id="{{$fields->first()->model_id}}"  id="id">
<input hidden data-url="{{ route('custom.update',$fields->first()->model_id) }}"  id="url">
<div class="row">
    <div class="col-md-12">
        <label class="alert alert-dark" style="width: 100%">Select Model
            <select class="form-control" id="model"  required>
                <option value="">Choose the model</option>
                <option value="1" {{$fields->first()->model_id== 1 ? 'selected' : ''}} name="categories">Categories</option>
                <option value="2" {{$fields->first()->model_id == 2 ? 'selected' : ''}} name="tags">Tags</option>
                <option value="3" {{$fields->first()->model_id == 3 ? 'selected' : ''}}  name="articles">Articles</option>
            </select>
        </label>
        <div class="tile mb4">
            <div class="build-wrap" id="build-wrap"></div>
        </div> {{-- end of tile  --}}
    </div> {{-- end of col  --}}
</div> {{-- end of row  --}}
@endsection

@section('script')
    <script>
        var data  = $('#data').val();
        var options = {

            formData: data,

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
        const formBuilder = wrap.formBuilder(options);

        $(document).on('click','.save-template',function (){
            var id = $('#id').data('id');
            var url = $('#url').data('url');
            var select = $('#model').find(":selected");
            var model_name = select.text();
            var model_id = select.val();
            var formData =  formBuilder.actions.getData();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            });
            $.ajax({
                method : 'put',
                url: url,
                data:{'data':formData,
                    'id':id,
                    'model_name':model_name,
                    'model_id':model_id
                },
                success: function( msg ) {
                    window.location.href = "{{route('custom.index')}}";
                }
            });
        });
    </script>
@endsection

