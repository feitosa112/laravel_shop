
<div class="container">
    <div class="row">

        @foreach ($results as $result)
        <div class="col-6 col-md-6 col-sm-6 col-lg-3 mb-3">
            <a href="{{route('thisProduct',['name'=>$result->product_name,'id'=>$result->id])}}" style="text-decoration: none;color:black">
                <div class="card" style="border-radius: 5%;box-shadow:0px 0px 5px rgba(0,0,0,0.5);">
                    <div class="card-header">
                        @if ($result->product_image != null)
                            <img src="/image/{{$result->product_image}}" style="width: 100%;height:80%;" alt="Nema slike">
                        @endif
                    </div>

                    <div class="card-body">
                        <h4 class="text-dark text-decoration-none float-start">{{$result->product_name}}</h4>
                        <a href="" class="badge bg-info float-end text-decoration-none">{{$result->price}} KM</a>

                    </div>

                    <div class="card-footer">
                        @if (!Auth::user())
                            <a href="{{route('login')}}" class="badge bg-secondary float-end text-decoration-none text-light"><small>Ulogujte se ako želite naručiti proizvod</small></a>
                        @endif

                        @if (Auth::user() && Auth::user()->email !== 'admin@gmail.com')
                            @if (in_array($result->id,array_column(Session::get('cart',[]),'id')))
                                <a href="" class="badge bg-secondary text-light float-end text-decoration-none badge-sm">Proizvod je u korpi</a>
                            @else
                                <a href="{{route('addToCart',['id'=>$result->id])}}" class="badge bg-warning text-dark float-end text-decoration-none">Dodaj u korpu</a>
                            @endif
                            <br><br>
                            <div class="card-post-footer">
                                <a href="{{route('payment.form',['id'=>$result->id])}}" class="badge bg-success float-start text-decoration-none badge"><small class="text-white">Naruči i plati odmah</small></a>
                                <a href="{{route('orderExecuteNow',['id'=>$result->id])}}" class="badge bg-primary float-end text-decoration-none"><small>Naruci odmah</small></a>

                            </div>
                        @endif

                        @if (Auth::user() && Auth::user()->email === 'admin@gmail.com')
                            <a href="{{route('editProductView',['id'=>$result->id])}}" class="badge bg-warning text-dark  float-end text-decoration-none">Edit</a>
                            <a href="{{route('deleteProduct',['id'=>$result->id])}}" class="badge bg-danger text-dark float-end text-decoration-none">Delete</a>
                        @endif
                    </div><br>

                    <p class="float-left"><small><i>Broj pregleda:{{$result->views}}</i></small></p>
                </div><br>
            </a>
        </div>
    @endforeach


    </div>
</div>



