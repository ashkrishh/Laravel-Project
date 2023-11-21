@props(['class' => 'custom-select bg-transparent rounded-0 text-white shadow-none'] )
<div class="col-sm-2 col-md-2">
    <div class="form-group no-margins">
        <select class = "{{ $class }} post-filter"  id="status" name="status">
            <option value="">Status</option> 
            <option value="active">Active</option> 
            <option value="inactive">Inactive</option>       
        </select>    
    </div> 
</div>