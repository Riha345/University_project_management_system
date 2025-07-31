<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
class IsStudent
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
        if(Session::has('userrole') && Session::get('userrole')!='student'){
            return redirect()->to('/students');
        }
        
        return $next($request);
    }
}
