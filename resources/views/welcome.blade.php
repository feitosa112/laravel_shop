@extends('layouts.app')

@section('title')
Welcome page
    
@endsection
@section('content')

 <div class="row">
    <div class="col-9 offset-1">
        <form action="">
            <input type="text" placeholder="Search" name="search" class="form-control">
        </form>
    </div>
 </div>
 <div class="row" style="margin-left: 15px">
    @foreach ($categories as $cat)
        <div class="cont" style=";display:flex;flex-direction:column;margin:0 auto;text-align:center;margin-top:5px">
            <a href="" style="text-decoration: none;color:black">
                <img src="image/{{$cat->image}}" style="border-radius: 50%;width:50px;height:50px;" alt="">
                <p style="font-size: 10px">{{$cat->category_name}}</p>    
            </a>
        </div>
            
            
        
    @endforeach
 </div>
@endsection