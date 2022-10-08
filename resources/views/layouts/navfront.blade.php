<nav class="px-6 py-1 bg-white shadow">
    <div class="container flex flex-col mx-auto md:flex-row md:items-center md:justify-between">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <a class="text-xl font-bold text-gray-800 md:text-2xl" href="{{ route('homepage') }}"><img
                        class="w-[80px] h-[30]" src="../images\rom.png" alt="logo-nasus"></a>
                @auth
                    <div class="p-2 mx-2 rounded-full bg-slate-400">
                        <i class="fa-solid fa-bell fa-lg uk_drop"></i>
                        <span class="p-1 rounded-full bg-slate-300"> {{ Auth::user()->unreadNotifications->count() }}</span>
                    </div>

                    <div uk-drop="mode: click;offset:5">
                        <div class="flex flex-col justify-center  bg-white w-[295px] max-w-sm mx-auto rounded-lg shadow-md">

                            @auth
                                <div class="border-b border-black ">

                                    <div class="flex m-2 rounded-lg hover:bg-slate-300">
                                        <img src="{{ Auth::user()->avatar != null ? Storage::url(Auth::user()->avatar) : asset('../images/rom.png') }}"
                                            class="my-3 w-[41px] h-[35px] mx-2 rounded-full" alt="">
                                        <p class="mx-3 font-bold text-black ">{{ Auth::user()->pseudo }}</p>
                                    </div>

                                </div>
                                @foreach (Auth::user()->notifications as $notification)
                                    <div class="flex flex-col p-2 rounded-lg hover:bg-slate-300">
                                        <a href="#" class="my-2 text-black hover:text-black hover:no-underline ">
                                            <div class="flex justify-center item-center">
                                                <img class="h-[35px] w-[35px] rounded-full my-2 mx-1"
                                                    src="{{ asset('storage' . $notification->data['user']['avatar']) }}"
                                                    alt="">
                                                <div>

                                                    <p>
                                                        <strong>{{ $notification->data['user']['pseudo'] }}</strong> A commenter
                                                        votre poste :
                                                        <span class="text-[#9558A3] hover:text-[#937CA3]">{{ $notification->data['post']['content'] }}</span> :
                                                    </p>
                                                    <p> <span class="hover:text-[#937CA3] bg-slate-300 rounded-full p-2">"{{ $notification->data['commentaire']['commentaire'] }}"</span>
                                                    </p>
                                                </div>
                                            </div>

                                            <time>
                                                {{ $notification->data['commentaire']['created_at'] }}</time>

                                        </a>
                                    </div>
                                @endforeach
                            @endauth
                        </div>
                    </div>
                @endauth

            </div>
            <div>
                <button type="button"
                    class="block text-gray-800 hover:text-gray-600 focus:text-gray-600 focus:outline-none md:hidden uk_drop">
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                        <path
                            d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z" />
                    </svg>
                </button>


                <div uk-drop="mode: click;offset:5">
                    <div class="flex flex-col justify-center  bg-white w-[295px] max-w-sm mx-auto rounded-lg shadow-md">
                        @guest
                            <div class="flex items-center m-1 my-2 border-b h-[36px]">
                                <i class="fa-solid fa-house"></i>
                                <a class="mx-3 my-2 font-bold text-black " href="{{ route('homepage') }}">Home</a>
                            </div>
                            <div class="flex items-center m-1 my-2 border-b h-[36px]">
                                <i class="fa-solid fa-user-check"></i>
                                <a class="mx-3 my-2 font-bold text-black " href="{{ route('login') }}">connexion</a>
                            </div>
                            <div class="flex items-center m-1 my-2 border-b h-[36px]">
                                <i class="fa-solid fa-user-plus"></i>
                                <a class="mx-3 my-2 font-bold text-black " href="{{ route('register') }}">s'inscrire</a>
                            </div>
                        @endguest

                        @auth
                            <div class="border-b border-black ">

                                <div class="flex m-2 rounded-lg hover:bg-slate-300">
                                    <img src="{{ Auth::user()->avatar != null ? Storage::url(Auth::user()->avatar) : asset('../images/rom.png') }}"
                                        class="my-3 w-[41px] h-[35px] mx-2 rounded-full" alt="">
                                    <p class="mx-3 font-bold text-black ">{{ Auth::user()->pseudo }}</p>
                                </div>

                            </div>
                            <div class="flex items-center m-1 my-2 border-b h-[36px]">
                                <i class="fa-solid fa-house"></i>
                                <a class="mx-3 my-2 font-bold text-black " href="{{ route('homepage') }}">Home</a>
                            </div>

                            <div class="flex items-center m-1 my-2 border-b h-[36px] ">
                                <i class="fa-solid fa-id-card"></i>
                                <a class="mx-3 font-bold text-black " href="#">Profile</a>
                            </div>


                            <div class="flex items-center m-1 my-2 border-b h-[36px] ">
                                <i class="fa-solid fa-people-group"></i>
                                <a class="mx-3 font-bold text-black " href="#">Communauté</a>
                            </div>

                            <div class="flex items-center m-1 my-2 border-b h-[36px] ">
                                <i class="fa-solid fa-sliders"></i>
                                <a class="mx-3 font-bold text-black " href="{{ route('list.user') }}">Backend</a>
                            </div>

                            <div class="flex items-center m-1 border-b h-[36px] ">
                                <i class="fa-solid fa-gear"></i>
                                <p class="mx-3 font-bold text-black ">Setting</p>
                            </div>


                            @if (Auth::user())
                                <div class="flex items-center m-1 border-b h-[36px] ">
                                    <i class="fa-solid fa-toolbox"></i>
                                    <p class="mx-3 font-bold text-black ">backend</p>
                                </div>
                            @endif
                            <div class="flex items-center m-1 ">
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
                        @endauth
                    </div>
                </div>












            </div>
        </div>

        <div class="hidden md:flex-row md:-mx-4 md:block">

            @auth
                <a class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0" href="{{ route('homepage') }}">Home</a>
                <a class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0" href="#">Profile</a>
                <a class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0" href="#">Communauté</a>
                <a class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0"
                    href="{{ route('list.user') }}">Backend</a>
            @endauth

        </div>

        @auth
            <div class="flex-col hidden md:flex-row md:-mx-4 md:block">

                <a href="#"> <img src="{{ Storage::url(Auth::user()->avatar) }}"
                        class="my-1 w-[41px] h-[35px] md:mx-4 md:my-0 rounded-full uk_drop" alt=""></a>
                <div uk-drop="mode: click;offset:5">
                    <div class="flex flex-col justify-center  bg-white w-[295px] max-w-sm mx-auto rounded-lg shadow-md">
                        <div class="border-b border-black ">
                            <div class="flex m-2 rounded-lg hover:bg-slate-300">
                                <img src="{{ Storage::url(Auth::user()->avatar) }}"
                                    class="my-3 w-[41px] h-[35px] mx-2 rounded-full" alt="">
                                <p class="mx-3 font-bold text-black ">{{ Auth::user()->pseudo }}</p>
                            </div>

                        </div>

                        <div class="flex items-center m-1 rounded-lg hover:bg-slate-300">
                            <i class="fa-solid fa-gear"></i>
                            <p class="mx-3 font-bold text-black ">Setting</p>
                        </div>


                        <div class="flex items-center m-1 rounded-lg hover:bg-slate-300">
                            <i class="fa-solid fa-toolbox"></i>
                            <p class="mx-3 font-bold text-black ">backend</p>
                        </div>


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
            <div class="flex-col hidden md:flex-row md:-mx-4 md:block">
                <a class="mx-3" href="{{ route('login') }}"> connexion </a>
                <a href="{{ route('register') }}"> s'inscrire </a>
            </div>

        @endguest
    </div>
</nav>
