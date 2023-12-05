@extends('layouts.app')

@section('title')
Welcome page

@endsection
@section('content')
{{-- @dd($results->links()->elements) --}}
 <div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <form action="{{route('search')}}">
                <div class="input-group mb-3">
                    <input type="text" placeholder="Search" name="search" class="form-control">
                    <div class="input-group-append">
                        <button class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                    </div>
                </div>
            </form>

        </div>
     </div>
     <div class="row" style="margin-left: 15px">
        @foreach ($categories as $cat)
            <div class="col-1 m-2 text-center">
                <a href="{{route('thisCategory',['id'=>$cat->id])}}" style="text-decoration: none;color:black">
                    <img src="image/{{$cat->image}}" class="img-fluid" id="slicice"  style="border-radius: 50%;width:50px;height:50px;" alt="">
                    <p style="font-size: 10px">{{$cat->category_name}}</p>
                </a>
            </div>



        @endforeach
     </div>
</div>
<br>

        <div class="container">
            <div class="row">
                @foreach ($results as $result)

                <div class="col-5 col-sm-3 offset-1">
                    <a href="{{route('thisProduct',['id'=>$result->id])}}" style="text-decoration: none;color:black">
                        <div class="card" style="border-radius: 5%;box-shadow:0px 0px 5px rgba(0,0,0,0.5)">
                            <div class="card-header">
                                @if ($result->product_image != null)
                                <img src="/image/{{$result->product_image}}" style="width: 100%;height:80%;" alt="Nema slike">

                                @endif
                            </div>

                            <div class="card-body">
                                <h5 class="text-center">{{$result->product_name}}</h5>
                            </div>

                            <div class="card-footer">
                                <a href="" class="badge bg-info float-start text-decoration-none">{{$result->price}} KM</a>
                                @if (!Auth::user())
                                <a href="{{route('login')}}" class="badge bg-secondary float-end text-decoration-none text-light"><small>Ulogujte se ako zelite naruciti proizvod</small></a>

                                @endif
                                @if (Auth::user() && Auth::user()->email !== 'admin@gmail.com')
                                @if (in_array($result->id,array_column(Session::get('cart',[]),'id')))
                                <a href="" class="badge bg-secondary text-light float-end text-decoration-none">Proizvod je u korpi</a>
                                @else
                                <a href="{{route('addToCart',['id'=>$result->id])}}" class="badge bg-warning text-dark float-end text-decoration-none">Dodaj u korpu</a>

                            @endif
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


@endsection
