@extends('layouts.back')
@section('main')


    <div class="flex flex-col mt-3">

        <h1 class="text-center"> CRUD COMMUNAUTE </h1>
        @if (session('status'))
            <div class="uk-alert-success" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <p> {{ session('status') }}</p>
            </div>
        @endif
        <a class="rounded-lg bg-[#008AFF] text-white w-1/5 ml-[65px] my-4 py-2 h-[40px] text-center " href="#modal-sections"
            uk-toggle>créer une communauté </a>
        <table class="border-t border-black uk-table uk-table-hover uk-table-divider">
            <thead>
                <tr>
                    <th>moderateur</th>
                    <th>nom</th>
                    <th>loi</th>
                    <th>image</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($commus as $commu)
                    <tr>
                        <td>{{ $commu->user->pseudo }}</td>
                        <td>{{ $commu->name }}</td>
                        <td>{{ $commu->rules }}</td>
                        <td><img src="{{ Storage::url($commu->cover) }}" class="rounded-lg w-[90px] h-[70px]" alt="">
                        </td>

                        <td class="flex">
                            <a href="{{ route('admin.commu.edit', $commu->id) }}"uk-toggle><i
                                    class="mx-2 fa-solid fa-pen hover:cursor-pointer"></i></a>
                            <form action="{{ route('admin.commu.delete', $commu->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id_delete" id="id_delete" value="{{ $commu->id }}">
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
                <h2 class="uk-modal-title"> Create commu </h2>
            </div>
            <form action="{{ route('admin.commu.store') }}" method="POST" enctype="multipart/form-data">
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

                        <label for="title"> nom</label>
                        <input type="text" name="name" required>

                        <input name="user_id" type="hidden" value="@if (Auth::check()) {{ Auth::user()->id }} @endif">
                        
                        <label for="rule"> règlement </label>
                        <textarea type="text" name="rules" id="" cols="30" rows="10"
                            class="rounded-lg hover:bg-slate-300" placeholder="entrer votre règlement" required></textarea>

                            <label for="rule"> Description </label>
                            <textarea type="text" name="description" id="" cols="30" rows="10"
                                class="rounded-lg hover:bg-slate-300" placeholder="entrer une description" required></textarea>

                        <label for="cover">image de font </label>
                        <input type="file" name="cover">

                    </div>


                </div>
                <div class="uk-modal-footer uk-text-right">
                    <button class="uk-button uk-button-default uk-modal-close"
                        type="button">Annuler</button>
                    <button class="uk-button uk-button-primary" type="submit">Créer</button>
                </div>
            </form>


        </div>
    </div>

@endsection
