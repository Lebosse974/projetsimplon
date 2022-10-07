@extends('layouts.app')
@section('main')
    <div class="px-0 py-8 lg:px-6 ">
        <div class="container flex justify-between mx-auto">
            <div class="w-full lg:w-6/12 ml-0 lg:ml-[150px]">
                <div x-data="{ modelOpen: false }">
                    {{-- notification --}}
                    @include('home.notification')
                    {{-- barre creer post --}}
                    @include('home.createbar')
                    {{-- carrousel tandance --}}
                    @include('home.carrousel')
                    {{-- post --}}
                    @include('post.show')
                </div>
                {{-- post --}}
                @include('post.postsatic')
            </div>
            {{-- SIDE BAR RIGHT --}}
            @include('home.sidebar')
        </div>
        {{-- <simple-footer></simple-footer> --}}
    </div>
@endsection
