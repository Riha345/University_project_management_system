<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
class IsStudentLogin
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
        //if(!Session::has('student_reg_id')){
          //  return redirect()->to('/studentlogin');
       // }
       if(!Session::has('username')){
           return redirect()->to('/login');
        }
        return $next($request);
    }
}
