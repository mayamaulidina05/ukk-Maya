<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    @if(auth()->check()){{ auth()->user()->name }}@else {{__('Halooo')}} @endif
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                        @if (auth()->user()->type == 'admin')
                        <li class= "nav-item">
                            <a class="nav-link" href="{{ route('admin.home') }}">Dashboard</a>
                        </li>
                        <li class= "nav-item">
                            <a class="nav-link" href="{{ route('Masyarakat.index') }}">Masyarakat</a>
                        </li> 
                        <li class= "nav-item">
                            <a class="nav-link" href="{{ url('/tanggapanview') }}">Tanggapan</a>
                        </li>
                            @endif

                        @if (auth()->user()->type == 'manager')
                        <li class= "nav-item">
                            <a class="nav-link" href="{{ route('manager.home') }}">Dashboard</a>
                        </li>
                        <li class= "nav-item">
                            <a class="nav-link" href="{{ route('Masyarakat.index') }}">Masyarakat</a>
                        </li> 
                        <li class= "nav-item">
                            <a class="nav-link" href="{{ url('/tanggapanview') }}">Tanggapan</a>
                        </li>
                        <li class= "nav-item">
                            <a class="nav-link" href="{{ ('Masyarakat.laporan') }}">Laporan</a>
                        </li>
                            @endif
                        
                            @if(auth()->user()->type == 'user')
                        <li class= "nav-item">
                            <a class="nav-link" href="/home">Pengaduan</a>
                        </li>
                        <li class= "nav-item">
                            <a class="nav-link" href="{{ url('/tanggapanview') }}">Tanggapan</a>
                        </li>
                           @endif
                        <li class= "nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/datatables.js') }}"></script>
    @yield('script')
</body>
</html>
