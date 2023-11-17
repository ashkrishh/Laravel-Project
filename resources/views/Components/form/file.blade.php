@props(['name'])

<input class="form-control" name="{{ $name }}"  id = "{{ $name }}" type="file" >
@error($name)
    <p class="mt-1 text-red">{{$message}}</p>
@enderror

      