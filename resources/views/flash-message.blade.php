@if ($message = Session::get('error'))
<div class="col-4 offset-8">
    <div class="alert alert-danger" role="alert">
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

@if ($message = Session::get('deleteFromCart'))
<div class="col-4 offset-8">
    <div class="alert alert-success" role="alert">
        {{$message}}
      </div>
</div>
   
@endif

@if ($message = Session::get('errorDeleteFromCart'))
<div class="col-4 offset-8">
    <div class="alert alert-danger" role="alert">
        {{$message}}
      </div>
</div>
   
@endif

@if ($message = Session::get('orderExecute'))
<div class="col-4 offset-8">
    <div class="alert alert-success" role="alert">
        {{$message}}
      </div>
</div>
   
@endif

@if ($message = Session::get('noSearch'))
<div class="col-4 offset-8">
    <div class="alert alert-danger" role="alert">
        {{$message}}
      </div>
</div>
   
@endif

@if ($message = Session::get('isSend'))
<div class="col-4 offset-8">
    <div class="alert alert-success" role="alert">
        {{$message}}
      </div>
</div>
   
@endif

@if ($message = Session::get('deleteProduct'))
<div class="col-4 offset-8">
    <div class="alert alert-danger" role="alert">
        {{$message}}
      </div>
</div>
   
@endif

@if ($message = Session::get('updateProduct'))
<div class="col-4 offset-8">
    <div class="alert alert-warning" role="alert">
        {{$message}}
      </div>
</div>
   
@endif

@if ($message = Session::get('deleteImage'))
<div class="col-4 offset-8">
    <div class="alert alert-warning" role="alert">
        {{$message}}
      </div>
</div>
   
@endif

@if ($message = Session::get('addNewProduct'))
<div class="col-4 offset-8">
    <div class="alert alert-success" role="alert">
        {{$message}}
      </div>
</div>
   
@endif

@if ($message = Session::get('deleteOrder'))
<div class="col-4 offset-8">
    <div class="alert alert-danger" role="alert">
        {{$message}}
      </div>
</div>
   
@endif

@if ($message = Session::get('amount'))
<div class="col-4 offset-8">
    <div class="alert alert-danger" role="alert">
        {{$message}}
      </div>
</div>
   
@endif

@if ($message = Session::get('sendMsg'))
<div class="col-4 offset-8">
    <div class="alert alert-success" role="alert">
        {{$message}}
      </div>
</div>
   
@endif

