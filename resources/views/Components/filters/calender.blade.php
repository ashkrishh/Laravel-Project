@props(['class' => 'custom-select publish-date bg-transparent rounded-0 text-white shadow-none form-control mb-2 active', 'name', 'placeholder' => ''] )
<div class="col-sm-3 col-md-3">
    <input class="{{ $class }}" type="text" id="{{ $name }}" name="{{ $name }}" value="{{ request()->name}}" placeholder="{{ $placeholder }}" autocomplete="off">                        
</div>