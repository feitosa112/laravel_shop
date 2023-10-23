@extends('layouts.app')

@section('title')
This product
    
@endsection

@section('content')


@foreach ($results as $result)

<div class="col-8 col-sm-5 offset-3 mt-5 text-center" style="border:1px dotted #a7b2c2">
    <img src="/image/{{$result->product_image}}" style="width: 250px;height:200px" alt=""><br>
    @if ($result->product_image2 != null)
    <img src="/image/{{$result->product_image2}}" style="width: 150px;height:100px" alt=""><br>
    @endif
    @if ($result->product_image3 != null)
    <img src="/image/{{$result->product_image3}}" style="width: 150px;height:100px" alt=""><br>
    @endif

    <p><b>{{$result->product_name}}</b></p>
    <a href="" class="btn btn-success btn-sm float-left" style="text-decoration:none">{{$result->price}} KM</a>
    @if (Auth::user() && Auth::user()->email !== 'admin@gmail.com')
        
        @if (in_array($result->id,array_column(Session::get('cart',[]),'id')))
            <a href="" class="badge bg-secondary float-end text-decoration-none">Proizvod je u korpi</a>
            @else
            <a href="{{route('addToCart',['id'=>$result->id])}}" class="badge bg-warning text-dark float-end text-decoration-none">Dodaj u korpu</a>

        @endif
        @endif
        @if (Auth::user() && Auth::user()->email === 'admin@gmail.com')
            <a href="{{route('deleteProduct',['id'=>$result->id])}}" class="btn btn-danger btn-sm float-right text-decoration-none">Delete</a>
            <a href="{{route('editProductView',['id'=>$result->id])}}" class="btn btn-warning btn-sm float-right text-decoration-none">Edit</a>
        @endif

        <br><br>
        <p class="float-left"><small><i>Broj pregleda:{{$result->views}}</i></small></p>
        @foreach ($messages as $msg)
        <p class="float-start">{{$msg->user->name}}:{{$msg->message}} <p class="float-end"><sub>{{$msg->created_at}}</sub></p></p><br><br>
            
        @endforeach
        @if ($errors->any())
        @foreach($errors->all() as $error)

        <p style="color: red">{{$error}}</p>

        @endforeach
        @endif
        @if (Auth::user() && Auth::user()->email != 'admin@gmail.com')
        <form action="{{route('sendMsg',['id'=>$result->id])}}" method="POST">
            @csrf
            <textarea name="msg" placeholder="Posalji poruku u vezi ovog proizvoda" class="form-control" style="box-shadow:0px 0px 5px rgba(0,0,0,0.5)"></textarea>
            <button class="btn btn-primary form-control">Posalji poruku</button>
        </form>
        @endif
        
</div>
    
@endforeach
 
@endsection