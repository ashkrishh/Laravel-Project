@props(['name', 'type'=>'text' , 'placeholder' => $name, 'value' => old($name), 'class' => 'form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0'])
<input class="{{ $class }}" name = "{{ $name }}" id = "{{ $name }}" type = "{{ $type }}" value = "{{ $value }}" placeholder="{{ucwords($placeholder)}}"/>
@error($name)
    <p class="mt-1 text-red">{{$message}}</p>
@enderror

      