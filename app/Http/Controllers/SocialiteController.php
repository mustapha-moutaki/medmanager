<?php
namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            Auth::login($googleUser);
            return redirect()->route('/admin/dashboard'); 
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Failed to login with Google');
        }
    }
}
