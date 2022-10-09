@extends('layouts.app')
@section('main')


    <div class="flex flex-col mt-[67px] bg-white ">



        <h1 class="text-[24px] md:text-[35px] text-start border-b border-black m-1 py-2">Generale Account Setting</h1>

        @if (session('status'))
            <div class="uk-alert-success " uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <p> {{ session('status') }}</p>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('setting.edit') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="flex border-b border-[#BDBDBD] items-center justify-between h-[50px]">
                <p class="pl-3 m-0 font-bold text-black w-1/3"> Name</p>
                <input type="text" name="name" placeholder="{{ $user->name }}" value="{{ $user->name }}"
                    class="border-none w-1/3 text-slate-400" required>
                <p href="#" class="text-[#008AFF] pr-3 "> Edit</p>
            </div>
            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="flex border-b border-[#BDBDBD] items-center justify-between h-[50px]">
                <p class="pl-3 m-0 font-bold text-black w-1/3"> User Name</p>
                <input type="text" name="pseudo" placeholder="{{ $user->pseudo }}" value="{{ $user->pseudo }}"
                    class=" w-1/3 border-none text-slate-400" required>
                <p href="#" class="text-[#008AFF] pr-3"> Edit</p>

            </div>
            <div class="flex border-b border-[#BDBDBD] items-center justify-between h-[50px]">
                <p class="pl-3 m-0 font-bold text-black w-1/3"> Email</p>
                <input type="text" name="email" placeholder="{{ $user->email }}" value="{{ $user->email }}"
                    class=" w-1/3  border-none text-slate-400" required>
                <p href="#" class="text-[#008AFF] pr-3"> Edit</p>

            </div>
            <div class="flex border-b border-[#BDBDBD] items-center justify-between">
                <p class="pl-3 m-0 font-bold text-black w-1/3 ">image</p>
                <img src="{{ Storage::url($user->avatar) }}" alt=""
                    class=" p-3 w-1/3 h-[150px] md:h-[250px] lg:h-[250px]">
                <p href="#" class="text-[#008AFF] pr-3"> Edit</p>

            </div>
            <div class="flex border-b border-[#BDBDBD] items-center justify-between h-[50px]">
                <p class="pl-3 m-0 font-bold text-black w-1/3 ">changer l'image</p>
                <input type="file" name="avatar" value="{{ $user->avatar }}" class="border-none w-1/3 text-slate-400">
                <p class="text-[#008AFF] pr-3"> Edit</p>

            </div>
            <div class="uk-text-center m-3">
                <button class="uk-button uk-button-secondary" type="submit">Modifer</button>
            </div>

        </form>
    </div>

@endsection
