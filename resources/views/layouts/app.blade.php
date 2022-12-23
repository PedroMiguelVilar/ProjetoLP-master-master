<!doctype html>

<?php
use App\Http\Controllers\CartController;

$total=CartController::cartItem();
?>


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
<style>body { background: #212534;}.container {} nav ul li { list-style: none; cursor: pointer; position: relative; } nav ul li:after { content: ""; width: 0; height: 3px; background: #ffcc00; position: absolute; left: 0; bottom: -10px; transition: 0.5s; } nav ul li:hover::after { width: 100%; }</style>

<body >
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <style> #infoi{position: absolute; margin-left: auto; margin-right: auto; z-index: 10;} * { border: 0; box-sizing: border-box; margin: 0; padding: 0; } button, input { font: 1em Hind, sans-serif; line-height: 1.5em; } input { color: #171717; } .search-bar { display: flex; } .search-bar input, .search-btn, .search-btn:before, .search-btn:after { transition: all 0.25s ease-out; } .search-bar input, .search-btn { width: 3em; height: 3em; } .search-bar input:invalid:not(:focus), .search-btn { cursor: pointer; } .search-bar, .search-bar input:focus, .search-bar input:valid { width: 100%; } .search-bar input:focus, .search-bar input:not(:focus)+.search-btn:focus { outline: transparent; } .search-bar { margin: auto; padding: ; justify-content: center; max-width: 30em; } .search-bar input { background: transparent; border-radius: 1.5em; box-shadow: 0 0 0 0.4em #171717 inset; padding: 0.75em; transform: translate(0.5em, 0.5em) scale(0.5); transform-origin: 100% 0; -webkit-appearance: none; -moz-appearance: none; appearance: none; } .search-bar input::-webkit-search-decoration { -webkit-appearance: none; } .search-bar input:focus, .search-bar input:valid { background: #fff; border-radius: 0.375em 0 0 0.375em; box-shadow: 0 0 0 0.1em #d9d9d9 inset; transform: scale(1); } .search-btn { background: #171717; border-radius: 0 0.75em 0.75em 0 / 0 1.5em 1.5em 0; padding: 0.75em; position: relative; transform: translate(0.25em, 0.25em) rotate(45deg) scale(0.25, 0.125); transform-origin: 0 50%; } .search-btn:before, .search-btn:after { content: ""; display: block; opacity: 0; position: absolute; } .search-btn:before { border-radius: 50%; box-shadow: 0 0 0 0.2em #f1f1f1 inset; top: 0.75em; left: 0.75em; width: 1.2em; height: 1.2em; } .search-btn:after { background: #f1f1f1; border-radius: 0 0.25em 0.25em 0; top: 51%; left: 51%; width: 0.75em; height: 0.25em; transform: translate(0.2em, 0) rotate(45deg); transform-origin: 0 50%; } .search-btn span { display: inline-block; overflow: hidden; width: 1px; height: 1px; } /* Active state */ .search-bar input:focus+.search-btn, .search-bar input:valid+.search-btn { background: #2762f3; border-radius: 0 0.375em 0.375em 0; transform: scale(1); } .search-bar input:focus+.search-btn:before, .search-bar input:focus+.search-btn:after, .search-bar input:valid+.search-btn:before, .search-bar input:valid+.search-btn:after { opacity: 1; } .search-bar input:focus+.search-btn:hover, .search-bar input:valid+.search-btn:hover, .search-bar input:valid:not(:focus)+.search-btn:focus { background: #0c48db; } .search-bar input:focus+.search-btn:active, .search-bar input:valid+.search-btn:active { transform: translateY(1px); } @media screen and (prefers-color-scheme: dark) { input { color: #f1f1f1; } .search-bar input { box-shadow: 0 0 0 0.4em #222534 inset; } .search-bar input:focus, .search-bar input:valid { background: #3d3d3d; box-shadow: 0 0 0 0.1em #3d3d3d inset; } .search-btn { background: #222534; } } </style>
                    <style>a{text-decoration:none;}</style>
                    <ul class="navbar-nav me-auto">
                    </ul>
                    @if(Request::url() === 'http://127.0.0.1:8000')
                    <meta name="_token" content="{{ csrf_token() }}">
                    <title>Live Search</title>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                    <form action="/searchproducts" class="search-bar" >
                        <input name="search" id="search" pattern=".*\S.*" required >
                        <button class="search-btn" id="searchbutton">
                            <span>Search</span>
                        </button>
                    </form>
                    <table id="infoi" id="mytable" style="width:20%" class="center"> 
                        <tbody> 
                        </tbody>
                    </table>
                    <script type="text/javascript"> $('#search').on('keyup', function() { $value = $(this).val(); $.ajax({ type: 'get', url: '{{ URL::to('search') }}', data: { 'search': $value }, success: function(data) { $('tbody').html(data); } }); }) </script>
                    @endif
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @Auth
                        <li class="nav-item">
                            <a class="nav-link" class ="container" href="{{ route('products.create') }}"> Sell </a>
                        </li>
                        
                        @if(Auth::user()->role == 2)
                        <li class="nav-item">
                            <a class="nav-link" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Admin
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.showproducts') }}">
                                    {{ __('Products') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.showusers') }}">Users</a>
                            </div>


                        </li>
                        @endif
                        @if(Auth::user()->role == 1)
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('welcome') }}"> Staff </a>
                        </li>
                        @endif
                        @endAuth
                        @guest
                            @if (Route::has('login'))
                                <a class="nav-link">Hi! </a>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <a class="nav-link"> or </a>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart.show') }}">Cart ({{$total}})</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('wishlist.show') }}">Wishlist</a>
                        </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" class ="container" href="{{ route('purchaseditems') }}"> My Orders </a>
                                    <a class="dropdown-item" class ="container" href="{{ route('myproducts') }}"> My Ads </a>
                                    <a class="dropdown-item" class ="container" href="{{ route('solditems') }}"> My Sells </a>
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
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
