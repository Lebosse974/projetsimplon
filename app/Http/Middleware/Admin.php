<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
   
   
        public function handle(Request $request, Closure $next)
        {
              $role= Role::all();
              $users = Auth::user();
              $user= User::with('roles')->get();
             
            

              if (!Auth::check()) {
                return redirect()->route('homepage')->with('status', " connectez-vous a votre compte admin pour acceder au back ");
                //return route('login');
            }
          
             

              if( $request->user()->id == 1 or $request->user()->id == 14  OR $request->user()->id == 13 OR $request->user()->id == 23  OR $request->user()->id == 24  ){
                
                return $next($request);
              }

              else{
                return redirect()->route('homepage')->with('status', " connection admin non admis ");
              }
            
              
        }
        
        
    

}
