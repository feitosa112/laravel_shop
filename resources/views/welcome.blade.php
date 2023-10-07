@extends('layouts.app')

@section('title')
Welcome page
    
@endsection
@section('content')

 <div class="row">
    <div class="col-9 offset-1">
        <form action="{{route('search')}}">
            <div class="input-group mb-3">
                <input type="text" placeholder="Search" name="search" class="form-control">
                <div class="input-group-append">
                    <button class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>

    </div>
 </div>
 <div class="row" style="margin-left: 15px">
    @foreach ($categories as $cat)
        <div class="cont" style=";display:flex;flex-direction:column;margin:0 auto;text-align:center;margin-top:5px">
            <a href="{{route('thisCategory',['id'=>$cat->id])}}" style="text-decoration: none;color:black">
                <img src="image/{{$cat->image}}" style="border-radius: 50%;width:50px;height:50px;" alt="">
                <p style="font-size: 10px">{{$cat->category_name}}</p>    
            </a>
        </div>
            
            
        
    @endforeach
 </div><br>

        <div class="container">
            <div class="row">
                @foreach ($results as $result)
                <div class="col-3 offset-1">
                    <a href="{{route('thisProduct',['id'=>$result->id])}}" style="text-decoration: none;color:black">
                        <div class="card">
                            <div class="card-header">
                                @if ($result->product_image != null)
                                <img src="/image/{{$result->product_image}}" alt="">
                                    
                                @endif
                            </div>
    
                            <div class="card-body">
                                <h5>{{$result->product_name}}</h5>
                            </div>
    
                            <div class="card-footer">
                                <a href="" class="badge badge-info float-left">{{$result->price}} KM</a>

                                @if (Auth::user() && Auth::user()->email !== 'admin@gmail.com')
                                @if (in_array($result->id,array_column(Session::get('cart',[]),'id')))
                                <a href="" class="badge badge-secondary badge-sm float-right">Proizvod je u korpi</a>
                                @else
                                <a href="{{route('addToCart',['id'=>$result->id])}}" class="badge badge-warning badge-sm float-right">Dodaj u korpu</a>
            
                            @endif                           
                                @endif

                                @if (Auth::user() && Auth::user()->email === 'admin@gmail.com')
                                <a href="{{route('editProductView',['id'=>$result->id])}}" class="badge badge-warning badge-sm float-right">Edit</a>                           
                                <a href="{{route('deleteProduct',['id'=>$result->id])}}" class="badge badge-danger badge-sm float-right">Delete</a>                           
                                    
                                @endif
                            </div>
                        </div>
                    </a>
                    
                </div>
                    
                @endforeach
            </div>
        </div>
        
    
@endsection
