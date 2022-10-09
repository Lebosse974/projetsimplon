<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Communaute;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CommuContoller extends Controller
{
    public function stores(Request $request)
    {

        $input = [
            'name' => 'required', 'string', 'max:255',
            'rules' => 'required', 'string', 'max:255',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required', 'string', 'max:255',
        ];

        $validated = $request->validate($input);
        $user = Auth::user();
        $commu = new Communaute();
        $path = Storage::disk('public')->put('img', $request->file('cover'));

        $commu->cover = $path;
        $commu->name  = $validated['name'];
        $commu->rules = $validated['rules'];
        $commu->description = $validated['description'];
        $commu->user_id = $user->id;
        $commu->save();
        return redirect()->route('homepage')->with('status', 'communauté créer !');
    }

    public function store(Request $request)
    {
        $input = [
            'name' => 'required', 'string', 'max:255',
            'rules' => 'required', 'string', 'max:255',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required', 'string', 'max:255',
        ];

        $validated = $request->validate($input);
        $user = Auth::user();
        $commu = new Communaute();
        $path = Storage::disk('public')->put('img', $request->file('cover'));

        $commu->cover = $path;
        $commu->name  = $validated['name'];
        $commu->rules = $validated['rules'];
        $commu->description = $validated['description'];
        $commu->user_id = $user->id;
        $commu->save();
        return redirect()->route('admin.commu.show')->with('status', 'communauté créer !');
    }

    public function index($id)
    {
        $commu = Communaute::with(['posts', 'user', 'users'])->find($id);
        $user = Auth::user();



        return view('commu.show', [
            'user' => $user,
            'commu' => $commu,
        ]);
    }


    // vue crud 
    public function show()
    {

        $commus = Communaute::with(['user', 'posts'])->get();
        return view('back.commu.crudCommu', [
            'commus' => $commus,



        ]);
    }


    //VUE Edit
    public function edit($id)
    {
        $commu = Communaute::with(['user', 'posts'])->find($id);


        if (isset($commu)) {

            return view('back.commu.edit', [
                'commu' => $commu,

            ]);
        } else {
            return redirect()->route('admin.commu.show')->with('status', 'erreur impossible de mettre a jour');
        }
    }


    // modification d'une communauté
    public function update(Request $request)
    {
        $commu = Communaute::with(['user', 'posts'])->find($request->input('id'));
        $input = [
            'name' => 'required', 'string', 'max:255',
            'rules' => 'required', 'string', 'max:255',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required', 'string', 'max:255',
        ];

        $validated = $request->validate($input);
        $user = Auth::user();
        $path = Storage::disk('public')->put('img', $request->file('cover'));

        $commu->cover = $path;
        $commu->name  = $validated['name'];
        $commu->rules = $validated['rules'];
        $commu->description = $validated['description'];
        $commu->user_id = $user->id;
        $commu->save();
        return redirect()->route('admin.commu.show')->with('status', 'communauté créer !');
    }

    // delete communauté
    public function delete(Request $request)
    {
        $commu = Communaute::find($request->input('id_delete'));
        $commu->delete();
        return redirect()->route('admin.commu.show')->with('status', 'poste supprimer!');
    }
}
