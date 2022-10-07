<?php

namespace App\Http\Controllers;

use App\Models\Communaute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CommuContoller extends Controller
{
    public function store(Request $request)
    {

        $input = [
            'name' => 'required', 'string', 'max:255',
            'rules' => 'required', 'string', 'max:255',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        
        $validated = $request->validate($input);
        $user = Auth::user();
        $commu = new Communaute();
       $path= Storage::disk('public')->put('img',$request->file('cover'));
       
        $commu->cover = $path;
        $commu->name  = $validated['name'];
        $commu->rules = $validated['rules'];
        $commu->user_id = $user->id;
        $commu->save();
        return redirect()->route('homepage')->with('status','communauté créer !');
    }

    
    
}
