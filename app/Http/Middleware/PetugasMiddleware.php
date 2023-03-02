<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PetugasMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if(!auth()->guard('petugas')->check()){
            return redirect()->back();
        }else{
            if(!auth()->guard('petugas')->user()->level === 'admin'){
                return redirect()->back();
            }
            return $next($request);
        }
        return $next($request);
    }
}
