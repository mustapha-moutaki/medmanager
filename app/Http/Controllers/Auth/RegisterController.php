<?php
namespace App\Http\Controllers\Auth;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

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

    $user = User::create([
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


//this code for assign patient role for users by default
    $patientRole = Role::where('name', 'patient')->first();  
    if ($patientRole) {
        $user->roles()->attach($patientRole->id); 
    }
    return redirect()->route('login')->with('success', 'Account created successfully!');
}

}
