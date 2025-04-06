<?php

namespace App\Http\Controllers;

use id;
use Log;
use App\Models\User;
use App\Models\Staff;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Document;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $patients = Patient::with('user', 'documents')->get();
      
    //     return view('admin.patients.index', compact('patients'));
    // }

    public function index(Request $request)
{
    $query = Patient::query();

    if ($request->has('gender') && $request->gender !== '') {
        $query->whereHas('user', function($q) use ($request) {
            $q->where('gender', $request->gender);
        });
    }

    if ($request->has('search') && $request->search !== '') {
        $query->whereHas('user', function($q) use ($request) {
            $q->where('first_name', 'like', '%' . $request->search . '%')
              ->orWhere('last_name', 'like', '%' . $request->search . '%');
        });
    }

    $patients = $query->get();

    if ($request->ajax()) {
        return view('patients.partials.patient-table', compact('patients'));
    }

    return view('admin.patients.index', compact('patients'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors = Doctor::all();
        $nurses = Staff::where('role', 'nurse')->get();
        return view('admin.patients.create', compact('doctors', 'nurses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientRequest $request)
    {
    
        // Create user
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
        $user->birth_date = $request->birth_date;
        $user->bio = $request->bio;
    
        // Handle profile photo upload
    if ($request->hasFile('profile_photo')) {
        $imagePath = $request->file('profile_photo')->store('patient_images', 'public');
        $user->profile_photo = $imagePath;
    }
    
        $user->save();
    
        // Create patient
        $patient = new Patient();
        $patient->user_id = $user->id;
        $patient->marital_status = $request->marital_status;
        $patient->CNSS = $request->CNSS;
        $patient->insurance = $request->insurance;
        $patient->patient_type = $request->patient_type;
        $patient->registration_date = now();
        $patient->extra_phone_number = $request->extra_phone_number;

        $patient->doctor_id = $request->doctor_id;
        $patient->nurse_id = $request->nurse_id; 
        $patient->save();
    
       // Handle document uploads
    if ($request->hasFile('documents')) {
        foreach ($request->file('documents') as $file) {
            // Ensure the file is valid
            if ($file->isValid()) {
                // Store the document
                $path = $file->store('patient_documents', 'public');
                $document = new Document();
                
                // Associate document with the user and patient
                $document->user_id = $user->id; // This associates the document with the user
                $document->patient_id = $patient->id; // This associates the document with the patient
                $document->file_path = $path;
                $document->file_name = $file->getClientOriginalName();
                $document->file_type = $file->getClientOriginalExtension();
                $document->file_size = $file->getSize();
                $document->uploaded_by = auth()->id() ?? 1;
                $document->save();
            }
        }
    }
        return redirect()->route('patients-list')->with('success', 'Patient added successfully with documents');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $patient = Patient::where('id', $id)->with(['user', 'documents', 'vitals'])->firstOrFail();
        return view('admin.patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $patient = Patient::with(['user', 'documents', 'appointments.doctor.user'])->findOrFail($id);
        $doctors = Doctor::all();
        $staff = Staff::where('role', 'Nurse')->with('user')->get();
    
        return view('admin.patients.edit', compact('patient', 'doctors', 'staff'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdatePatientRequest $request, $id)
    // {
    //     // Find the patient by ID or fail if not found
    //     $patient = Patient::findOrFail($id);
        
    //     // Validate the incoming request data
    //     $validatedData = $request->validated();
        
    //     // Handle photo upload
    //     if ($request->hasFile('photo')) {
    //         // Delete the old photo if it exists
    //         if ($patient->user->profile_photo) {
    //             Storage::disk('public')->delete($patient->user->profile_photo);
    //         }
    //         // Store the new photo and update the validated data
    //         $photoPath = $request->file('photo')->store('profile_photos', 'public');
    //         $validatedData['profile_photo'] = $photoPath;
    //     } else {
    //         // Retain the existing photo if no new photo is uploaded
    //         $validatedData['profile_photo'] = $patient->user->profile_photo;
    //     }

    //     // Update user profile details
    //     $patient->user->update([
    //         'first_name' => $validatedData['first_name'],
    //         'last_name' => $validatedData['last_name'],
    //         'birth_date' => $validatedData['birth_date'],
    //         'age' => $validatedData['age'],
    //         'gender' => $validatedData['gender'],
    //         'address' => $validatedData['address'],
    //         'phone' => $validatedData['phone'],
    //         'email' => $validatedData['email'],
    //         'bio' => $validatedData['bio'] ?? null,
    //         'CIN' => $validatedData['CIN'],
    //         'profile_photo' => $validatedData['profile_photo'] // Use the updated or existing photo path
    //     ]);
        
    //     // Update patient profile details
    //     $patient->update([
    //         'marital_status' => $validatedData['marital_status'],
    //         'CNSS' => $validatedData['CNSS'],
    //         'insurance' => $validatedData['insurance'],
    //         'patient_type' => $validatedData['patient_type'],
    //         'extra_phone_number' => $validatedData['extra_phone_number']
    //     ]);
        
    //     // Handle document uploads
    //     if ($request->hasFile('documents')) {
    //         foreach ($request->file('documents') as $file) {
    //             // Store each document and create a Document record
    //             $path = $file->store('patient_documents', 'public');
    //             $document = new Document();
    //             $document->user_id = $patient->user_id; // Associate document with the user
    //             $document->patient_id = $patient->id;
    //             $document->file_path = $path;
    //             $document->file_name = $file->getClientOriginalName();
    //             $document->file_type = $file->getClientOriginalExtension();
    //             $document->file_size = $file->getSize();
    //             $document->uploaded_by = auth()->id() ?? 1; // Default to 1 if not authenticated
    //             $document->save();
    //         }
    //     }

    //     // Redirect back to the patient's show page with a success message
    //     return redirect()->route('admin.patients.show', $patient->id)
    //         ->with('success', 'Patient profile updated successfully');
    // }
    public function update(UpdatePatientRequest $request, Patient $patient)
    {

        dd($request->all());
        // Get the validated data
        $validatedData = $request->validated();
        
        // Process profile photo if uploaded
        if ($request->hasFile('profile_photo')) {
            // Delete old photo if exists
            if ($patient->user->profile_photo) {
                Storage::delete($patient->user->profile_photo);
            }
            
            // Store new photo
            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $validatedData['profile_photo'] = $path;
        }
        
        // Split data for User and Patient models
        $userData = array_intersect_key($validatedData, array_flip([
            'first_name', 'last_name', 'birth_date', 'age', 'gender', 'CIN',
            'bio', 'email', 'phone', 'address', 'profile_photo'
        ]));
        
        $patientData = array_intersect_key($validatedData, array_flip([
            'marital_status', 'CNSS', 'patient_type', 'registration_date',
            'insurance', 'doctor_id', 'nurse_id', 'extra_phone_number'
        ]));
        
        // Update User record
        $patient->user->update($userData);
        
        // Update Patient record
        $patient->update($patientData);
        
        return redirect()->route('patients.show', $patient->id)
            ->with('success', 'Patient information updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
         
            $patient = Patient::with('documents')->findOrFail($id);
            
            foreach ($patient->documents as $document) {
                Storage::disk('public')->delete($document->file_path);
                $document->delete();
            }
            
           
            if ($patient->user) {
                $patient->user->delete();
            }
        
            $patient->delete();

            return redirect()->route('patients-list')
                ->with('success', 'Patient and all associated documents deleted successfully');
        } catch (\Exception $e) {
            
            return redirect()->route('patients-list')
                ->with('error', 'Unable to delete patient: ' . $e->getMessage());
        }
    }

    /**
     * Download a specific document
     */
    public function downloadDocument($documentId)
    {
        $document = Document::findOrFail($documentId);
        
        // Check if user has permission to download this document
        // Add your authorization logic here
        
        $path = Storage::disk('public')->path($document->file_path);
        
        return response()->download($path, $document->file_name);
    }

    /**
     * Delete a specific document
     */
    public function deleteDocument($documentId)
    {
        $document = Document::findOrFail($documentId);
        
        // Check if user has permission to delete this document
        // Add your authorization logic here
        
        Storage::disk('public')->delete($document->file_path);
        $document->delete();
        
        return back()->with('success', 'Document deleted successfully');
    }
}
