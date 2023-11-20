@if(session()->has('success'))
      <div class="m-4 alert  alert-success">
         <p>{{session('success')}}</p>
      </div>
@elseif(session()->has('error'))
      <div class="m-4 alert  alert-danger">
         <p>{{session('error')}}</p>
      </div>
@elseif(session()->has('message'))
      <div class="m-4 alert  alert-dark">
         <p>{{session('message')}}</p>
      </div>
@endif