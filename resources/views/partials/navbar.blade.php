<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('home') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container-fluid" id="navbarNav">
        <ul class="navbar-nav float-start">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('allCategories') }}"><i class="fa fa-bars" aria-hidden="true"></i> Kategorije</a>
            </li>
            <li class="nav-item">
                <a href="{{route('exchangeRate')}}" class="nav-link"><i class="fa-solid fa-money-bill"></i> Kursna lista</a>
            </li>
        </ul>
        <ul class="navbar-nav float-end">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i> {{ __('Login') }}</a>
                    </li>
                @endif
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"><i class="fa fa-registered" aria-hidden="true"></i> {{ __('Register') }}</a>
                    </li>
                @endif
            @else
                @if (Auth::user() && Auth::user()->email === 'admin@gmail.com')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('addNewProduct') }}"><i class="fa fa-plus" aria-hidden="true"></i> Dodaj novi proizvod</a>
                    </li>
                    @if (App\Models\OrderModel::where('status', 'Naruceno')->exists())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('newOrder') }}" style="color:red"><i class="fa fa-external-link-square" aria-hidden="true"></i> You have new order</a>
                            <audio id="notification-sound">
                                <source src="/audio/notifications-sound-127856.mp3" type="audio/mpeg">
                            </audio>
                        </li>
                        <script>
                            var audio = document.getElementById('notification-sound');
                            audio.oncanplaythrough = function () {
                                audio.play();
                            };

                            var audio = new Audio("/audio/notifications-sound-127856.mp3");
                            var hasInteracted = false;

                            document.addEventListener("click", function() {
                            if (!hasInteracted) {
                            audio.play();
                            hasInteracted = true;
                                    }
    });
                        
                        </script>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('newOrder') }}"><i class="fa fa-bars" aria-hidden="true"></i> All orders</a>
                        </li>
                    @endif
                @endif
                @if (Auth::user()->email !== 'admin@gmail.com')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cartView') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart ({{ count(Session::get('cart', [])) }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('myOrder') }}"><i class="fa fa-bars" aria-hidden="true"></i> My orders</a>
                    </li>
                @endif
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
