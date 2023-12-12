<div class="col-6 col-lg-2 col-md-6 col-sm-6 mx-auto mt-1" style="background-color:aquamarine">
    <h4>Najprodavaniji proizvodi</h4><br>

    @foreach ($bestSellingProducts as $topProduct)

       @foreach ($topProduct as $top)
       <a href="{{route('thisProduct',['id'=>$top->id])}}" class="text-tecoration-none text-dark">
            <div class="card">
                <div class="card-header">
                    <img class="img-fluid" src="/image/{{$top->product_image}}" alt="">
                </div>

                <div class="card-body">
                    <p class="float-start"><small>{{$top->product_name}}</small></p>
                    <a href="" class="badge bg-info bg-sm float-end">{{$top->price}}KM</a>
                </div>
            </div>
        </a><br>

       @endforeach

    @endforeach
</div>
