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
        $posts= Post::All();
        // $commentaires= Commentaire::All();
        // $commus= Communaute::all();
        return view('homepage',[
            'user' => $user,
            'posts' => $posts,
            // 'commentaires'=>$commentaires,
            // 'commus'=>$commus,
            ]);
    }


    public function post(){
        return view('post');
    }

    


    

}
