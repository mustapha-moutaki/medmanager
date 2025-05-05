<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\UserRepository;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function index()
    {
        $users = $this->userRepository->all();
        
        return view('dashboard.patient', compact('users'));
    }

   
    public function create()
    {
        return view('users.create');
    }

    
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

       
        $this->userRepository->create($request->all());

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

  
    public function edit($id)
    {
        $user = $this->userRepository->find($id);
        return view('users.edit', compact('user'));
    }

  
    public function update(Request $request, $id)
    {
        $user = $this->userRepository->find($id);

     
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

       
        $this->userRepository->update($id, $request->all());

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

   
    public function destroy($id)
    {
        $this->userRepository->delete($id);

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
