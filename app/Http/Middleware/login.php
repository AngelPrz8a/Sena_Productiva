<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class login
{

    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            return $next($request);
        }else{
            return redirect('login')
            ->with('msg','Es necesario Iniciar Sesión');
        }
    }
}
