
@props(['name', 'class' => 'form-control publish-date dateInput', 'value' => date('Y-m-d')] )
<div class="input-group date">
    <span class="input-group-addon">
        <i class="ri-calendar-2-line"></i>
    </span>
 
    <input class="{{ $class }}" type="text" name="{{ $name }}" id="date" value="{{ $value }}" />
</div>
@error($name)
    <p class="mt-1 text-red">{{$message}}</p>
@enderror