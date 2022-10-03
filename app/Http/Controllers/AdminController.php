<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // vue crud 
    public function index()
    {
        $posts=Post::with('users')->get();
        $users = User::with('roles')->get();
        $roles = Role::All();
        return view('back.post.crudPost', [
            'users' => $users,
            'roles' => $roles,
            'posts'=>$posts

        ]);
    }

    // ajout d'un post
    public function store(Request $request)
    {

        $input = [
            'title' => 'required', 'string', 'max:255',
            'content' => 'required', 'string', 'max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        
        $validated = $request->validate($input);
        $user = Auth::user();
        $post = new Post();
       $path= Storage::disk('public')->put('img',$request->file('image'));
        // $path = $request->file('image')->store('images', 'public');
        $post->image = $path;
        $post->title  = $validated['title'];
        $post->content = $validated['content'];
        $post->user_id = $user->id;
        $post->save();
        return redirect()->route('admin.post.index')->with('status','post crée');
    }

     //VUE Edit
     public function edit($id)
     {
        $post=Post::with('users')->find($id);
         $user = User::with('roles')->get();
         $roles = Role::All();
 
         if (isset($post)) {
             return view('back.post.edit', [
                'post'=>$post,
                 'roles' => $roles,
                 'user' => $user,
             ]);
         } else {
             return redirect()->route('admin.post.index')->with('status', 'erreur impossible de mettre a jour');
         }
     }

    
    // modification d'un post
    public function update(Request $request)
    {
        $post = Post::with(['users'])->find($request->input('id'));
        $input = [
            'title' => 'required', 'string', 'max:255',
            'content' => 'required', 'string', 'max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        
        $validated = $request->validate($input);
        $user = Auth::user();
        
       $path= Storage::disk('public')->put('img',$request->file('image'));
        // $path = $request->file('image')->store('images', 'public');
        $post->image = $path;
        $post->title  = $validated['title'];
        $post->content = $validated['content'];
        $post->user_id = $user->id;
        $post->save();
        return redirect()->route('admin.post.index')->with('status','poste mis à jours');
    }

    // delete post
    public function delete(Request $request)
    {
        $post= Post::find($request->input('id_delete'));
        $post->delete();
        return redirect()->route('admin.post.index')->with('status', 'poste supprimer!');
    }
}
