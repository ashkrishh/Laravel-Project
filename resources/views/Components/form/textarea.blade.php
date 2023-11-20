@props(['name', 'placeholder', 'value'=> old($name),'style' => 'height: 8rem', 'class' => 'form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0'])

<textarea class="{{$class}}" id="{{$name}}" name = "{{$name}}" type="text" placeholder="{{ $placeholder }}" style = "{{ $style }}" >{{ $value }}</textarea>
@error($name)
    <p class="mt-1 text-red">{{$message}}</p>
@enderror
