<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DoutorAcess
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
        if(auth()->check() AND auth()->user()->estato=='Doutor'){
            return $next($request);
        }else{
            return redirect()->back()->with('danger','Area Restrita');
        }
    }
}
