@props(['class' => 'custom-select bg-transparent rounded-0 text-white shadow-none', 'users' => []] )
<div class="col-sm-4 col-md-4">
    <div class="form-group no-margins">
        <select class = "{{ $class }} post-filter"  id="user_id" name="user_id">
            <option value="">Select Author</option> 
            @if($users)
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach 
            @endif         
        </select>    
    </div> 
</div>