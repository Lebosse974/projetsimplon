<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function settinguser(){
        return view('settinguser');
    }

    public function listUser(){
        return view('back.crudUser');
    }
   

  
}
