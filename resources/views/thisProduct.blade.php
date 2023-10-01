@extends('layouts.app')

@section('title')
This product
    
@endsection

@section('content')
<div class="row">
        @foreach ($product as $cat)
        <a href="">
            <div class="col-2 offset-1">
                <img src="/image/{{$cat->product_image}}" style="width: 150px;height:100px" alt="">
                <p><b>{{$cat->product_name}}</b></p>
                <a href="" class="btn btn-success btn-sm">{{$cat->price}} KM</a>
                @if (Auth::user())
                <a href="{{route('addToCart',['id'=>$cat->id])}}" class="btn btn-warning btn-sm">Dodaj u korpu</a>
                    
                @endif
            </div>
        </a>
            
        @endforeach     
</div>

    
@endsection