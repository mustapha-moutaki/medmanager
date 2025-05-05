<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
  
     public function handle(Request $request, Closure $next, $role)
     {

        
         if (!Auth::check()) {
             return redirect('login');
         }
     
         $userRole = Auth::user()->roles->pluck('name')->first();  // Obtenir le rôle de l'utilisateur
     
         // Si l'utilisateur a déjà ce rôle, il n'est pas nécessaire de le rediriger vers la même page
         if ($userRole == $role) {
             return $next($request);
         }
     
         // Si l'utilisateur a un autre rôle, rediriger vers la bonne page
         if ($userRole == 'admin') {
             return redirect()->route('admin.dashboard');
         } elseif ($userRole == 'patient') {
             return redirect()->route('patient.dashboard');
         }
     
         // Si le rôle est inconnu ou que la condition échoue
         return redirect('/')->with('error', 'Vous n\'avez pas l\'autorisation d\'accéder à cette page.');
     }

     
     
     


    
    
}
