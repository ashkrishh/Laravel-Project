@props(['name','value','checked'=> '', 'class' => 'ml-4'])
<div class="{{ $class }}">
  <input type="radio" name="{{ $name }}"  value="{{ $value }}" id="flexRadioDefault2" {{ $checked }}> {{ $slot }}
</div>