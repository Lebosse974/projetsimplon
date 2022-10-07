<nav class="px-6 py-1 bg-white shadow">
    <div class="container flex flex-col mx-auto md:flex-row md:items-center md:justify-between">
        <div class="flex items-center justify-between">
            <div>
                <a class="text-xl font-bold text-gray-800 md:text-2xl" href="{{ route('homepage') }}"><img class="w-[80px] h-[30]" src="../images/rom.png" alt="logo-nasus"></a>
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
            <a class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0"
                href="{{ route('homepage') }}">Home</a>
            <a class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0" href="{{ route('list.user') }}">crud user</a>
            <a class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0" href="#">crud communauté</a>
            <a class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0" href="{{ route('admin.post.index') }}">crud post</a>
        </div>
        @auth

            <div class="flex flex-col md:flex-row md:-mx-4">

                <a href="#"> <img
                        src="{{ Storage::url(Auth::user()->avatar) }}"
                        class="my-1 w-[41px] h-[35px] md:mx-4 md:my-0 rounded-full uk_drop" alt=""></a>
                <div uk-drop="mode: click;offset:5">
                    <div
                        class="flex flex-col justify-center  bg-white w-[295px] max-w-sm mx-auto rounded-lg shadow-md">
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
                        @if (Auth::user())
                            <div class="flex items-center m-1 rounded-lg hover:bg-slate-300">
                                <i class="fa-solid fa-toolbox"></i>
                                <p class="mx-3 font-bold text-black ">front</p>
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
                <a class="mx-3" href="{{ route('login') }}"> loggin </a>
                <a href="{{ route('register') }}"> register </a>
            </div>

        @endguest
    </div>
</nav>