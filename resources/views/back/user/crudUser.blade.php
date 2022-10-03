@extends('layouts.back')
@section('main')


<div class="flex flex-col mt-3">
    <h1 class="text-center"> CRUD UTILISATEUR </h1>
    @if (session('status'))
    <div class="uk-alert-success" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p> {{ session('status') }}</p>
    </div>
    @endif 
    <a class="rounded-lg bg-[#008AFF] text-white w-1/5 ml-[65px] my-4 py-2 h-[40px] text-center " href="#modal-sections" uk-toggle>créer utilisateur</a>
<table class="border-t border-black uk-table uk-table-hover uk-table-divider">      
        <thead>
            <tr>
                <th>Name</th>
                <th>email</th>
                <th>image</th>
                <th>role</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>Table Data</td>
                    @foreach ($user->roles as $role)
                        <td>{{ $role->nom }} </td>
                    @endforeach
                    <td class="flex">
                        <a href="{{ route('user.edit', $user->id) }}"uk-toggle><i
                                class="mx-2 fa-solid fa-pen hover:cursor-pointer"></i></a>
                                <form action="{{ route('user.delete', $user->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id_delete" id="id_delete" value="{{ $user->id }}">
                                    <button class="" type="submit"><i
                                        class="mx-2 fa-solid fa-trash hover:cursor-pointer"></i></button>
                                </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

</div>

    

    <div id="modal-sections" uk-modal>
        <div class="uk-modal-dialog">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header">
                <h2 class="uk-modal-title"> ajouter un utilisateur </h2>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="uk-modal-body">
                    <div class="flex flex-col">

                        <span class="uk-label uk-label-success">name</span>
                        <div class="uk-margin">
                            <input class="uk-input" type="text" placeholder="enter le nom" name="name" required>
                        </div>

                        <span class="uk-label uk-label-success">pseudo</span>
                        <div class="uk-margin">
                            <input class="uk-input" type="text" placeholder="entrer un pseudo" name="pseudo">
                        </div>

                        <span class="uk-label uk-label-success">mot de passe</span>
                        <div class="uk-margin">
                            <input class="uk-input" type="password" placeholder="entrer un mot de passe" name="password">
                        </div>

                        <span class="uk-label uk-label-success">email</span>
                        <div class="uk-margin">
                            <input class="uk-input" type="text" placeholder="entrer un email" name="email">
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
                    </div>


                </div>
                <div class="uk-modal-footer uk-text-center">
                    <button class="uk-button uk-button-default uk-modal-close" type="button">Annuler</button>
                    <button class="uk-button uk-button-secondary" type="submit">ajouter</button>
                </div>
            </form>
        </div>
    </div>
    
@endsection
