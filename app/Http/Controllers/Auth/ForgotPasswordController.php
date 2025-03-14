<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm($token=null)
    {
        return view('auth.forgot-password', compact('token'));
    }

    public function sendResetLink(Request $request)
    {
        // Validate email input
        $request->validate(['email' => 'required|email|exists:users,email']);

        // Generate a reset token
        $token = Str::random(60);

        // Find the user and update the reset token
        $user = User::where('email', $request->email)->first();
        $user->reset_pass_token = $token;
        dd($user);
        die();
        $user->save();

        // Send the reset link to the user's email
        Mail::send('auth.reset-password', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Your Password');
        });

        // Return with success message
        return back()->with('success', 'A reset link has been sent to your email.');
    }
}
