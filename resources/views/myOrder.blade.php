@extends('layouts.app')

@section('title')
My order
    
@endsection

@section('content')
<h4 class="display-4 text-center">My orders</h4><br>
@if (count($orders) === 0)
<h4 class="display-4">Jos uvijek nemate niti jednu narudzbu</h4>


@else

@foreach ($orders as $index => $order)
<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">Order {{$index+1}}</th>
        <th scope="col">Product name</th>
        <th scope="col">Price</th>
        <th style="color:{{$order->status === 'ordered' ? 'white' : 'greenyellow'}}" scope="col">{{$order->status}}</th>
        <th scope="col">Created at</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($order->orderItems as $item)
    <tr>
        <th scope="row"></th>
        <td>{{$item->product->product_name}}</td>
        <td>{{$item->product->price}}</td>
        <td></td>
        <td>{{$item->created_at}}</td>
    </tr>
    @endforeach
    </tbody>  
  </table> 
  <a class="btn btn-success">Total:{{$order->orderItems->pluck('product.price')->sum()}} KM</a><br><br><br>
@endforeach

@endif




    
@endsection

