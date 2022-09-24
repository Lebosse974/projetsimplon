@extends('layouts.app')
@section('main')

    <div class="px-0 py-8 lg:px-6 ">
        <div class="container flex justify-between mx-auto">
            <div class="w-full lg:w-6/12 ml-0 lg:ml-[150px]">
                <div x-data="{ modelOpen: false }">
                   
                
                <div class="px-4 mb-4 bg-white rounded-lg shadow-md ">
                    <div class="flex items-center ">
                        <div>
                            <a class="text-xs font-bold text-gray-800 md:text-2xl" href="#">Meraki <span
                                    class="text-blue-500">UI</span></a>

                        </div>
                        <form class="uk-search uk-3 uk-align-center uk-search-default">
                            <span uk-search-icon></span>
                            <input class="uk-search-input" type="search" placeholder="Search">
                        </form>
                    </div>
                </div>
                <div class="px-4 py-6 bg-white rounded-lg shadow-md ">
                    <div class="flex items-center justify-between">
                        <h1 class="text-xl font-bold text-gray-700 md:text-2xl">Tendance du jour</h1> 
                    </div>
                    <div class="mt-6">
                        

                        <div class="uk-position-relative uk-visible-toggle uk-light " tabindex="-1" uk-slider>
                            <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m">
                                <li>
                                    <img src="https://getuikit.com/docs/images/slider4.jpg"width="195" height="200"
                                        alt="">
                                    <div class="uk-position-center uk-panel">
                                        <h1>1</h1>
                                    </div>
                                </li>
                                <li>
                                    <img src="https://getuikit.com/docs/images/slider4.jpg" width="195" height="200"
                                        alt="">
                                    <div class="uk-position-center uk-panel">
                                        <h1>2</h1>
                                    </div>
                                </li>
                                <li>
                                    <img src="https://getuikit.com/docs/images/slider4.jpg" width="195" height="200"
                                        alt="">
                                    <div class="uk-position-center uk-panel">
                                        <h1>3</h1>
                                    </div>
                                </li>
                                <li>
                                    <img src="https://getuikit.com/docs/images/slider4.jpg" width="195" height="200"
                                        alt="">
                                    <div class="uk-position-center uk-panel">
                                        <h1>4</h1>
                                    </div>
                                </li>
                                <li>
                                    <img src="https://getuikit.com/docs/images/slider4.jpg" width="195" height="200"
                                        alt="">
                                    <div class="uk-position-center uk-panel">
                                        <h1>4</h1>
                                    </div>
                                </li>
                            </ul>
                            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#"
                                uk-slidenav-previous uk-slider-item="previous"></a>
                            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#"
                                uk-slidenav-next uk-slider-item="next"></a>
                        </div>
                    </div>
                    
                </div>
                @include('post.show')
                
                </div>
               
                {{-- post --}}
                <div class="px-4 my-4 bg-white rounded-lg shadow-md ">
                    <div class="flex flex-col ">
                        <div class="flex items-center">
                            <img src="https://getuikit.com/docs/images/slider4.jpg" alt="" class="rounded-full"
                                width="24" height="26">
                            <a href="#"
                                class="hidden px-2 font-bold text-black lg:block sm:text-xs lg:text-base">chieef
                                kieef</a>
                            <p class="text-sm lg:text-base"> posted by Lebosse974. <span class="text-gray-500">1
                                    heure</span></p>
                        </div>
                        <p class="text-sm lg:text-base">STUG - The ultimate top-down tank game. Angle your armor to
                            bounce enemy shells,
                            and ricochet shots off walls into the enemy’s weak spots. Fight in PvP battles to unlock
                            new vehicles,
                            inspired by your favorite tanks. Play now for free in your browser!
                        </p>
                        <img src="https://i-sam.unimedias.fr/2021/10/01/bienfaits-pommes.jpeg?auto=format%2Ccompress&cs=tinysrgb&h=630&w=1200"
                            alt="" class=" sm:h-[250px] py-4 lg:w-full md:h-[450px] lg:h-[650px]">
                    </div>
                </div>
                <div class="px-4 my-4 bg-white rounded-lg shadow-md ">
                    <div class="flex flex-col ">
                        <div class="flex items-center">
                            <img src="https://getuikit.com/docs/images/slider4.jpg" alt="" class="rounded-full"
                                width="24" height="26">
                            <a href="#" class="font-bold text-black ">chieef kieef</a>
                            <p> posted by Lebosse974. <span class="text-gray-500">1 heure</span></p>
                        </div>
                        <p>STUG - The ultimate top-down tank game. Angle your armor to bounce enemy shells,
                            and ricochet shots off walls into the enemy’s weak spots. Fight in PvP battles to unlock
                            new vehicles,
                            inspired by your favorite tanks. Play now for free in your browser!
                        </p>
                        <img src="https://getuikit.com/docs/images/slider4.jpg" alt=""
                            class="w-full h-[650px] py-4">
                    </div>
                </div>
            </div>



            {{-- SIDE BAR RIGHT --}}
            <div class="hidden w-4/12 -mx-8 lg:block">
                <div class="px-8">

                    {{-- home --}}
                    <div class="flex flex-col justify-center bg-white w-[295px] max-w-sm mx-auto rounded-lg shadow-md">
                        <div
                            class="w-full h-[80px] bg-[url('https://i-sam.unimedias.fr/2021/10/01/bienfaits-pommes.jpeg?auto=format%2Ccompress&cs=tinysrgb&h=630&w=1200')]">
                        </div>
                        <h1 class="m-1 text-xl font-bold text-center">Home</h1>

                        <p class="px-4 py-1 my-1 text-sm lg:text-base">Your personal Reddit frontpage. Come here
                            to check in with your favorite communities.</p>

                        <div class="flex flex-col ">
                            
                            <a class="rounded-lg bg-[#008AFF] text-white w-2/3 ml-[65px] my-4 py-2 h-[40px] text-center" href="#modal-sections" uk-toggle>Create Post</a>

                            <div id="modal-sections" uk-modal>
                                <div class="uk-modal-dialog">
                                    <button class="uk-modal-close-default" type="button" uk-close></button>
                                    <div class="uk-modal-header">
                                        <h2 class="uk-modal-title"> Create Post </h2>
                                    </div>
                                    <form action="{{ route('post.store') }}" method="POST">
                                        @csrf
                                        <div class="uk-modal-body">
                                           <div class="flex flex-col">
                                            <input type="hidden" value="@if (Auth::check())
                                                {{$user->id}}
                                            @endif">
                                            <label for="titre">content</label>
                                           <input type="text" name="content" class="rounded-lg hover:bg-slate-300" placeholder="entrer votre texte" required>
                                           <label for="titre">image</label>
                                           <input type="file">
                                           </div>
                                           

                                        </div>
                                        <div class="uk-modal-footer uk-text-right">
                                            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                                            <button class="uk-button uk-button-primary" type="submit">Save</button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                            <button class="rounded-lg bg-[#CCE8FE] text-[#3275AC] w-2/3 ml-[65px] mb-4 h-[40px] ">
                                Create Communauty </button>
                        </div>
                    </div>

                    {{-- top commaunté --}}
                    <div class="mt-10">

                        <div class="flex flex-col justify-center bg-white w-[295px] max-w-sm mx-auto rounded-lg shadow-md">
                            <h1 class="pb-2 m-1 mb-3 text-xl font-bold text-center border-b-2 border-black"> top communities
                            </h1>
                            <img src="https://i-sam.unimedias.fr/2021/10/01/bienfaits-pommes.jpeg?auto=format%2Ccompress&cs=tinysrgb&h=630&w=1200"
                                class="my-3 w-full h-[140px] rounded-lg" alt="">
                            <div class="flex items-center border-b border-black">
                                <p class="px-2 m-0">1</p>
                                <i class="fa-solid fa-chevron-up"></i>
                                <img src="https://i-sam.unimedias.fr/2021/10/01/bienfaits-pommes.jpeg?auto=format%2Ccompress&cs=tinysrgb&h=630&w=1200"
                                    class="my-3 w-[41px] h-[35px] mx-2 rounded-full" alt="">
                                <p class="mx-3 font-bold text-black ">Lebosse974</p>
                                <button class="rounded-lg bg-[#008AFF] text-white w-[72px]  my-4 h-[30px]">
                                    Join </button>
                            </div>
                            <div class="flex items-center border-b border-black">
                                <p class="px-2 m-0">1</p>
                                <i class="fa-solid fa-chevron-up"></i>
                                <img src="https://i-sam.unimedias.fr/2021/10/01/bienfaits-pommes.jpeg?auto=format%2Ccompress&cs=tinysrgb&h=630&w=1200"
                                    class="my-3 w-[41px] h-[35px] mx-2 rounded-full" alt="">
                                <p class="mx-3 font-bold text-black ">Lebosse974</p>
                                <button class="rounded-lg bg-[#008AFF] text-white w-[72px]  my-4 h-[30px]">
                                    Join </button>
                            </div>
                            <div class="flex items-center border-b border-black">
                                <p class="px-2 m-0">1</p>
                                <i class="fa-solid fa-chevron-up"></i>
                                <img src="https://i-sam.unimedias.fr/2021/10/01/bienfaits-pommes.jpeg?auto=format%2Ccompress&cs=tinysrgb&h=630&w=1200"
                                    class="my-3 w-[41px] h-[35px] mx-2 rounded-full" alt="">
                                <p class="mx-3 font-bold text-black ">Lebosse974</p>
                                <button class="rounded-lg bg-[#008AFF] text-white w-[72px]  my-4 h-[30px]">
                                    Join </button>
                            </div>
                            <div class="flex items-center border-b border-black">
                                <p class="px-2 m-0">1</p>
                                <i class="fa-solid fa-chevron-up"></i>
                                <img src="https://i-sam.unimedias.fr/2021/10/01/bienfaits-pommes.jpeg?auto=format%2Ccompress&cs=tinysrgb&h=630&w=1200"
                                    class="my-3 w-[41px] h-[35px] mx-2 rounded-full" alt="">
                                <p class="mx-3 font-bold text-black ">Lebosse974</p>
                                <button class="rounded-lg bg-[#008AFF] text-white w-[72px]  my-4 h-[30px]">
                                    Join </button>
                            </div>
                            <div class="flex items-center border-b border-black">
                                <p class="px-2 m-0">1</p>
                                <i class="fa-solid fa-chevron-up"></i>
                                <img src="https://i-sam.unimedias.fr/2021/10/01/bienfaits-pommes.jpeg?auto=format%2Ccompress&cs=tinysrgb&h=630&w=1200"
                                    class="my-3 w-[41px] h-[35px] mx-2 rounded-full" alt="">
                                <p class="mx-3 font-bold text-black ">Lebosse974</p>
                                <button class="rounded-lg bg-[#008AFF] text-white w-[72px]  my-4 h-[30px]">
                                    Join </button>
                            </div>
                            <button class="rounded-lg bg-[#008AFF] text-white w-2/3 ml-[65px] my-6 h-[40px]">
                                View All </button>
                        </div>
                    </div>
                    <div class="px-8 mt-10">

                        <a class="rounded-lg bg-[#008AFF] text-white  text-center h-[40px]"> Create Post </a>

                    </div>
                </div>
            </div>
        </div>

        {{-- <simple-footer></simple-footer> --}}
    </div>
@endsection
