<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutorisationM
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       
        // Si ADMIN
        if (session('type') === 'ADM'){
            return $next($request);
        }else{
            
            // Si ce n'est pas admin
            session()->flush();
            return redirect()->route('login')->with('status',"Connectez vous en tant qu'administrateur pour avoir accès à cette page  " );;
        }
        return $next($request);
    }
}
