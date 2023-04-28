<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthCheck
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
        if((Auth::check())){
            if((Auth::user()->email !== '') && (Auth::user()->status == 0) || (Auth::user()->status == '')){
               Auth::logout();
               toastr()->error('Your Account Banned Contact Us');
               return redirect(route('auth.login'));
              }else{
              return $next($request);
              }
            }else{
             toastr()->error('Please Login Your Account');
             return redirect(route('auth.login'));
           }
    }
}
