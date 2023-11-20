@props(['placeholder' => $placeholder,'class' => $class, 'name' =>'search'])
<div class="{{$class}}">
   <input type="text" name = "{{ $name }}" class = "input" placeholder="{{ $placeholder }}" value="{{ request('search') }}">
</div>