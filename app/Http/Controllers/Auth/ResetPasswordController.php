<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class ResetPasswordController extends Controller
{
    // Display the reset password form
    public function showResetForm(Request $request, $token)
    {
        // Check if the token exists in our password_forgot table
        $passwordReset = DB::table('password_forgot')
            ->where('token', $token)
            ->first();
            
        if (!$passwordReset) {
            return redirect()->route('password.forgot')
                ->with('error', 'Invalid password reset token. Please request a new password reset link.');
        }
        
        // Check if token is expired (e.g., older than 60 minutes)
        $tokenCreatedAt = \Carbon\Carbon::parse($passwordReset->created_at);
        if ($tokenCreatedAt->diffInMinutes(now()) > 60) {
            DB::table('password_forgot')->where('token', $token)->delete();
            return redirect()->route('password.forgot')
                ->with('error', 'Password reset link has expired. Please request a new one.');
        }
        
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->email ?? $passwordReset->email
        ]);
    }

    // Process the password reset
    public function reset(Request $request)
    {
        // Validate input data
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'email' => 'required|email',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
        ]);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput($request->only('email'));
        }
        
        // Find the token in the database
        $passwordReset = DB::table('password_forgot')
            ->where('token', $request->token)
            ->where('email', $request->email)
            ->first();
            
        if (!$passwordReset) {
            return back()->with('error', 'Invalid password reset token or email address.')->withInput($request->only('email'));
        }
        
        // Check if token is expired
        $tokenCreatedAt = \Carbon\Carbon::parse($passwordReset->created_at);
        if ($tokenCreatedAt->diffInMinutes(now()) > 60) {
            DB::table('password_forgot')->where('token', $request->token)->delete();
            return redirect()->route('password.forgot')
                ->with('error', 'Password reset link has expired. Please request a new one.');
        }
        
        // Update the user's password
        $user = User::where('email', $request->email)->first();
        
        if (!$user) {
            return back()->with('error', 'We could not find a user with that email address.')->withInput($request->only('email'));
        }
        
        $user->password = Hash::make($request->password);
        $user->save();
        
        // Delete the password reset token
        DB::table('password_forgot')->where('token', $request->token)->delete();
        
        // Redirect to login with success message
        return redirect()->route('login')->with('success', 'Your password has been reset successfully! You can now log in with your new password.');
    }
}