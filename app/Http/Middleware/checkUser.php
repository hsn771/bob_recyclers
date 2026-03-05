<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User\Client; 
use Symfony\Component\HttpFoundation\Response;
use Session;

class checkUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
       //echo $request->route()->getName();
            //die();
        if(!Session::has('userId') || Session::has('userId')==null){
            return redirect()->route('user_logOut');
        }else{
            $user=Client::where('status',1)->where('id',currentUserId())->first();
            if(!$user)
                return redirect()->route('user_logOut');
            else
                return $next($request);
        }
        return redirect()->route('user_logOut');
    }
}
