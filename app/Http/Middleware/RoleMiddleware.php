<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware{
//     public function handle(Request $request, Closure $next, $role){

//     if (!Auth::check()) {
//         return redirect('login');
//     }

//     $userRole = Auth::user()->roles->pluck('name')->first();

//     // Special case: reception role can access admin routes
//     if ($role === 'admin' && $userRole === 'reception') {
//         return $next($request);
//     }

//     if ($userRole === $role) {
//         return $next($request);
//     }

//     // Redirect based on role without causing a loop
//     switch ($userRole) {
//         case 'admin':
//             return redirect()->route('admin.dashboard');
//         case 'patient':
//             return redirect()->route('patient.dashboard');
//         case 'reception':
//             return redirect()->route('admin.dashboard'); // Reception uses admin dashboard
//         default:
//             return redirect('/')->with('error', 'Vous n\'avez pas l\'autorisation d\'accéder à cette page.');
//     }
// }

public function handle(Request $request, Closure $next, $role){
    if (!Auth::check()) {
        return redirect('login');
    }

    $userRole = Auth::user()->roles->pluck('name')->first();

    // Special cases: reception and doctor roles can access admin routes
    if ($role === 'admin' && ($userRole === 'reception' || $userRole === 'doctor')) {
        return $next($request);
    }

    if ($userRole === $role) {
        return $next($request);
    }

    // Redirect based on role without causing a loop
    switch ($userRole) {
        case 'admin':
            return redirect()->route('admin.dashboard');
        case 'patient':
            return redirect()->route('patient.dashboard');
        case 'reception':
            return redirect()->route('admin.dashboard'); // Reception uses admin dashboard
        case 'doctor':{
            dd('to doctor dashborad');
             return redirect()->route('admin.dashboard'); // Doctor uses admin dashboard
        }
           
        default:
            return redirect('/')->with('error', 'Vous n\'avez pas l\'autorisation d\'accéder à cette page.');
    }
}


}
