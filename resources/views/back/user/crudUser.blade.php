@extends('layouts.back')
@section('main')
<table class="uk-table uk-table-hover uk-table-divider">
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
        @foreach ( $users as $user )
            <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>Table Data</td>
            
            @foreach ($user->roles as $role )
                
            <td>{{$role->nom}}  </td>
            
            @endforeach
           

            <td>
                <a href="{{route('user.showUpdate',$user->id )}}"uk-toggle><i class="mx-2 fa-solid fa-pen hover:cursor-pointer"></i></a>
                <a  href="{{--#modal-sections--}}{{ route('user.delete', $user->id ) }}" uk-toggle><i class="mx-2 fa-solid fa-trash hover:cursor-pointer"></i></a></td>

                 
        </tr>
        
        
        @endforeach
        
    </tbody>
   
</table>

<div id="modal-sections" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title"> Suprimmer Post </h2>
        </div>
        <form action="{{ route('user.delete') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('delete')

            <div class="uk-modal-body">
               <div class="flex flex-col">
               
                <h2 class="font-semibold text-center text-red-600 "> voulez vous vraiment supprimer cette utilisateur {{ $user->id }} ?</h2>
              

               <input type="hidden" name="id_delete" id="id_delete" value="{{ $user->id }}">
               </div>
               

            </div>
            <div class="uk-modal-footer uk-text-center">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Annuler</button>
                <button class="uk-button uk-button-secondary" type="submit">Supprimer</button>
            </div>
        </form>
    </div>  
    </div>


@endsection