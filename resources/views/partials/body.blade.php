<body style="background-color: #e9e9e9">
    <div id="app">
       @include('partials.navbar')
       @include('flash-message')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    </body>
    </html>