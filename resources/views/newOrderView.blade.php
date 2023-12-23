@extends('layouts.app')

@section('title')
New Order by id

@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            @foreach ($order as $item)

            <h5>Status:<a class="badge bg-primary text-decoration-none">{{$item->status}}</a></h5>

            @endforeach

            @foreach ($item->userOrder as $user)
            <h5>Ime narucioca:<a class="badge bg-warning text-dark">{{$user->name}}</a></h5>
            <h5>Adresa narucioca:<a class="badge bg-secondary text-dark text-decoration-none">{{$user->email}}</a></h5>
            @endforeach

            @foreach ($item->orderItems as $orderItem)
            <h5>Proizvod:<a class="badge bg-info text-dark text-decoration-none">{{$orderItem->product->product_name}}</a> <a class="badge badge-success">{{$orderItem->product->price}} KM</a></h5>
            @endforeach

            <h5>Ukupna cijena:<a class="badge bg-success text-decoration-none">{{$item->total_amount}} KM</a></h5>

            @if ($item->status === 'naruceno')
            <a href="{{route('send-product',['id'=>$item->id])}}" class="btn btn-outline-danger">Posalji</a>
                @else
                <p style="color: red;font-weight:bold">Ova narudzba je procesuirana</p>
            @endif
        </div>

    </div>
</div>

@endsection
