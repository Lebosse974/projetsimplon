<?php

namespace App\Http\Controllers;

use App\Models\Communaute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommuContoller extends Controller
{
    public function store(Request $request)
    {

        $input = [
            'name' => 'required', 'string', 'max:255',
            'rule' => 'required', 'string', 'max:255',
            'users.*' => 'numeric|exists:users,id',
            // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        
        $validated = $request->validate($input);
        $user = Auth::user();
        $commu = new Communaute();
    //    $path= Storage::disk('public')->put('img',$request->file('image'));
        // $path = $request->file('image')->store('images', 'public');
        // $post->image = $path;
        $commu->name  = $validated['name'];
        $commu->rule = $validated['rule'];
        $commu->save();
        $commu->users()->sync($request->input('id'));
        return redirect()->route('homepage')->with('status','communauté créer !');
    }
}
