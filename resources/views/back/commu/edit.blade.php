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
                <form method="post" action="{{route('admin.commu.update')}}" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="uk-fieldset">
                        <input hidden name="id" value="{{ $commu->id }}">
                        <span class="uk-label uk-label-success">Nom</span>
                        <div class="uk-margin">
                            <input class="uk-input" type="text" value="{{$commu->name}}" name="name" required>
                        </div>

                        <span class="uk-label uk-label-success">Réglement</span>
                        <div class="uk-margin">
                            <input class="uk-input" type="text" value="{{$commu->rules}}" name="rules">
                        </div>

                        <span class="uk-label uk-label-success">Description</span>
                        <div class="uk-margin">
                            <input class="uk-input" type="text" value="{{$commu->description}}" name="description">
                        </div>

                        <span class="uk-label uk-label-success">image</span>
                        <div class="uk-margin ">
                            <input class="uk-input" type="file" value="{{$commu->cover}}" placeholder="choisir une photo" name="cover">
                        </div>

                        <div class="uk-modal-footer uk-text-left  ">
                            <button class="uk-button uk-button-default uk-modal-close" type="button"><a href="{{route('admin.commu.show')}}">Annuler</a></button>
                            <button class="uk-button uk-button-secondary" type="submit">Modifer</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
</div>
@endsection