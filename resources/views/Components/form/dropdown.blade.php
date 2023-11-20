@props(['name', 'value' => old($name), 'class' => 'form-control no-border mb-3', 'label', 'path'] )
<div class="{{ $class }}">
    <select class="form-select"  name = "{{ $name }}">
    <option class="dropdown-item" value="">-- Select {{ $label }} --</option>
    @foreach ($path::all() as $item) 
        <option class="dropdown-item" value="{{$item->id}}" {{ $value == $item->id ? 'selected':''}}>{{$item->name}}</option>
    @endforeach
    </select>
</div>
@error($name)
    <p class="mt-1 text-red">{{$message}}</p>
@enderror