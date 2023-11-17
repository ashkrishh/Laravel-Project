
@props(['name', 'value' => old($name), 'class' => 'form-control publish-date dateInput', 'label', 'path'] )
<div class="input-group date">
    <span class="input-group-addon">
        <i class="ri-calendar-2-line"></i>
    </span>
    @php 
        $date = $filter['date'] ??  date('d/m/Y');
    @endphp
    <input class="{{ $class }}" type="text" name="{{ $name }}" id="date" value="{{ $date }}" />
</div>
@error($name)
    <p class="mt-1 text-red">{{$message}}</p>
@enderror