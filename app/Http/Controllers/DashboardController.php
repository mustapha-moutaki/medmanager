<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
       
        if (auth()->check()) {
            
            $role = auth()->user()->role;

           
            if ($role === 'admin') {
                return view('dashboard.admin');
            } elseif ($role === 'doctor') {
                return view('dashboard.doctor');
            } else {
                return view('dashboard.patient');
            }
        }

        return redirect()->route('login');
    }
}
