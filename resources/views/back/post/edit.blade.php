@extends('layouts.back')
@section('main')
<div class="main_content">
        <div class="p-12 pb-0 bg-white shadow">
            <div class="container pb-0">
                <h1> modifier un post </h1>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form method="post" action="{{route('admin.post.update')}}" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="uk-fieldset">
                        <input hidden name="id" value="{{ $post->id }}">
                        <span class="uk-label uk-label-success">titre</span>
                        <div class="uk-margin">
                            <input class="uk-input" type="text" value="{{$post->title}}" name="title" required>
                        </div>

                        <span class="uk-label uk-label-success">contenue</span>
                        <div class="uk-margin">
                            <input class="uk-input" type="text" value="{{$post->content}}" name="content">
                        </div>

                        <span class="uk-label uk-label-success">image</span>
                        <div class="uk-margin">
                            <input class="uk-input" type="file" placeholder="choisir une photo" name="image">
                        </div>

                        <div class="uk-modal-footer uk-text-left">
                            <button class="uk-button uk-button-default uk-modal-close" type="button"><a href="{{route('admin.post.index')}}">Annuler</a></button>
                            <button class="uk-button uk-button-secondary" type="submit">Modifer</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
</div>
@endsection