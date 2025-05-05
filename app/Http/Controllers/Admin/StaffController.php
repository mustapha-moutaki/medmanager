<?php

namespace App\Http\Controllers\Admin;

use Log;
use App\Models\User;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StaffRequest;
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
        $staffs = $this->staffRepository->all();
        return view('admin.staffs.index', compact('staffs'));
    }

    public function create()
    {
        return view('admin.staffs.create');
    }

    public function store(StaffRequest $request)
    {
        //  
    
        // Create the user object and populate the fields
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->birth_date = $request->birth_date;
        $user->bio = $request->bio;

        $user->age = $request->age;
        $user->CIN = $request ->CIN;
        $user->gender = $request->gender;
        $user ->address = $request->address;
        $user->profile_photo = $request->profile_photo;

    
        // File upload for profile photo
        if ($request->hasFile('profile_photo')) {
            $imagePath = $request->file('profile_photo')->store('public/staff_images');
            $user->profile_photo = $imagePath;
        }
    
        // Save the user record
        $user->save(); // Save user first
    
        // Create staff record
        $staff = new Staff();
        $staff->user_id = $user->id;
        $staff->specialist = $request->specialist;
        $staff->years_of_experience = $request->years_of_experience;
        $staff->emergency_contact_phone = $request->emergency_contact_phone;
        $staff->certificate = $request->certificate;
        $staff->license_number = $request->license_number;
        $staff->license_expiry_date = $request->license_expiry_date;
        $staff->shift_preference = $request->shift_preference;
        $staff->employment_status = $request->employment_status;
        $staff->role = $request->role;
    
        // Save the staff record
        $staff->save();
    
        // Redirect with success message
        return redirect()->route('stuffs')->with('success', 'Staff added successfully');
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



    public function update(Request $request, $id){
    // Find the staff by ID
    $staff = Staff::findOrFail($id);
    
    // Validate the input data
    $validatedData = $request->validate([
        'first_name' => 'sometimes|string|max:255',
        'last_name' => 'sometimes|string|max:255',
        'phone' => 'sometimes|string|max:20',
        'email' => 'sometimes|email|unique:users,email,' . $staff->user_id,
        'CIN' => 'sometimes|string|max:20',
        'birth_date' => 'sometimes|date',
        'gender' => 'sometimes|in:male,female,other',
        'age' => 'sometimes|integer|min:0|max:120',
        'address' => 'sometimes|string|max:500',
        'bio' => 'nullable|string|max:2000',
        'specialist' => 'sometimes|string|max:255',
        'years_of_experience' => 'sometimes|integer|min:0',
        'emergency_contact_phone' => 'sometimes|string|max:20',
        'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);
    // dd($validatedData);
    // Handle photo upload - note the field is named profile_photo in your form
    if ($request->hasFile('profile_photo')) {
        $photoPath = $request->file('profile_photo')->store('profile_photos', 'public');
        // This will be added to the user data later
        $profilePhoto = $photoPath;
    }
    
    // Create user data array with correct field names
    // Create user data array with correct field names
        $userData = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'CIN' => $request->input('CIN'),  // Ensure case sensitivity
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'age' => $request->age,
            'address' => $request->address,
            'bio' => $request->bio
        ];

    
    // Add profile photo if uploaded
    if (isset($profilePhoto)) {
        $userData['profile_photo'] = $profilePhoto;
    }
    
    // Update the user record
    $staff->user->update($userData);
    
    // Update staff data with correct field names
    $staffData = [
        'specialist' => $request->specialist,
        'role' => $request->role,
        'years_of_experience' => $request->years_of_experience,
        'license_number' => $request->license_number,
        'license_expiry_date' => $request->license_expiry_date,
        'certificate' => $request->certificate,
        'employment_status' => $request->employment_status,
        'shift_preference' => $request->shift_preference,
        'emergency_contact_phone' => $request->emergency_contact_phone
    ];
    
    // Update the staff record
    $staff->update($staffData);
    
    // Redirect to the staff list page with success message
    return redirect()->route('stuffs')
        ->with('success', 'Staff profile updated successfully');
}
    



    public function destroy($id)
{
    // find staff in the table staff
    $staff = $this->staffRepository->find($id);

    if ($staff) {
        // delelte staff just in the staff table 
        $this->staffRepository->delete($id);

        // delete the his info in the users tble
        $user = User::where('id', $staff->user_id)->first();
        if ($user) {
            $user->delete(); 
        }

        return redirect()->route('stuffs')->with('success', 'Staff and user deleted successfully');
    }

    return redirect()->route('stuffs')->with('error', 'Staff not found');
}

}