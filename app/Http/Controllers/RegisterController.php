<?php
namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // Show the registration form
    public function create()
    {
        return view('auth.register');  // Return the view for the registration form
    }

    // Handle the registration logic
    public function store(Request $request)
{
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'CIN' => 'required|string|max:255',
        'age' => 'required|integer',
        'gender' => 'required|string',
        'password' => 'required|string|min:8',
    ]);

    User::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'CIN' => $request->CIN,
        'age' => $request->age,
        'gender' => $request->gender,
        'password' => bcrypt($request->password),
    ]);

    return redirect()->route('login')->with('success', 'Account created successfully!');
}

}
