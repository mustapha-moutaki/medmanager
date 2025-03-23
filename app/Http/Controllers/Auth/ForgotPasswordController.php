<?php

namespace App\Http\Controllers\Auth;

// use Log;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Services\forgetPasswordService;

class ForgotPasswordController extends Controller
{
    // Display the forgot password form
    // public function forgotPasswordForm()
    // {
    //     return view('auth.forgot-password');
    // }


    protected ForgetPasswordService $forgetPasswordService;
    public function __construct(ForgetPasswordService $forgetPasswordService)
    {
        $this->forgetPasswordService = $forgetPasswordService;
    }

    public function showForgetPasswordForm()
    {
        return view('auth.forgot-password');
    }


    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        // \Log::info("Email envoyé pour: " . $request->email);

        $status = $this->forgetPasswordService->sendResetLink($request->email);

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', ($status))
            : back()->withErrors(['email' => ($status)]);
    }

    // Process the forgot password form
    // public function forgotPasswordFormPost(Request $request)
    // {
    //     // Validate the email
    //     $request->validate([
    //         "email" => "required|email",
    //     ]);
        
    //     // Check if the email exists in the users table
    //     $user = User::where('email', $request->email)->first();
        
    //     if (!$user) {
    //         // Email doesn't exist in our database
    //         return back()->with('error', 'We couldn\'t find an account with that email address.');
    //     }

    //     // Generate a random token
    //     $token = Str::random(65);

    //     // Insert the email and token into the password_forgot table
    //     // First check if a record already exists for this email
    //     $existingRecord = DB::table("password_forgot")->where('email', $request->email)->first();
        
    //     if ($existingRecord) {
    //         // Update the existing record
    //         DB::table("password_forgot")
    //             ->where('email', $request->email)
    //             ->update([
    //                 "token" => $token,
    //                 "updated_at" => now(),
    //             ]);
    //     } else {
    //         // Insert a new record
    //         DB::table("password_forgot")->insert([
    //             "email" => $request->email,
    //             "token" => $token,
    //             "created_at" => now(),
    //             "updated_at" => now(),
    //         ]);
    //     }

    //     // Send the email with the reset link
    //     try {
    //         Mail::to($request->email)->send(new ResetPasswordMail($token, $request->email));
            
    //         return back()->with([
    //             'status' => 'Password reset link sent!',
    //             'email' => $request->email
    //         ]);
    //     } catch (\Exception $e) {
    //         // Log the error
    //         Log::error('Failed to send password reset email: ' . $e->getMessage());
            
    //         return back()->with('error', 'We encountered an issue sending your password reset email. Please try again later.');
    //     }
    // }
}






// namespace App\Http\Controllers\Auth;

// use Illuminate\Support\Str;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
// use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Mail;
// use App\Models\User;

// class ForgotPasswordController extends Controller
// {
//     // Display the forgot password form
//     public function forgotPasswordForm()
//     {
//         return view('auth.forgot-password');
//     }

//     // Process the forgot password form
//     public function forgotPasswordFormPost(Request $request)
//     {
//         // Validate the email
//         $request->validate([
//             "email" => "required|email",
//         ]);
        
//         // Check if the email exists in the users table
//         $user = User::where('email', $request->email)->first();
        
//         if (!$user) {
//             // Email doesn't exist in our database
//             return back()->with('error', 'We couldn\'t find an account with that email address.');
//         }

//         // Generate a random token
//         $token = Str::random(65);

//         // Insert the email and token into the password_forgot table
//         // First check if a record already exists for this email
//         $existingRecord = DB::table("password_forgot")->where('email', $request->email)->first();
        
//         if ($existingRecord) {
//             // Update the existing record
//             DB::table("password_forgot")
//                 ->where('email', $request->email)
//                 ->update([
//                     "token" => $token,
//                     "updated_at" => now(),
//                 ]);
//         } else {
//             // Insert a new record
//             DB::table("password_forgot")->insert([
//                 "email" => $request->email,
//                 "token" => $token,
//                 "created_at" => now(),
//                 "updated_at" => now(),
//             ]);
//         }

//         // Here you would typically send an email with the reset link
//         // Mail::to($request->email)->send(new ResetPasswordMail($token));
        
//         // For now, we'll just redirect back with a success message
//         return back()->with([
//             'status' => 'Password reset link sent!',
//             'email' => $request->email
//         ]);
//     }
// }
