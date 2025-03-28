<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::with('user')->get();
        return view('admin.doctors.index', compact('doctors'));

        $doctor = Doctor::with('patients') // Eager load patients to optimize query
        ->findOrFail($id);
    
        return view('doctors.show', [
            'doctor' => $doctor,
            'patientCount' => $doctor->patients()->count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

public function store(StoreDoctorRequest $request){

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->age = $request->age;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->CIN = $request->CIN;

        //here we fix that problem
        $user->birth_date = $request->birth_date;
        $user->bio = $request->bio;

        // this code is not work
        if ($request->hasFile('profile_photo')) {
            $imagePath = $request->file('profile_photo')->store('public/doctor_images');
            $user->profile_photo = $imagePath;
        }


        $user->save();


        $doctor = new Doctor();
            $doctor->user_id = $user->id;
            $doctor->specialist = $request->specialist;
            $doctor->yearsOfExperience = $request->yearsOfExperience;
            $doctor->emergency_contact_phone = $request->emergency_contact_phone;
            $doctor->certificate = $request->certificate;
        $doctor->save();

        return redirect()->route('doctors')->with('success', 'doctor added successfully');
}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $doctor = Doctor::where('id', $id)->with('user')->firstOrFail();
        return view('admin.doctors.show', compact('doctor'));
    }
    


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $doctor = Doctor::with('user')->findOrFail($id);
        return view('admin.doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);
    
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'age' => 'required|integer|min:0|max:120',
            'gender' => 'required|in:male,female,other',
            'address' => 'required|string|max:500',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email,' . $doctor->user_id,
            'emergency_contact_phone' => 'required|string|max:20',
            'specialist' => 'sometimes|string|max:255',
            'years_of_experience' => 'required|integer|min:0',
            'patients_treated' => 'sometimes|integer|min:0',
            'certificates' => 'nullable|string|max:1000',
            'bio' => 'nullable|string|max:2000',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        // Handle photo upload
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('profile_photos', 'public');
            $validatedData['profile_photo'] = $photoPath;
        }

        // Update user profile
        $doctor->user->update([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'birth_date' => $validatedData['birthdate'],
            'age' => $validatedData['age'],
            'gender' => $validatedData['gender'],
            'address' => $validatedData['address'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'bio' => $validatedData['bio'] ?? null,
            'profile_photo' => $validatedData['profile_photo'] ?? $doctor->user->profile_photo
        ]);
    
        // Update doctor profile
        $doctor->update([
            'specialist' => $validatedData['specialist'],
            'yearsOfExperience' => $validatedData['years_of_experience'],
            'patients_treated' => $validatedData['patients_treated'],
            'certificate' => $validatedData['certificates'] ?? null,
            'emergency_contact_phone' => $validatedData['emergency_contact_phone']
        ]);
    
        return redirect()->route('admin.doctors.show', $doctor->id)
            ->with('success', 'Doctor profile updated successfully');
    }
    



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    try {
        // Find the doctor
        $doctor = Doctor::findOrFail($id);
        
        // Optional: Delete associated user if you want to remove user record too
        if ($doctor->user) {
            $doctor->user->delete();
        }
        
        // Delete the doctor
        $doctor->delete();

        // Redirect with success message
        return redirect()->route('doctors')
            ->with('success', 'Doctor deleted successfully');
    } catch (\Exception $e) {
        // Handle potential errors
        return redirect()->route('doctors')
            ->with('error', 'Unable to delete doctor: ' . $e->getMessage());
    }
   }
}
