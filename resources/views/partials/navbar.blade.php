<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('home')}}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <a href="{{route('allCategories')}}" class="nav-link"><i class="fa fa-bars" aria-hidden="true"></i> Kategorije</a>
      </ul>

      
      <ul class="navbar-nav ms-auto">
        <!-- Authentication Links -->
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> {{ __('Login') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}"><i class="fa fa-registered" aria-hidden="true"></i> {{ __('Register') }}</a>
                </li>
            @endif
        @else
            @if (Auth::user() && Auth::user()->email === 'admin@gmail.com')
            <a href="{{route('addNewProduct')}}" class="nav-link"><i class="fa fa-plus" aria-hidden="true"></i> Dodaj novi proizvod</a>
            @if (App\Models\OrderModel::where('status','Naruceno')->exists())
                <a href="{{route('newOrder')}}"class="nav-link" style="color:red"><i class="fa fa-external-link-square" aria-hidden="true"></i> You have new order</a>
                @else
                <a href="{{route('newOrder')}}"class="nav-link"><i class="fa fa-bars" aria-hidden="true"></i> All order</a>

            @endif
            @endif
            @if (Auth::user()->email !== 'admin@gmail.com')
            <a href="{{route('cartView')}}" class="nav-link"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart({{count(Session::get('cart',[]))}})</a> 
            <a href="{{route('myOrder')}}" class="nav-link"><i class="fa fa-bars" aria-hidden="true"></i> My order</a>

            @endif
                
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                
            </li>
        @endguest
        
    </ul>
    </div>
  </nav>
  