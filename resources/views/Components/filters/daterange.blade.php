@props(['class' => 'custom-select bg-transparent rounded-0 text-white shadow-none form-control mb-2 active', 'name'] )
<div class="col-sm-4 col-md-4">
    <input class="{{ $class }}" type="text" id="{{ $name }}" name="{{ $name }}" value="{{ request()->name}}" placeholder="Published Date" autocomplete="off">                        
</div>