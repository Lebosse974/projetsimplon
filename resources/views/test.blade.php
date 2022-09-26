@extends('layouts.app')
@section('main')
    <div class="flex flex-col justify-center bg-white w-[295px] max-w-sm mx-auto rounded-lg shadow-md">
        <div
            class="w-full h-[80px] bg-[url('https://i-sam.unimedias.fr/2021/10/01/bienfaits-pommes.jpeg?auto=format%2Ccompress&cs=tinysrgb&h=630&w=1200')]">
        </div>
        <h1 class="m-1 text-xl font-bold text-center">Home</h1>

        <p class="px-4 py-1 my-1 text-sm lg:text-base">Your personal Reddit frontpage. Come here
            to check in with your favorite communities.</p>

        <div class="flex flex-col ">

            <a class="rounded-lg bg-[#008AFF] text-white w-2/3 ml-[65px] my-4 py-2 h-[40px] text-center"
                href="#modal-sections" uk-toggle>Create Post</a>

            <div id="modal-sections" uk-modal>
                <div class="uk-modal-dialog">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <div class="uk-modal-header">
                        <h2 class="uk-modal-title"> Create Post </h2>
                    </div>
                    <form action="{{ route('test.edit') }}" method="POST" enctype="multipart/form-data">
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

                                <input type="text" name="content" class="rounded-lg hover:bg-slate-300"
                                    placeholder="entrer votre texte" required>
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

        {{-- <form action="{{ route('test.edit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="">
           <div class="flex flex-col">
            <input type="hidden" value="@if (Auth::check())
                {{Auth::user()->id}}
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
    </form> --}}
    </div>
@endsection
