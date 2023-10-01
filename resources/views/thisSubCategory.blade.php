@extends('layouts.app')

@section('title')
This subcategory
    
@endsection

@section('content')
<div class="row">
        @foreach ($subcategory as $cat)
        <a href="{{route('thisProduct',['id'=>$cat->id])}}">
            <div class="col-2 offset-1">
                <img src="/image/{{$cat->product_image}}" style="width: 150px;height:100px" alt="">
                <p><b>{{$cat->product_name}}</b></p>
                <a href="" class="btn btn-success btn-sm">{{$cat->price}} KM</a>
            </div>
        </a>
            
        @endforeach     
</div>

    
@endsection