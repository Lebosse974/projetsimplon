<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    //vue parametre user
    public function settinguser(){
        return view('settinguser');
    }
    

    // vue crud 
    public function list(){
       
        $users = User::with('roles')->get();
        return view('back.user.crudUser',[
            'users' => $users,
         ]);
    }

    //VUE showEdit
    public function showUpdate($id)
    {
        $users = User::with('roles')->find($id);
        $roles = Role::all();
      

        return view('back.user.edit', [           
            
            'roles' => $roles,
            'users ' => $users ,
        ]);
    }

    // delete utilisateur
    public function delete(Request $request)
    {
        $user = User::find($request->input('id_delete'));

        $user->delete();
        return redirect()->route('list.user');
        
    }


    public function update(Request $request)
    {

        $users = User::with(['roles'])->find($request->input('id'));
        $rules = [
            'name' => 'required', 'string', 'max:255',
            'pseudo' =>'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'roles' => 'required',
            'roles.*' => 'numeric|exists:role,id',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];

        $validated = $request->validate($rules);
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('\images', 'public');
            $users->image = $path;
        }
        $users->name = $validated['name'];
        $users->pseudo = $validated['pseudo'];
        $users->email = $validated['email'];
        $users->save();
        $users->Role()->sync($validated['roles']);

        return redirect()->route('list.user',);
    }
   

  
}
