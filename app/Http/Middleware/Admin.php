<?php

namespace App\Http\Middleware;

use App\Models\Role;
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

              if (!Auth::check()) {
                return redirect()->route('homepage')->with('status', " connection admin non admis ");
                //return route('login');
            }

              if(isset($users))
              {
                return $next($request);
              }

              else{
                return redirect()->route('homepage')->with('status', " connection admin non admis ");
              }
        }
        
        
    

}
