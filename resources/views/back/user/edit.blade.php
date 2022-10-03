@extends('layouts.back')
@section('main')
<div class="main_content">
        <div class="p-12 pb-0 bg-white shadow">
            <div class="container pb-0">
                <h1> modifier un utillisateur </h1>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form method="post" action="{{route('user.update')}}" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="uk-fieldset">
                        <input hidden name="id" value="{{ $user->id }}">
                        <span class="uk-label uk-label-success">name</span>
                        <div class="uk-margin">
                            <input class="uk-input" type="text" value="{{$user->name}}" name="name" required>
                        </div>

                        <span class="uk-label uk-label-success">pseudo</span>
                        <div class="uk-margin">
                            <input class="uk-input" type="text" value="{{$user->pseudo}}" name="pseudo">
                        </div>

                        <span class="uk-label uk-label-success">email</span>
                        <div class="uk-margin">
                            <input class="uk-input" type="text" value="{{$user->email}}" name="email">
                        </div>
                        

                        <span class="uk-label uk-label-success">role</span>
                        <div class="uk-margin">
                            <select class="uk-select" name="roles[]" >
                                @foreach ($roles as $role )
                                <option value="{{$role->id}}">{{$role->nom}}</option>
                                    
                                @endforeach
                                
                            </select>
                        </div>
                        <span class="uk-label uk-label-success">avatar</span>
                        <div class="uk-margin">
                            <input class="uk-input" type="file" placeholder="choisir une photo" name="avatar">
                        </div>

                        <div class="uk-modal-footer uk-text-left">
                            <button class="uk-button uk-button-default uk-modal-close" type="button"><a href="{{route('list.user')}}">Annuler</a></button>
                            <button class="uk-button uk-button-secondary" type="submit">Modifer</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
</div>
@endsection