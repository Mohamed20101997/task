@php
    if(isset($type) && isset($subtype) && $type == 'text'){
        $type_value = $subtype;
    }else{
        if( isset($type)){
            $type_value = $type;
        }else{
             $type_value = 'text' ;
        }
    }

    if(isset($values)){
        $values = json_decode($values) ;
    }

    if( isset($multiple)) {
        if($type_value == 'file' || $type_value == 'select'){
          $multiple = 'multiple';
          }
    }else{
        $multiple = '';
    }
@endphp
<div class="form-group">
    @if($type_value == 'radio' || $type_value == 'checkbox')
        @if( isset($values) )
            @foreach($values as $value)
                <label class="mr-4">{{$value->label}}
                    <input
                        type="{{$type_value}}"
                        class="form-control"
                        style="width: 30px"
                        name="{{ $name }}"
                        {{ isset($placeholder) ? $placeholder : '' }}"
                        value="{{old($name)}}"
                        {{ isset($value->selected) && $value->selected == true ?  'checked' : '' }}
                    >
                </label>
            @endforeach
        @endif

    @elseif($type_value == 'select')

        @if( isset($values) )

         <select name="{{ $name }}" class="form-control select2"  {{$multiple}} name="{{ $name }}" {{$required ? 'required ' : ''}}>
            @foreach($values as $option)
                <option {{ isset($option->selected) && $option->selected == true ?  'selected' : '' }}>{{$option->label}}</option>
            @endforeach
         </select >
        @endif
    @else

        <label>{{$label}}</label>
        <input
            type="{{$type_value}}"
            class="form-control"
            name="{{ $name }}"
            {{isset($placeholder) ? 'placeholder=' . $placeholder : '' }}
            value="{{old($name)}}"
            {{isset($maxlength) ? 'maxlength=' . $maxlength : '' }}
            {{$required ? 'required ' : ''}}
            {{isset($min) ? 'min=' . $min : '' }}
            {{isset($max) ? 'max=' . $max : '' }}
            {{isset($step) ? 'step=' . $step : '' }}
            {{$multiple}}
        >
    @endif

</div>
