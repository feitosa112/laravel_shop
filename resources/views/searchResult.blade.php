@extends('layouts.app')

@section('title')
Search result
    
@endsection
@section('content')
{{-- @dd(count($results)) --}}
<div class="row">
    @foreach ($results as $item)
    <div class="col-1 offset-2">
        <a href="{{route('thisProduct',['id'=>$item->id])}}">
            <div class="card " style="width: 250px">
                <div class="card-header">
                    <img src="/image/{{$item->product_image}}" style="width: 200px;height:150px" alt="">
                </div>
                <div class="card-body">
                    {{$item->product_name}}
                </div>
                <div class="card-header">
                    <a href="" class="btn btn-success float-left">{{$item->price}} KM</a>
                    @if (Auth::user())
                    
                    @if (in_array($item->id,array_column(Session::get('cart',[]),'id')))
                        <a href="" class="btn btn-secondary btn-sm float-right">Proizvod je u korpi</a>
                        @else
                        <a href="{{route('addToCart',['id'=>$item->id])}}" class="btn btn-warning btn-sm float-right">Dodaj u korpu</a>

                    @endif
                    @endif
                </div>
            </div>
        </a>
    </div>
        
    @endforeach
</div>
    
@endsection

