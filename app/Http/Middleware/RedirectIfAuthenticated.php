<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
       
        if (!Auth::check()) {
            return redirect('/login'); // if the user not authentificated
        }

        //looking for the  user role 
        $role = Auth::user()->role;

       // each role has own redirect page
        $dashboardRoutes = [
            'Admin'     => '/admin/dashboard',
            'Patient'   => '/patient/dashboard',
            'Reception' => '/doctor/dashboard',
        ];

        //valid the role and redirceting 
        if (array_key_exists($role, $dashboardRoutes)) {
            return redirect($dashboardRoutes[$role]);
        }

        // invalid role or user redirect to the same page
        return redirect('/');
    }
}
