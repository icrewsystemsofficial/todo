<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none">
    <div id="app">
        <nav class="bg-white shadow mb-8 py-5">
            <div class="container mx-auto px-6 md:px-0">
                <div class="flex items-center justify-center">
                    <div class="mr-3">
                        <a href="{{ url('/') }}">
                            <img  src="https://icrewsystems.com/portal/files/system/_file5ec7c1154efd1-site-logo.png" alt="">
                        </a>
                    </div>
                    <div class="flex-1 text-right">
                        @guest
                            <a class="no-underline hover:underline text-gray-600 text-sm p-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a class="no-underline hover:underline text-gray-600 text-sm p-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                            <span class="text-gray-600 text-sm pr-4">{{ Auth::user()->name }}</span>

                            <a href="{{ route('logout') }}"
                               class="no-underline hover:underline text-gray-600 text-sm p-3"
                               onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
</body>
</html>
