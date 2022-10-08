<div class="hidden w-4/12 -mx-8 lg:block">
    <div class="px-8">



        {{-- home --}}
        <div class="flex flex-col justify-center bg-white w-[295px] max-w-sm mx-auto rounded-lg shadow-md">
            <div
                class="w-full h-[80px] bg-[url('https://i-sam.unimedias.fr/2021/10/01/bienfaits-pommes.jpeg?auto=format%2Ccompress&cs=tinysrgb&h=630&w=1200')]">
            </div>
            @auth
                <h1 class="m-1 text-xl font-bold text-center">Home</h1>

                <p class="px-4 py-1 my-1 text-sm lg:text-base">Your personal Reddit frontpage. Come here
                    to check in with your favorite communities.</p>
            @endauth

            @guest
                <h1 class="m-1 text-xl font-bold text-center">Home</h1>
                <p class="px-4 py-1 my-1 text-sm lg:text-base"> connectez-vous à votre compte stacks pour avoir accés à votre
                    espace personnel et communauté favoris </p>

            @endguest
            @auth


                <div class="flex flex-col ">

                    <a class="rounded-lg bg-[#008AFF] text-white w-2/3 ml-[65px] my-4 py-2 h-[40px] text-center"
                        href="#modal-sections" uk-toggle>Créer un Poste</a>

                    <div id="modal-sections" uk-modal>
                        <div class="uk-modal-dialog">
                            <button class="uk-modal-close-default" type="button" uk-close></button>
                            <div class="uk-modal-header">
                                <h2 class="uk-modal-title"> Créer un Poste </h2>
                            </div>
                            <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
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
                                        <label for="titre">content</label>
                                        
                                        <textarea type="text" name="content" id="" cols="30" rows="10"
                                            class="rounded-lg hover:bg-slate-300" placeholder="entrer votre texte" required></textarea>
                                        <label for="titre">image</label>
                                        <input type="file" name="image">
                                    </div>


                                </div>
                                <div class="uk-modal-footer uk-text-right">
                                    <button class="uk-button uk-button-default uk-modal-close"
                                        type="button">Annuler</button>
                                    <button class="uk-button uk-button-primary" type="submit">Créer</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <a class="rounded-lg bg-[#CCE8FE] text-[#3275AC] w-2/3 ml-[65px] mb-4  py-2 h-[40px] text-center "
                        href="#modal-commu" uk-toggle>
                        Créer une Communauté </a>

                    <div id="modal-commu" uk-modal>
                        <div class="uk-modal-dialog">
                            <button class="uk-modal-close-default" type="button" uk-close></button>
                            <div class="uk-modal-header">
                                <h2 class="uk-modal-title"> Créer un Communauté </h2>
                            </div>
                            <form action="{{ route('communaute.store') }}" method="POST" enctype="multipart/form-data">
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

                                        <label for="title"> nom</label>
                                        <input type="text" name="name" required>

                                        <input name="user_id" type="hidden" value="@if (Auth::check()) {{ Auth::user()->id }} @endif">
                                        
                                        <label for="rule"> règlement </label>
                                        <textarea type="text" name="rules" id="" cols="30" rows="10"
                                            class="rounded-lg hover:bg-slate-300" placeholder="entrer votre règlement" required></textarea>

                                            <label for="rule"> Description </label>
                                            <textarea type="text" name="description" id="" cols="30" rows="10"
                                                class="rounded-lg hover:bg-slate-300" placeholder="entrer une description" required></textarea>

                                        <label for="cover">image de font </label>
                                        <input type="file" name="cover">

                                    </div>


                                </div>
                                <div class="uk-modal-footer uk-text-right">
                                    <button class="uk-button uk-button-default uk-modal-close"
                                        type="button">Annuler</button>
                                    <button class="uk-button uk-button-primary" type="submit">Créer</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            @endauth

        </div>

        {{-- top commaunté --}}
        <div class="mt-10">

            <div class="flex flex-col justify-center bg-white w-[295px] max-w-sm mx-auto rounded-lg shadow-md">
                <h1 class="pb-2 m-1 mb-3 text-xl font-bold text-center border-b-2 border-black"> top
                    des communautés
                </h1>
                @foreach ($commus as $commu )
                <div class="flex items-center justify-between p-2 border-b border-black">
                    <div class="flex items-center w-1/3 ">
                        <p class="px-2 m-0">1</p>
                    <i class="fa-solid fa-chevron-up"></i>
                    <img src="{{ Storage::url($commu->cover)}}"
                        class="my-3 w-[41px] h-[35px] mx-2 rounded-full" alt="">
                    </div>
                    
                    <a class="w-1/3 mx-3 text-base font-bold text-black"  href="{{route('communaute.show',$commu->id)}}">{{$commu->name}}</a>
                    @auth
                        <button class="rounded-lg bg-[#008AFF] text-white w-[72px]  my-4 h-[30px]">
                            Join </button>
                    @endauth
                    @guest
                        <button class="rounded-lg bg-transparent border text-black w-[72px]  my-4 h-[30px]"
                            disabled>Disabled</button>
                    @endguest
                </div>
                @endforeach
                
                <button class="rounded-lg bg-[#008AFF] text-white w-2/3 ml-[65px] my-6 h-[40px]" href="#liste-commu" uk-toggle>
                    View All </button>
            </div>
        </div>

        <div id="liste-commu" uk-modal>
            <div class="uk-modal-dialog">
                <button class="uk-modal-close-default" type="button" uk-close></button>
                <div class="uk-modal-header">
                    <h2 class="uk-modal-title"> listes des communautés </h2>
                </div>
                    <div class="uk-modal-body">
                        <div class="flex flex-col">
                             @foreach ($communautes as $communaute )

                <div class="flex items-center justify-between p-2 border-b border-black">
                    <div class="flex items-center w-1/3 ">
                    <p class="px-2 m-0">1</p>
                    <i class="fa-solid fa-chevron-up"></i>
                    <img src="{{ Storage::url($communaute->cover)}}"
                        class="my-3 w-[41px] h-[35px] mx-2 rounded-full" alt="">
                    </div>
                    <a class="mx-3 text-base font-bold text-black " href="{{ route('communaute.show',$communaute->id)}}">{{$communaute->name}}</a>
                    @auth
                        <button class="rounded-lg bg-[#008AFF] text-white w-[72px]  my-4 h-[30px]">
                            Join </button>
                    @endauth
                    @guest
                        <button class="rounded-lg bg-transparent border text-black w-[72px]  my-4 h-[30px]"
                            disabled>Disabled</button>
                    @endguest
                </div>
                @endforeach
                        </div>
                        

                    </div>
                    <div class="uk-modal-footer uk-text-center">
                        <button class="uk-button uk-button-default uk-modal-close"
                            type="button">Retour</button>
                    </div>
                </form>

            </div>
        </div>

        <div class="px-8 mt-10 w-[72px] h-[40px]">

            <a class="rounded-lg bg-[#008AFF] text-white  text-center p-3"> Retour </a>

        </div>
    </div>
</div>
