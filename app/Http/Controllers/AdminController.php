<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\UserRepository;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $userRepository;


    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    // admin dashboard
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            // Allow access to the admin dashboard
            $users = $this->userRepository->all();
            return view('dashboard.admin', compact('users'));
        }
    
        return redirect()->route('home')->with('error', 'You do not have access to this page.');
    }
}
