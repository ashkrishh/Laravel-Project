<div class="col-sm-2 col-md-2">
    <div class="form-group no-margins">
        <select class="chosen-select post-filter" id="user_id" name="user_id">
            <option value="">Select Author</option> 
            <?php $users = \App\Models\User::all();?>             
            @if($users)
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach 
            @endif         
        </select>    
    </div> 
</div>