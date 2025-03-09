<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
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
    // dd($credentials); // Check the credentials

    
    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    // Attempt to log the user in
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        // Authentication successful
        return redirect()->intended(route('maindashboard'));
    } else {
        // Authentication failed
        return back()->with('error', 'Invalid email or password')->withInput();
    }

}

}
