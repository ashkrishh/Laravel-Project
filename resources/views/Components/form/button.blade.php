@props(['id', 'type'=>'submit','class'=>'btn btn-sm btn-primary'])
<div class="col-sm-12">
    <button class="{{ $class }}" type="{{ $type }}" id="{{ $id ?? '' }}">
        {{$slot}}
    </button>
</div>