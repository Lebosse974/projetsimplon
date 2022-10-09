<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{

    //vue parametre user
    public function settingshow($id)
    {

        $user = User::find($id);
        return view('settinguser',['user' => $user]);
    }


     // update utillisateur
     public function settingupdate(Request $request)
     {
 
         $user = User::find($request->input('id'));
         $rules = [
             'name' => 'required', 'string', 'max:255',
             'pseudo' => 'required', 'string', 'max:255',
             'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
             'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
         ];
 
         $validated = $request->validate($rules);
         if ($request->hasFile('avatar')) {
             $path = $request->file('avatar')->store('\images', 'public');
             $user->avatar = $path;
         }
         $user->name = $validated['name'];
         $user->pseudo = $validated['pseudo'];
         $user->email = $validated['email'];
         $user->save();
         
 
         return redirect()->back()->with('status', 'vos données ont été mises à jour');
     }


    // vue crud 
    public function list()
    {

        $users = User::with('roles')->get();
        $roles = Role::All();
        return view('back.user.crudUser', [
            'users' => $users,
            'roles' => $roles

        ]);
    }

    //Ajout utilisateur
    public function store(Request $request)
    {
        
            $rules = [
                'name' => 'required', 'string', 'max:255',
                'pseudo' => 'required', 'string', 'max:255',
                'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'roles' => 'required',
                'roles.*' => 'numeric|exists:role,id',
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ];
            
            $validated = $request->validate($rules);
            
            $user = new User();
            if ($request->hasFile('avatar')) {
                $path = $request->file('avatar')->store('\img', 'public');
                $user->avatar = $path;
            }
            $user->name = $validated['name'];
            $user->pseudo = $validated['pseudo'];
            $user->email = $validated['email'];
            $user->password = Hash::make($validated['password']);
            $user->save();
            $user->roles()->sync($validated['roles']);
            return redirect()->route('list.user')->with('status', 'utilisateur ajouter!');       
    }

    //VUE Edit
    public function edit($id)
    {
        $user = User::with('roles')->find($id);
        $roles = Role::All();

        if (isset($user)) {
            return view('back.user.edit', [

                'roles' => $roles,
                'user' => $user,
            ]);
        } else {
            return redirect()->route('user.list')->with('status', 'erreur impossible de mettre a jour');
        }
    }

    // delete utilisateur
    public function delete(Request $request)
    {
        $user = User::find($request->input('id_delete'));

        $user->delete();
        return redirect()->route('list.user')->with('status', 'utilisateur supprimer!');
    }

    // update utillisateur
    public function update(Request $request)
    {

        $user = User::with(['roles'])->find($request->input('id'));
        $rules = [
            'name' => 'required', 'string', 'max:255',
            'pseudo' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'roles' => 'required',
            'roles.*' => 'numeric|exists:role,id',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];

        $validated = $request->validate($rules);
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('\images', 'public');
            $user->avatar = $path;
        }
        $user->name = $validated['name'];
        $user->pseudo = $validated['pseudo'];
        $user->email = $validated['email'];
        $user->save();
        $user->roles()->sync($validated['roles']);

        return redirect()->route('list.user')->with('status', 'utilisateur mis à jour');
    }
}
