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
            'commentaire' => 'required|max:255',
        ]);
        $comment = new Commentaire();
        $comment->commentaire = $validate['commentaire'];
        $comment->user_id = $request->input('user_id');
        $comment->post_id = $request->input('post_id');
        // dd($comment);
        $comment->save();

        return redirect()->back();
    }

    public function index(){
        $commentaires = Commentaire::with('posts')->with('user')->get();
        
        return view('post.show', [
            'commentaires' => $commentaires,
            

        ]);
    }
}
