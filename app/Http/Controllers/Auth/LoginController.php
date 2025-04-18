<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Returning your login view
    }

    public function login(LoginRequest $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        // dd($request);
    // dd($credentials); // Check the credentials

    
    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    // Attempt to log the user in
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        // Authentication successful
        // return redirect()->intended(route('admin.dashboard'));
        $user = Auth::user();

      
        if ($user->hasRole('admin') || $user->hasRole('reception')) {
            // dd('he is an admin');
            return redirect()->route('admin.dashboard');
        } elseif ($user->hasRole('patient')) {
            // dd('he is a patient');
            return redirect()->route('patient.dashboard');
        } else {
            dd('he is nothing');
            return redirect()->route('home');
        }
    } else {
        // Authentication failed
        return back()->with('error', 'Invalid email or password')->withInput();
    }

}

}
