<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Communaute;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function homepage(){
        $user= Auth::user();
        $posts = Post::with(['commentaires', 'users','communautes'])->orderBy('created_at','desc')->get();
        $hasars =Communaute::inRandomOrder()->get();
        $commentaires = Commentaire::with(['user', 'posts'])->get();
        $commus = Communaute::skip(0)->take(5)->get();
        $communautes = Communaute::all();
        // $commentaires= Commentaire::All();
        
        return view('homepage',[
            'user' => $user,
            'posts' => $posts,
            'commentaires'=> $commentaires,
            'hasars'=>$hasars,
            'commus'=>$commus,
            'communautes'=>$communautes,
            ]);
    }


    public function post(){
        return view('post');
    }

    


    

}
