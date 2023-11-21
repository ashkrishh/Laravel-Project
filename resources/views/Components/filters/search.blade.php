@props(['placeholder' => '','class' => 'form-control text-white bg-transparent shadow-none rounded-0 post-filter', 'name' =>'search'])
<div class="input-group col-sm-3 col-md-3">
   <input type="search" class="{{ $class }}" name = "{{ $name }}" placeholder="{{ $placeholder }}" value="{{ request('search') }}">
   <div class="input-group-append">
      <button class="btn" type="submit">
         <span class="fas fa-search"></span>
      </button>
   </div>
</div>