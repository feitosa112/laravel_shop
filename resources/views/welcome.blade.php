@extends('layouts.app')

@section('title')
Welcome page

@endsection
@section('content')
{{-- @dd($bestSellingProducts) --}}
{{-- @dd($results->links()->elements) --}}

 <div class="container">
   @include('searchCard')
     <div class="row" style="">
        @foreach ($categories as $cat)

            <div class="col-2 me-2 col-md-2 col-lg-1 mb-2 mx-auto">
                <a href="{{route('thisCategory',['id'=>$cat->id])}}" style="text-decoration: none;color:black">
                    <img src="image/{{$cat->image}}" class="img-fluid"  style="border-radius: 50%;width:50px;height:50px;" alt="">
                    <p class="nazivkategorije">{{$cat->category_name}}</p>
                </a>
            </div>



        @endforeach
     </div>
</div>
<br>

<div class="container-fluid text-center">

    <div class="row">



        <div class="col-lg-1 me-5">
            <div class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="btn-group dropend flex-column d-none d-lg-flex">
                    @foreach ($categories as $cat)
                    @if ($cat->subcategories->isEmpty())
                        <a href="{{route('thisCategory',['id'=>$cat->id])}}" class="btn btn-primary mb-1">{{$cat->category_name}}</a>
                    @else
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle mb-1"  data-bs-toggle="dropdown" aria-expanded="false">
                                {{$cat->category_name}}
                            </button>
                            <ul class="dropdown-menu">
                                @foreach ($cat->subcategories as $subcat)
                                    <li><a class="dropdown-item" href="{{ route('thisSubCategory', ['id' => $subcat->id]) }}">{{$subcat->subcategory_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @endforeach
                </div>
            </div>
        </div>


        <div class="col-lg-8">
            <div class="row ms-5 me-2">
                @foreach ($results as $result)
                    <div class="col-6 col-md-6 col-sm-6 col-lg-4 mb-2">
                        <a href="{{route('thisProduct',['id'=>$result->id])}}" style="text-decoration: none;color:black">
                            <div class="card" style="border-radius: 5%;box-shadow:0px 0px 5px rgba(0,0,0,0.5);">
                                <div class="card-header">
                                    @if ($result->product_image != null)
                                        <img src="/image/{{$result->product_image}}" style="width: 100%;height:80%;" alt="Nema slike">
                                    @endif
                                </div>

                                <div class="card-body">
                                    <h4 class="text-dark text-decoration-none float-start">{{$result->product_name}}</h4>
                                    <a id="cijena" href="" class="badge bg-info float-end text-decoration-none">{{$result->price}} KM</a>

                                </div>

                                <div class="card-footer">
                                    @if (!Auth::user())
                                        <a href="{{route('login')}}" class="badge bg-secondary float-end text-decoration-none text-light"><small id="narudzba">Ulogujte se ako želite naručiti proizvod</small></a>
                                    @endif

                                    @if (Auth::user() && Auth::user()->email !== 'admin@gmail.com')
                                        @if (in_array($result->id,array_column(Session::get('cart',[]),'id')))
                                            <a href="" class="badge bg-secondary text-light float-end text-decoration-none badge-sm">Proizvod je u korpi</a>
                                        @else
                                            <a href="{{route('addToCart',['id'=>$result->id])}}" class="badge bg-warning text-dark float-end text-decoration-none">Dodaj u korpu</a>
                                        @endif
                                        <br><br>
                                        <div class="card-post-footer">
                                            <a href="{{route('payment.form',['id'=>$result->id])}}" id="narudzba" class="badge bg-success float-start text-decoration-none badge"><small class="text-white">Naruči i plati odmah</small></a>
                                            <a href="{{route('orderExecuteNow',['id'=>$result->id])}}" id="narudzba" class="badge bg-primary float-end text-decoration-none"><small>Naruci odmah</small></a>

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
                <div class="pagination justify-content-center">
                    @if ($paginator->currentPage() > 1)
                        <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-outline-primary me-2">&laquo; Previous</a>
                    @endif

                    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                        <a href="{{ $paginator->url($i) }}" class="btn btn-outline-primary me-2 {{ $paginator->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                    @endfor

                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-outline-primary ms-2">Next &raquo;</a>
                    @endif
                </div>
            </div>
        </div>


        @include('topProducts')
    </div>

</div>



@endsection
