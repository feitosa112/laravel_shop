
<div class="container">
    <div class="row">

            @foreach ($results as $result)
            <a href="{{route('thisProduct',['id'=>$result->id])}}" class="text-decoration-none text-dark">
                <div class="col-12 col-sm-3 m-5 text-center" style="border:1px dotted #a7b2c2">
                    @if ($result->product_image != null)
                    <img src="/image/{{$result->product_image}}" class="img-fluid" style="width: 250px;height:200px" alt=""><br>
                    @endif


                    <p><b>{{$result->product_name}}</b></p>
                    <a href="" class="btn btn-success btn-sm float-left">{{$result->price}} KM</a>
                    @if (Auth::user() && Auth::user()->email !== 'admin@gmail.com')

                        @if (in_array($result->id,array_column(Session::get('cart',[]),'id')))
                            <a href="" class="badge bg-secondary text-light float-end text-decoration-none">Proizvod je u korpi</a>
                            @else
                            <a href="{{route('addToCart',['id'=>$result->id])}}" class="badge bg-warning text-dark float-end text-decoration-none">Dodaj u korpu</a>

                        @endif
                        <br><br>
                        <div class="card-post-footer">
                            <a href="{{route('payment.form',['id'=>$result->id])}}" class="badge bg-success float-start text-decoration-none">Naruci i plati odmah</a>
                            <a href="{{route('orderExecuteNow',['id'=>$result->id])}}" class="badge bg-primary float-end text-decoration-none">Naruci odmah</a>

                        </div>
                        @endif


                        @if (Auth::user() && Auth::user()->email === 'admin@gmail.com')
                            <a href="{{route('deleteProduct',['id'=>$result->id])}}" class="btn btn-danger text-dark float-right text-decoration-none">Delete</a>
                            <a href="{{route('editProductView',['id'=>$result->id])}}" class="btn btn-warning text-dark float-right text-decoration-none">Edit</a>
                        @endif
                        <br><br>
                        <p class="float-left"><small><i>Broj pregleda:{{$result->views}}</i></small></p>
                </div>
            </a>

            @endforeach


    </div>
</div>



