@extends('layouts.app')

@section('title')
{{$results[0]->product_name}}

@endsection

@section('content')

@include('searchCard')

@foreach ($results as $result)
<div class="container-fluid">


<div class="row">



<div class="col-12 col-sm-5 offset-1 mt-5 text-center mx-auto" style="border:1px dotted #a7b2c2;">
    <div class="row">
        <div class="col-8 offset-2">
            <h3>{{$result->product_name}}</h3>
            @if ($result->product_image != null)
                <img src="/image/{{$result->product_image}}" style="width: 90%;height:80%" id="current" alt=""><br>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            @if ($result->product_image != null)
                <img src="/image/{{$result->product_image}}" style="width: 100%;height:100%" class="second" alt=""><br>
            @endif
        </div>

        <div class="col-2">
            @if ($result->product_image2 != null)
                <img src="/image/{{$result->product_image2}}" style="width: 100%;height:100%" class="second" alt=""><br>
            @endif
        </div>

        <div class="col-2">
            @if ($result->product_image3 != null)
                <img src="/image/{{$result->product_image3}}" style="width: 100%;height:100%" class="second" alt=""><br>
            @endif
        </div>

        <div class="col-2">
            @if ($result->product_image4 != null)
                <img src="/image/{{$result->product_image4}}" style="width: 100%;height:100%" class="second" alt=""><br>
            @endif
        </div>

        <div class="col-2">
            @if ($result->product_image5 != null)
                <img src="/image/{{$result->product_image5}}" style="width: 100%;height:100%" class="second" alt=""><br>
            @endif
        </div>

        <div class="col-2">
            @if ($result->product_image6 != null)
                <img src="/image/{{$result->product_image6}}" style="width: 100%;height:100%" class="second" alt=""><br>
            @endif
        </div>
    </div>





    <p><b>{{$result->product_name}}</b></p><br>
    <p>{{$result->description}}</p>
    <a href="" class="btn btn-success btn-sm float-start ms-2" style="text-decoration:none">{{$result->price}} KM</a>
    @if (Auth::user() && Auth::user()->email !== 'admin@gmail.com')

        @if (in_array($result->id,array_column(Session::get('cart',[]),'id')))
            <a href="" class="btn btn-secondary btn-sm float-end text-decoration-none me-2">Proizvod je u korpi</a>
            @else
            <a href="{{route('addToCart',['id'=>$result->id])}}" class="btn btn-warning btn-sm text-dark float-end text-decoration-none me-2">Dodaj u korpu</a>

        @endif
        <a href="{{route('payment.form',['id'=>$result->id])}}" id="narudzba" class="badge bg-primary float-start text-decoration-none">Naruci i plati odmah</a>
            <a href="{{route('orderExecuteNow',['id'=>$result->id])}}" id="narudzba" class="badge bg-primary float-end text-decoration-none">Naruci odmah</a>
        @endif
<br><br>



        @if (Auth::user() && Auth::user()->email === 'admin@gmail.com')
            <a href="{{route('deleteProduct',['id'=>$result->id])}}" class="btn btn-danger btn-sm float-right text-decoration-none">Delete</a>
            <a href="{{route('editProductView',['id'=>$result->id])}}" class="btn btn-warning btn-sm float-right text-decoration-none">Edit</a>
        @endif

        <br><br>
        <p class="float-left"><small><i>Broj pregleda:{{$result->views}}</i></small></p>
        @foreach ($messages as $msg)
        <div class="alert alert-success" role="alert">
            <a href="" class="badge bg-primary text-decoration-none float-start">{{$msg->user->name}}</a><br>
            <p class="float-start" style="margin-top: -5px">{{$msg->message}}</p>
            <sub class="float-end">{{$msg->created_at}}</sub>
          </div><br>


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
</div>


@endforeach

<div class="row">

    {{-- bestSellingProducts dobijamo iz servisa BestSellingProductService --}}
    <h4 class="text-center mt-5">Najcesce prodavani proizvodi</h4>
    @foreach ($bestSellingProducts as $topProducts)
        @foreach ($topProducts as $topProduct)
            {{-- @dd($topProduct) --}}
    {{-- @dd($topProduct->product) --}}
    <div class="col-lg-4 col-sm-3 col-md-4 col-4">
        <a href="{{route('thisProduct',['name'=>$topProduct->product_name,'id'=>$topProduct->id])}}" class="text-decoration-none text-dark">
            <div class="card">
                <div class="card-header text-center">{{$topProduct->product_name}}</div>
                <div class="card-body">
                    @if ($topProduct->product_image !=null)
                        <img src="/image/{{$topProduct->product_image}}" alt="" style="width:100%;height:30%">
                    @endif
                </div>
                <div class="card-footer">
                     <a href="" class="badge bg-success bg-sm float-start" style="text-decoration:none;font-size:10px">{{$topProduct->price}} KM</a>

                </div>
            </div><br>
        </a>
    </div>

    @endforeach

    @endforeach

</div>
</div>

@endsection

@section('scripts')
<script>
    var current=document.getElementById('current');
    var slike=document.getElementsByClassName('second');

    for(var i=0;i<slike.length;i++){
    slike[i].addEventListener('click',display);
    }
    function display(){
    var sl=this.getAttribute('src');
    current.setAttribute('src',sl);
    }


</script>


@endsection
