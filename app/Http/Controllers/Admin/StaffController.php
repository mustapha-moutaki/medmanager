<?php

namespace App\Http\Controllers\Admin;

use Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\StaffRepositoryInterface;

class StaffController extends Controller
{
    protected $staffRepository;

    public function __construct(StaffRepositoryInterface $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }

    public function index()
    {
        $stuffs = $this->staffRepository->all();
        return view('admin.staffs.index');
    }

    public function create()
    {
        return view('admin.staffs.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Basic staff information validation
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'birth_date' => 'required|date|max:20',
            
            // Additional staff-specific fields validation
            'specialist' => 'nullable|string|max:255',
            'years_of_experience' => 'nullable|integer|min:0',
            'certificate' => 'nullable|string|max:255',
            'license_number' => 'nullable|string|max:100',
            'shift_preference' => 'nullable|string|in:morning,afternoon,night,flexible',
            'employment_status' => 'nullable|string|in:full-time,part-time,contract,temporary',
            'emergency_contact_phone' => 'nullable|string|max:20',
            'role' => 'required|string|max:100'
        ]);
    
        try {
            // Begin database transaction
            DB::beginTransaction();
    
            // Create user first (assuming you have a users table)
            $user = User::create([
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                // Add any other necessary user fields
            ]);
    
            // Create staff record with additional fields
            $staff = $this->staffRepository->create([
                'user_id' => $user->id,
                'specialist' => $validatedData['specialist'] ?? null,
                'years_of_experience' => $validatedData['years_of_experience'] ?? null,
                'certificate' => $validatedData['certificate'] ?? null,
                'license_number' => $validatedData['license_number'] ?? null,
                'shift_preference' => $validatedData['shift_preference'] ?? null,
                'employment_status' => $validatedData['employment_status'] ?? null,
                'emergency_contact_phone' => $validatedData['emergency_contact_phone'] ?? null,
                'role' => $validatedData['role']
            ]);
    
            // Commit the transaction
            DB::commit();
    
            return redirect()->route('staffs.index')->with('success', 'Staff created successfully');
        } catch (\Exception $e) {
            // Rollback the transaction in case of error
            DB::rollBack();
    
            // Log the error
            Log::error('Staff creation failed: ' . $e->getMessage());
    
            return redirect()->back()->with('error', 'Failed to create staff. Please try again.');
        }
    }

    public function show($id)
    {
        $staff = $this->staffRepository->find($id);
        return view('admin.staffs.show', compact('staff'));
    }

    public function edit($id)
    {
        $staff = $this->staffRepository->find($id);
        return view('admin.staffs.edit', compact('staff'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // Add your validation rules here
        ]);

        $staff = $this->staffRepository->update($id, $validatedData);

        return redirect()->route('staffs.index')->with('success', 'staff updated successfully');
    }

    public function destroy($id)
    {
        $this->staffRepository->delete($id);

        return redirect()->route('staffs.index')->with('success', 'staff deleted successfully');
    }
}