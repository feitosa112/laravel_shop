@extends('layouts.app')

@section('title')
Cart
    
@endsection

@section('content')

@foreach ($cart as $item)
<div class="row">
    <div class="col-2 offset-2">
        <div class="card" style="width:250px;border:1px dotted gray">
            <div class="card-header">
                <img src="/image/{{$item->product_image}}" style="width:100%;height:100%" alt="">
            </div>
            <div class="card-body">
                <p class="float-left"><b>{{$item->product_name}}</b></p>
            </div>
            <div class="card-footer">
                <a href="" class="badge badge-success badge-sm float-left">{{$item->price}} KM</a>
                <a href="{{route('deleteFromCart',['id'=>$item->id])}}" class="badge badge-danger badge-sm float-right">Obrisi iz korpe</a>
            </div>
        </div>
    </div>
</div><br>
    
@endforeach

<div class="container">
    <div class="row" style="border:1px dotted black">
        <div class="col-6 offset-3">
            <h5 class="display-4 float-left">Total:{{$total}}</h5>
            @if ($errors->any())
            @foreach($errors->all() as $error)

            <p style="color: red">{{$error}}</p>
    
            @endforeach
            @endif
            <form action="{{route('orderExecute')}}" method="POST">
                @csrf
                <input type="hidden" name="total" value="{{$total}}">
                <button class="btn btn-primary float-right mt-3"type="submit" name="save">Naruci</button>
            </form>
        </div>
    </div>
</div>
    
@endsection