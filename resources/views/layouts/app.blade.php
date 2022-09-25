{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
    
    
        <!-- UIkit CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.15.8/dist/css/uikit.min.css" />
    
        <!-- UIkit JS -->
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.8/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.8/dist/js/uikit-icons.min.js"></script>
        <script src="https://kit.fontawesome.com/5373dfbc9f.js" crossorigin="anonymous"></script>
        <title>projet</title>
    </head>
    
<body>
    <div id="app" class="bg-gray-100 font-roboto">

        <nav class="px-6 py-4 bg-white shadow">
            <div class="container flex flex-col mx-auto md:flex-row md:items-center md:justify-between">
                <div class="flex items-center justify-between">
                    <div>
                        <a class="text-xl font-bold text-gray-800 md:text-2xl" href="#">Meraki <span
                                class="text-blue-500">UI</span></a>
                    </div>
                    <div>
                        <button type="button"
                            class="block text-gray-800 hover:text-gray-600 focus:text-gray-600 focus:outline-none md:hidden">
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z" />
                            </svg>
                        </button>
                    </div>
                </div>
                
                <div class="flex flex-col md:flex-row md:-mx-4">
                    <a class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0" href="{{ route('homepage') }}">Home</a>
                    <a class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0" href="#">Profile</a>
                    <a class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0" href="#">Communauté</a>
                    <a class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0" href="{{route('list.user')}}">Backend</a>
                </div>
                @auth
                    
                <div class="flex flex-col md:flex-row md:-mx-4">
                   
                    <a href="#"> <img src="https://i-sam.unimedias.fr/2021/10/01/bienfaits-pommes.jpeg?auto=format%2Ccompress&cs=tinysrgb&h=630&w=1200" class="my-1 w-[41px] h-[35px] md:mx-4 md:my-0 rounded-full uk_drop" alt=""></a>
                    <div uk-drop="mode: click;offset:5">
                        <div class="flex flex-col justify-center  bg-white w-[295px] max-w-sm mx-auto rounded-lg shadow-md">
                            <div class="border-b border-black ">
                                <div class="flex m-2 rounded-lg hover:bg-slate-300">
                                    <img src="https://i-sam.unimedias.fr/2021/10/01/bienfaits-pommes.jpeg?auto=format%2Ccompress&cs=tinysrgb&h=630&w=1200" class="my-3 w-[41px] h-[35px] mx-2 rounded-full" alt="">
                                <p class="mx-3 font-bold text-black ">{{Auth::user()->name}}</p>
                                </div>
                                
                            </div>
                            <div class="flex items-center m-1 rounded-lg hover:bg-slate-300">
                                <i class="fa-solid fa-gear"></i>
                            <p class="mx-3 font-bold text-black ">Setting</p>
                            </div>
                            @if (Auth::user())
                            <div class="flex items-center m-1 rounded-lg hover:bg-slate-300">
                                <i class="fa-solid fa-toolbox"></i>
                            <p class="mx-3 font-bold text-black ">backend</p>
                            </div>
                            @endif
                            <div class="flex items-center m-1 rounded-lg hover:bg-slate-300">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
        
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endauth
                @guest
                <div>
                    <a class="mx-3" href="{{route('login')}}"> loggin </a>
                    <a href="{{route('register')}}"> register </a>
                </div>
                    
                @endguest
            </div>
        </nav>

    @yield('main')
    
    </div>

</body>
</html>
