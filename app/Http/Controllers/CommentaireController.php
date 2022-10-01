<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function store(Request $request)
    {
        $validate = $request->validate([
            'content' => 'required|max:255',
        ]);
        $comment = new Commentaire();
        $comment->content = $validate['commentaire'];
        $comment->user_id = $request->input('user_id');
        $comment->post_id = $request->input('post_id');
        $comment->save();
        
      
       
        $post = Post::with('user')->findOrFail($request->input('post_id'));
        $user = $post->user;
        
        

        return redirect()->back();
    }
}
