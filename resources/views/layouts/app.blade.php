<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nafran Realestate</title>
    <linK rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between">
        <ul class="flex items-center">
            <li>
                <a href="/" class="p-3">Home</a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
            </li>
            <li>
                <a href="/videos" class="p-3">Video</a>
            </li>
        </ul>

        <ul class="flex items-center">
            @auth
                <li>
                    <a href="" class="p-3">{{ auth()->user()->name }}</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="post" class="inline p-3">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            @endauth
            @guest
                <li>
                    <a href="{{ route('login') }}" class="p-3">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="p-3">Register</a>
                </li>
            @endguest
        </ul>
    </nav>

    {{-- body start --}}
    <div class="relative min-h-screen md:flex">

        {{-- mobile menu bar start --}}
            <div class="bg-gray-800 text-gray-100 flex justify-between md:hidden">
                <a href="#" class="block p-4 text-white font-bold">Nafran</a>

                {{-- mobile button --}}
                <button class="mobile-menu-button p-4 focus:outline-none focus:bg-gray-700">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                      </svg>
                </button>
            </div>
        {{-- mobile menu bar end --}}

        {{-- sidebar start --}}
        <div class="sidebar bg-gray-700 text-white w-64 space-y-6 py-2 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">
            <nav class="nav-bar">
                <a href="#" class="block py-2.5 px-4 hover:bg-gray-800 focus:bg-gray-900 rounded transition duration-200">Apartments</a>
                <a href="/videos" class="block py-2.5 px-4 hover:bg-gray-800 focus:bg-gray-900 rounded transition duration-200">Videos</a>
                <a href="#" class="block py-2.5 px-4 hover:bg-gray-800 focus:bg-gray-900 rounded transition duration-200">Payments</a>
                <a href="#" class="block py-2.5 px-4 hover:bg-gray-800 focus:bg-gray-900 rounded transition duration-200">Section 1</a>
            </nav>
        </div>
        {{-- sidebar end --}}

        {{-- main section start --}}
        <div class="flex-1 py-2 px-2">
            @yield('content')
        </div>
        {{-- main section end --}}

    </div>
    {{-- body end --}}
    <script src="{{ asset('js/menu_button.js') }}"></script>
</body>
</html>