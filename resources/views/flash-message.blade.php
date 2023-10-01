@if ($message = Session::get('error'))
<div class="col-4 offset-8">
    <div class="alert alert-success" role="alert">
        {{$message}}
      </div>
</div>
   
@endif

@if ($message = Session::get('success'))
<div class="col-4 offset-8">
    <div class="alert alert-success" role="alert">
        {{$message}}
      </div>
</div>
   
@endif