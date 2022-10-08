@extends('layouts.app')
@section('main')
    <div class="  h-[228px] flex flex-col   ">
        <img class="w-full h-[228px]" src="{{ Storage::url($commu->cover) }}" alt="">
        <h1 class="text-center mt-3 bg-white"> {{ $commu->name }} </h1>

        <div class="flex justify-center">
            <p
                class=" w-auto lg:w-1/5 md:w-2/3 text-center  text-slate-800 font-semibold p-3 bg-gray-100 rounded-full text-base">
                Moderateur : {{ $commu->user->pseudo }}</p>

            <a class="rounded-lg bg-[#008AFF] text-white w-auto lg:w-1/5 md:w-2/3 ml-[65px] my-4 py-2 h-[40px] text-center"
                href="#modal-sections" uk-toggle>Créer un Poste</a>

            <div id="modal-sections" uk-modal>
                <div class="uk-modal-dialog">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <div class="uk-modal-header">
                        <h2 class="uk-modal-title"> Créer un Poste </h2>
                    </div>
                    <form action="{{ route('post.storecommu') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="uk-modal-body">
                            <div class="flex flex-col">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <label for="title"> titre</label>
                                <input type="text" name="title">
                                <input name="user_id" type="hidden"
                                    value="@if (Auth::check()) {{ Auth::user()->id }} @endif">
                                <input name="comm_id" type="hidden" value="{{ $commu->id }} ">
                                <label for="titre">content</label>
                                <textarea type="text" name="content" id="" cols="30" rows="10"
                                    class="rounded-lg hover:bg-slate-300" placeholder="entrer votre texte" required></textarea>
                                <label for="titre">image</label>
                                <input type="file" name="image">
                            </div>


                        </div>
                        <div class="uk-modal-footer uk-text-right">
                            <button class="uk-button uk-button-default uk-modal-close" type="button">Annuler</button>
                            <button class="uk-button uk-button-primary" type="submit">Créer</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


        <div class="px-1 py-1 lg:px-6 lg:py-8 bg-gray-100  ">
            <div class="flex justify-between container mx-auto ">
                <div class="w-full lg:w-6/12 ml-0 lg:ml-[150px]">

                    {{-- post --}}
                    @foreach ($commu->posts as $post)
                        

                        <div class="px-4 my-4 bg-white rounded-lg shadow-md ">
                            <div class="flex flex-col border-b border-black ">
                                <div class="flex items-center">
                                    <img src="{{ Storage::url($post->users->avatar) }}" alt=""
                                        class="mx-2 rounded-full h-[26px]" width="26">
                                    <a href="#"
                                        class="hidden px-2 font-bold text-black lg:block sm:text-xs lg:text-base">{{ $commu->name }}</a>
                                    <p class="text-sm lg:text-base"> poster par {{ $post->users->pseudo }}. <span
                                            class="text-gray-500">{{ $post->created_at->format('Y-m-d ') }},
                                            {{ $post->created_at->format('H') }} H
                                            {{ $post->created_at->format('i') }}</span></p>
                                </div>
                                <h1 class="text-xl font-bold text-gray-700 md:text-2xl"> {{ $post->title }}</h1>
                                <p class="text-sm text-justify lg:text-base">{{ $post->content }}</p>
                                <img src="{{ Storage::url($post->image) }}" alt=""
                                    class=" flex sm:h-[250px] py-4  md:h-[350px] lg:h-[450px] justify-center">

                            </div>
                            @if (Auth::user())
                                {{-- ajouter un commentaire --}}
                                <div class="flex flex-col my-3 border-b border-black ">
                                    <div class="flex items-center justify-between">
                                        <form action="{{ route('commentaire.store') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <div class="flex items-center">
                                                <img src="{{ Storage::url(Auth::user()->avatar) }}" alt=""
                                                    class="mx-2 rounded-full h-[36px]" width="36">

                                                <input type="text" class="w-full my-3 bg-gray-200 rounded-lg"
                                                    placeholder="ajouter un commentaire" name="commentaire" required>
                                            </div>

                                            <input type="submit" class="" style="display:none;">
                                        </form>
                                    </div>
                                </div>
                            @endif

                            @foreach ($post->commentaires as $commentaire)
                                {{-- partie commentaire --}}
                                <div class="flex mb-2">
                                    <img src="{{ Storage::url($post->users->avatar) }}" alt=""
                                        class="mx-2 rounded-full h-[26px]" width="26">

                                    <div class="flex flex-col mb-3 bg-gray-100 rounded-2xl item-center">
                                        <a href="#"
                                            class="mx-2 font-bold text-black lg:block sm:text-xs lg:text-base">{{ $commentaire->user->pseudo }}</a>
                                        <p class="m-2"> {{ $commentaire->commentaire }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                    

                </div>



                {{-- SIDE BAR RIGHT --}}
                <div class="-mx-8 w-6/12 hidden lg:block">
                    <div class="px-8">

                        {{-- home --}}
                        <div class="flex flex-col justify-center bg-white w-[295px] max-w-sm mx-auto rounded-lg shadow-md">
                            <div class="w-full h-[80px] ">
                                <img class="w-full h-[80px] " src="{{ Storage::url($commu->cover) }}" alt="">
                            </div>
                            <h1 class="text-center font-bold m-1 text-xl">{{ $commu->name }}</h1>

                            <p class=" px-4 py-1 my-1 text-sm lg:text-base">{{ $commu->description }}</p>
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
                                <p>created {{ $commu->created_at->format('Y-m-d ') }}</p>
                            </div>




                            <button class="rounded-lg bg-[#CCE8FE] text-[#3275AC] w-2/3 ml-[65px] mb-4 h-[40px] ">
                                Join
                            </button>






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
                                    <p>Submissions must be related to {{$commu->name}}</p>
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
                                    <p>{{ $commu->rules }}</p>
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

                            <a class="rounded-lg bg-[#008AFF] text-white  text-center p-3"> Retour </a>

                        </div>
                    </div>
                </div>
            </div>

            {{-- <simple-footer></simple-footer> --}}
        </div>
    </div>
@endsection
