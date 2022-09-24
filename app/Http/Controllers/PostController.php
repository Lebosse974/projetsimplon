<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function store(Request $request)
    {

        $user = Auth::user();
        $post = new Post();
        $input = [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:255'],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        $validated = $request->validate($input);
       

        $path = $request->file('image')->store('\image', 'public');
        $post->image = $path;
        $post->title  = $validated['title'];
        $post->content = $validated['content'];
        $post->user_id = $user->id;
        $post->save();
        return redirect()->route('/homepage');
    }


    public function show()
    {
        $posts = Post::All();
        return view('homepage', [
            'posts' => $posts,
        ]);
    }
    public function showtest()
    {
        $posts = Post::All();

        return view('test', [
            'posts' => $posts,
        ]);
    }

    public function storetest(Request $request)
    {

        if ($request->method() == 'POST') {
            $input = [
                'title' => 'required', 'string', 'max:255',
                'content' => 'required', 'string', 'max:255',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
            $validated = $request->validate($input);
            
            
        $user = Auth::user();
        $post = new Post();
        if ($request->hasFile('image')) {
        $path = $request->file('image')->store('\image', 'public');
        $post->image = $path;
        }
        $post->title  = $validated['title'];
        $post->content = $validated['content'];
        $post->user_id = $user->id;
        $post->save();
        return redirect()->route('/');}
    }
    // public function storetest(Request $request)
    // {
    //     if($request->file('image')!=null){
    //     $path1 = Storage::disk('public')->put('img', $request->file('image'));    //chemin + nom image
    //     } else {
    //         $path1 = null;
    //     }
    
    //     $post = new Post();
    //     $post->user_id = $request->id;
    //     $post->content = $request->content;
    //     $post->title  = $request->title;
    //     $post->image = '/storage/' . $path1;
    //     $post->save();
    //     return redirect('/');
    // }

   
}
