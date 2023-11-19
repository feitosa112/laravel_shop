@extends('layouts.app')

@section('title')
Cart
    
@endsection

@section('content')

@foreach ($cart as $item)
<div class="row">
    <div class="col-2 offset-2">
        <div class="card" style="width:200px;height:300px;border:1px dotted gray">
            <div class="card-header">
                <img src="/image/{{$item->product_image}}" style="width:100%;height:100%" alt="">
            </div>
            <div class="card-body">
                <p class="float-left"><b>{{$item->product_name}}</b></p>
            </div>
            <div class="card-footer">
                <a href="" class="badge bg-success text-light float-start text-decoration-none">{{$item->price}} KM</a>
                <a href="{{route('deleteFromCart',['id'=>$item->id])}}" class="badge bg-danger  float-end text-decoration-none">Obrisi iz korpe</a>
            </div>
        </div>
    </div>
</div><br>
    
@endforeach
@if (Auth::user())
<div class="container">
    <div class="row" style="border:1px dotted black">
        <div class="col-6 offset-3">
            @if (count($cart) === 0)
                <h4 class="display-4 text-center">Vasa korpa je prazna</h4> 
                
            
                
            @else
            <h5 class="display-4 float-left">Total:{{$total}}</h5>
            <a href="{{route('orderExecute')}}" class="btn btn-primary float-right mt-3"type="submit" name="save">Naruci</a>
            <a href="{{route('payment.form')}}" class="btn btn-info float-right mt-3"type="submit" name="save">Plati karticom</a>

            @endif
            
            
            
        </div>
    </div>
</div>
@endif

    
@endsection