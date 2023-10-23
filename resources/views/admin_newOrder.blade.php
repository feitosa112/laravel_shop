@extends('layouts.app')

@section('title')
NewOrder
    
@endsection

@section('content')


<div class="container">
    <div class="row">
        <div class="col-xl-6 col-sm-12 col-md-12 col-lg-12">
            @if (count($newOrders) === 0)
            <h4 class="display-4 text-center">Trenutno nema novih narudzbi</h4>
            @else 
            <h4 style="color: red" class="display-4 text-center">{{count($newOrders)===1 ? 'Imate novu narudzbu' : 'Imate nove narudzbe'}}</h4>  
            @endif

            @foreach ($newOrders as $index=> $newOrder)
            {{-- @dd($newOrder->userOrder) --}}
            <table class="table table-dark mb-5" style="width: 100%">
                <thead>
                    <tr>
                        <th scope="col">Order {{$index+1}}</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Order_id</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($newOrder->userOrder as $user)
                        
                            <tr>
                                <th scope="row"></th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$newOrder->id}}</td>
                                <td><a href="{{route('newOrderView',['id'=>$newOrder->id])}}" class="badge bg-warning text-dark text-decoration-none">Wiew</a></td>
                            </tr>
                 
                    @endforeach
                </tbody>
            </table>
            
                
            @endforeach
        </div>
    


        <div class="col-xl-6 col-sm-12 col-md-12 col-lg-12">
            <h4 class="display-4 text-center">Sve narudzbe</h4>
            @foreach ($allOrders as $index => $item)
            <table class="table table-dark mb-5" style="width: 100%">
                <thead>
                    <tr>
                        <th scope="col">Order {{$index+1}}</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Order_id</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($item ->userOrder as $user)
                    
                    <tr>
                        <th scope="row"></th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$item->id}}</td>
                        <td><a href="{{route('newOrderView',['id'=>$item->id])}}" class="badge bg-warning text-dark text-decoration-none">Wiew</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
                
            @endforeach
        </div>
    </div>
    
</div>


    
@endsection