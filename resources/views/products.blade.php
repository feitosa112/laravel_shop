<div class="row">
        
    @foreach ($results as $result)
    <a href="{{route('thisProduct',['id'=>$result->id])}}">
        <div class="col-3 m-5" style="border:1px dotted #a7b2c2">
            <img src="/image/{{$result->product_image}}" style="width: 150px;height:100px" alt="">
            <p><b>{{$result->product_name}}</b></p>
            <a href="" class="btn btn-success btn-sm float-left">{{$result->price}} KM</a>
            @if (Auth::user())
                
                @if (in_array($result->id,array_column(Session::get('cart',[]),'id')))
                    <a href="" class="btn btn-secondary btn-sm float-right">Proizvod je u korpi</a>
                    @else
                    <a href="{{route('addToCart',['id'=>$result->id])}}" class="btn btn-warning btn-sm float-right">Dodaj u korpu</a>

                @endif
                @endif
        </div>
    </a>
        
    @endforeach     
</div>
