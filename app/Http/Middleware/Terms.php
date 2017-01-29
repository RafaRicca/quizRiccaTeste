<?php

namespace QuizRicca\Http\Middleware;

use Closure;

class Terms
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       // Meu primeiro middleware.
       // dd(\Request::all());
        if(!is_null(\Request::get('agree'))){      
            return $next($request);
        } else {
            return redirect()->back()->with('msg', 'Você deve aceitar os termos, mesmo que não exista.');
        }
    }
}
