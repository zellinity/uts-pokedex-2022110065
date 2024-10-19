<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pokemon | Pokedex</title>
    <link rel="icon" href="{{ asset('storage/favicon.ico') }}" type="image/x-icon">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
            background-image: url("storage/background.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            background-color: white;
        }

        .navbar {
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
        }

        .navbar-brand {
            font-weight: bold;
            color: #007bff;
            transition: color 0.3s;
            font-size: 1.5rem;
        }

        .navbar-brand:hover {
            color: #0056b3;
        }

        .nav-link {
            color: #6c757d;
            transition: color 0.3s, background-color 0.3s;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }

        .nav-link:hover {
            color: white;
            background-color: #007bff;
        }

        .dropdown-menu {
            background-color: #f8f9fa;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .dropdown-item:hover {
            background-color: #007bff;
            color: white;
        }

        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.2rem;
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
                    <ul class="navbar-nav me-auto">
                    </ul>
                    <ul class="navbar-nav ms-auto">
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
