@extends('layouts.back')
@section('main')


<div class="flex flex-col mt-3">
    
    <h1 class="text-center"> CRUD POSTE </h1>
    @if (session('status'))
    <div class="uk-alert-success" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p> {{ session('status') }}</p>
    </div>
    @endif 
    <a class="rounded-lg bg-[#008AFF] text-white w-1/5 ml-[65px] my-4 py-2 h-[40px] text-center " href="#modal-sections" uk-toggle>créer un poste </a>
<table class="border-t border-black uk-table uk-table-hover uk-table-divider">      
        <thead>
            <tr>
                <th>utilisateur</th>
                <th>titre</th>
                <th>contenue</th>
                <th>image</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->users->name }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>                  
                    <td>{{ $post->image }} </td>
                    
                    <td class="flex">
                        <a href="{{ route('admin.post.edit', $post->id) }}"uk-toggle><i
                                class="mx-2 fa-solid fa-pen hover:cursor-pointer"></i></a>
                                <form action="{{route('admin.post.delete', $post->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id_delete" id="id_delete" value="{{$post->id}}">
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
            <h2 class="uk-modal-title"> Create Post </h2>
        </div>
        <form action="{{ route('admin.post.store') }}" method="POST"
            enctype="multipart/form-data">
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
                    <input type="text" name="content"
                        class="rounded-lg hover:bg-slate-300" placeholder="entrer votre texte"
                        required>
                    <label for="titre">image</label>
                    <input type="file" name="image">
                </div>


            </div>
            <div class="uk-modal-footer uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close"
                    type="button">Cancel</button>
                <button class="uk-button uk-button-primary" type="submit">Save</button>
            </div>
        </form>

    </div>
</div>
    
@endsection
