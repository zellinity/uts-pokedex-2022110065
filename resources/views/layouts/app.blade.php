<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pokemon | Pokedex</title>
    <link rel="icon" href="{{ asset('storage/favicon.ico') }}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
            background-image: url("storage/background.png");
            background-size: cover; /* Change to cover for better scaling */
            background-repeat: no-repeat;
            background-position: center center;
            background-color: white;
        }

        .navbar {
            background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent */
            backdrop-filter: blur(10px); /* Blurring effect */
        }

        .navbar-brand {
            font-weight: bold;
            color: #007bff; /* Bootstrap primary color */
            transition: color 0.3s; /* Smooth color transition */
            font-size: 1.5rem; /* Larger font size */
        }

        .navbar-brand:hover {
            color: #0056b3; /* Darker shade on hover */
        }

        .nav-link {
            color: #6c757d; /* Bootstrap secondary color */
            transition: color 0.3s, background-color 0.3s; /* Smooth color transition */
            padding: 0.5rem 1rem; /* Adding padding for a button-like appearance */
            border-radius: 5px; /* Rounded corners */
        }

        .nav-link:hover {
            color: white; /* Change text color on hover */
            background-color: #007bff; /* Bootstrap primary color on hover */
        }

        .dropdown-menu {
            background-color: #f8f9fa; /* Light background for dropdown */
            border: 1px solid rgba(0, 0, 0, 0.1); /* Subtle border */
        }

        .dropdown-item:hover {
            background-color: #007bff; /* Highlight dropdown item on hover */
            color: white; /* Change text color */
        }

        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.2rem; /* Smaller font size on mobile */
            }
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Pokedex Home 
                </a>
                <a class="navbar-brand" href="{{ route('pokemon.index') }}">
                    Pokedex List
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <!-- Additional links can be added here -->
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
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
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
