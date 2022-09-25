@extends('layouts.back')
@section('main')
<div class="main_content">
        <div class="p-12 pb-0 bg-white shadow">
            <div class="container pb-0">
                <h1> modifier un utillisateur </h1>
                <form method="post" action="{{route('user.update')}}" enctype="multipart/form-data">
                    <fieldset class="uk-fieldset">
                        <span class="uk-label uk-label-success">name</span>
                        <div class="uk-margin">
                            <input class="uk-input" type="text" placeholder="{{$users->name}}" name="name" required>
                        </div>

                        <span class="uk-label uk-label-success">pseudo</span>
                        <div class="uk-margin">
                            <input class="uk-input" type="text" placeholder="{{$users->pseudo}}" name="pseudo">
                        </div>

                        <span class="uk-label uk-label-success">email</span>
                        <div class="uk-margin">
                            <input class="uk-input" type="text" placeholder="{{$users->email}}" name="email">
                        </div>
                        

                        <span class="uk-label uk-label-success">role</span>
                        <div class="uk-margin">
                            <select class="uk-select" name="roles[]" >
                                @foreach ($roles as $roles )
                                <option value="$role->id">{{$role->nom}}</option>
                                    
                                @endforeach
                                
                            </select>
                        </div>
                        <span class="uk-label uk-label-success">avatar</span>
                        <div class="uk-margin">
                            <input class="uk-input" type="file" placeholder="Input" name="avatar">
                        </div>

                        <div class="uk-modal-footer uk-text-left">
                            <button class="uk-button uk-button-default uk-modal-close" type="button">Annuler</button>
                            <button class="uk-button uk-button-secondary" type="submit">Supprimer</button>
                        </div>
                
                       
                
                        
                
                        
                
                    </fieldset>
                </form>
            </div>
        </div>
</div>
@endsection