@extends('layouts.app')
@section('main')
    <div class="  h-[228px] flex flex-col   ">
        <img class="w-full h-[228px]" src="../img/cover.jpg" alt="">
        <h1 class="text-center mt-3 bg-white"> space </h1>
        <p class=" w-auto lg:w-1/5 md:w-2/3 text-center  text-slate-800 font-semibold p-3 bg-gray-100 rounded-full text-base">Moderateur : lebosse974</p>

        <div class="px-1 py-1 lg:px-6 lg:py-8 bg-gray-100  ">
            <div class="flex justify-between container mx-auto ">
                <div class="w-full lg:w-6/12 ml-0 lg:ml-[150px]">
    
                    {{-- post --}}
                    <div class=" bg-white  px-4 my-4 rounded-lg shadow-md">
                        <div class="flex flex-col  ">
                            <div class="flex items-center">
                                <img src="https://getuikit.com/docs/images/slider4.jpg" alt="" class="rounded-full"
                                    width="24" height="26">
                                <a href="#"
                                    class="text-black hidden lg:block font-bold px-2 sm:text-xs lg:text-base">League of legend</a>
                                <p class="text-sm lg:text-base"> posted by Lebosse974. <span class="text-gray-500">1
                                        heure</span></p>
                            </div>
                            <p class="text-sm lg:text-base">Alexei Leonov, first person to walk in space on March 18, 1965
                            </p>
                            <img src="../img/alexei.jpeg"
                                alt="" class=" sm:h-[250px] py-4 lg:w-full md:h-[450px] lg:h-[650px]">
                        </div>
                    </div>
    
                </div>
    
    
    
                {{-- SIDE BAR RIGHT --}}
                <div class="-mx-8 w-6/12 hidden lg:block">
                    <div class="px-8">
    
                        {{-- home --}}
                        <div class="flex flex-col justify-center bg-white w-[295px] max-w-sm mx-auto rounded-lg shadow-md">
                            <div
                                class="w-full h-[80px] bg-[url('https://i-sam.unimedias.fr/2021/10/01/bienfaits-pommes.jpeg?auto=format%2Ccompress&cs=tinysrgb&h=630&w=1200')]">
                            </div>
                            <h1 class="text-center font-bold m-1 text-xl">SPACE</h1>
    
                            <p class=" px-4 py-1 my-1 text-sm lg:text-base">Share & discuss informative content on: *
                                Astrophysics * Cosmology * Space Exploration * Planetary Science * Astrobiology</p>
                            <div class="flex justify-center  border-b border-black my-3 ">
                                <div class="flex  flex-col mr-4 ">
                                    <p>2.4 M</p>
                                    <p>Members</p>
                                </div>
                                <div class="flex flex-col mr-4">
                                    <p>8.0 M</p>
                                    <p>Online</p>
                                </div>
                            </div>
                            <div class="flex justify-center items-center">
                                <i class="fa-solid fa-book-open "></i>
                                <p>created 16,october,2016</p>
                            </div>
    
    
    
                            <button class="rounded-lg bg-[#CCE8FE] text-[#3275AC] w-2/3 ml-[65px] mb-4 h-[40px] ">
                                Join </button>
    
                        </div>
    
                        {{-- SPACE RULES --}}
                        <div class="mt-10">
    
                            <div
                                class="flex flex-col text-[12px] justify-center bg-white w-[295px] max-w-sm mx-auto rounded-lg shadow-md">
                                <div class="w-full h-[45px] bg-[#706A6A]">
                                    <h1 class="text-center text-black font-bold m-2 text-xl">Space Rules</h1>
                                </div>
    
                                <div class="flex items-center border-b border-black">
                                    <p class="m-0 px-2">1</p>
                                    <p>Submissions must be related to Space/Cosmology</p>
                                </div>
                                <div class="flex items-center border-b border-black">
                                    <p class="m-0 px-2">2</p>
                                    <p>No sensationalist/misleading/unscientific content</p>
                                </div>
                                <div class="flex items-center border-b border-black">
                                    <p class="m-0 px-2">3</p>
                                    <p>No spam/blogspam/paywalled/pirated content</p>
                                </div>
                                <div class="flex items-center border-b border-black">
                                    <p class="m-0 px-2">4</p>
                                    <p>No social media links</p>
                                </div>
                                <div class="flex items-center border-b border-black">
                                    <p class="m-0 px-2">5</p>
                                    <p>No duplicate or re-hosted content</p>
                                </div>
                                <div class="flex items-center border-b border-black">
                                    <p class="m-0 px-2">6</p>
                                    <p>No unscientific or anti-scientific comments</p>
                                </div>
                                <div class="flex items-center border-b border-black">
                                    <p class="m-0 px-2">7</p>
                                    <p>Please limit yourself to no more than 5 submissions per 24 hour period.</p>
                                </div>
    
    
                                <button class="rounded-lg bg-[#008AFF] text-white w-2/3 ml-[65px] my-6 h-[40px]">
                                    View All </button>
                            </div>
                        </div>
                        <div class="mt-10 px-8">
    
                            <a class="rounded-lg bg-[#008AFF] text-white  text-center h-[40px]"> Create Post </a>
    
                        </div>
                    </div>
                </div>
            </div>
    
            {{-- <simple-footer></simple-footer> --}}
        </div>
    </div>


@endsection
