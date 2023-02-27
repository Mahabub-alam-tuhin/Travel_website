<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use App\Models\user_permissions;
use Illuminate\Support\Facades\Auth;


class EditMiddleware
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
        $user = User::find(auth()->user()->id);       
        $check_permission = $user->permissions()->where('serial',1)->exists();
        if(Auth::check()){
            if($check_permission){
                return $next($request);
            } else{
                die("you have no permission");
            }
        }
        else{
          return redirect('/login')->with('message'.'login to access the website');
        }
        return $next($request);
    }
}
