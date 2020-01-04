<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        switch ($guard) {
            case 'admin':

            if (Auth::guard($guard)->check()) {
            // For admin after login it redirect him in admin home page.
            return redirect('admin/home');
            }
        
           break;
            
            default:
                 if (Auth::guard($guard)->check()) {
                // For user it redirect him in user home page.User can not access login and register page when he stayed in home page.
                return redirect('/home');
                  }
                break;
        }

        // jodi authenticate user na hoi tahole login and register page access korte parbe

        return $next($request);
    }
}
