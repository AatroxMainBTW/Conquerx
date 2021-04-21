<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
    <script defer src="{{ mix('js/app.js') }}"></script>

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
           background-color: #111827;
        }

    </style>
</head>
<body>
    <div id="app" >
        <div class="bg-gray-900 border-b-1 border-gray-300">
            <div >
                <nav class="flex flex-row justify-between">
                    <div class="ml-5 mt-5 mb-5">
                        <h1>
                            <a href="#">
                                <svg class="inline-block w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="white">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                                  </svg>
                                <span class="text-white text-xl font-serif font-bold">Conquerx</span>

                            </a>
                        </h1>
                    </div>

                    <div class="order-last mr-5 mt-5 mb-5">
                        @guest
                            @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="border-2 border-red-500 text-sm text-white rounded-full px-4 py-2 hover:bg-red-500 transition duration-500 mr-3">Login</a>
                        @endif
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="border-2 border-red-500 text-sm text-white rounded-full px-4 py-2 hover:bg-red-500 transition duration-500">Register</a>
                        @endif
                        @else
                        <a onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="border-2 border-red-500 text-sm text-white rounded-full px-4 py-2 hover:bg-red-500 transition duration-500 mr-3">Logout</a>
                        <a class="border-2 border-red-500 text-sm text-white rounded-full px-4 py-2 hover:bg-red-500 transition duration-500">{{ Auth::user()->name }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                        @endguest

                    </div>
                </nav>
            </div>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
