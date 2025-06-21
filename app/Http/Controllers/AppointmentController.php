<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Carbon\CarbonPeriod;
use App\Models\Appointment;
use App\Models\BusinessHour;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Services\AppointmentService;
use App\Http\Requests\AppointmentRequest;
use Illuminate\Support\Facades\Auth;
class AppointmentController extends Controller{


   
    public function index($id) {
        // Get the user role as a string
        $userRole = Auth::user()->roles->pluck('name')->first();
        
        if ($userRole == 'patient') {
          
            $patient = Patient::where('user_id', Auth::user()->id)->first();
            
            // Debug the patient lookup
            if (!$patient) {
                dd("No patient record found for user ID: " . Auth::user()->id);
            }
        } 
        elseif ($userRole == 'admin' || $userRole == 'reception') {
            $patient = Patient::find($id);
        } 
        else {
            return abort(403, 'Unauthorized access.');
        }
        
        
        // Check if the patient exists
        if (!$patient) {
            return abort(404, 'Patient not found'); 
        }
    
        $appointmentService = new AppointmentService();
        $appointments = [];
        
        // Generate data for the next 7 days
        $today = Carbon::today();
        for ($i = 0; $i < 7; $i++) {
            $date = $today->copy()->addDays($i);
            $appointments[] = $appointmentService->generateTimeData($date);
        }
        
        // Return the view with appointments and patient data
        return view('patient.appointments.reserve', compact('appointments', 'patient'));
    }


// liek the backup for this methode
// public function index($id){
//     // Find the patient by ID
//     $patient = Patient::find($id); 

//     // Check if the patient exists
//     if (!$patient) {
//         return abort(404); // Return a 404 error if the patient is not found
//     }

//     $appointmentService = new AppointmentService();
//     $appointments = [];
    
//     // Generate data for the next 7 days like appointments for full week
//     $today = Carbon::today();
//     for ($i = 0; $i < 7; $i++) {
//         $date = $today->copy()->addDays($i);
//         $appointments[] = $appointmentService->generateTimeData($date);
//     }
    
//     // Return the view with appointments and patient data
//     return view('patient.appointments.reserve', compact('appointments', 'patient'));
// }


public function reserve(AppointmentRequest $request)
{
    Appointment::create($request->only(['patient_id', 'date', 'time']));

    // Redirect or return a response
    return back();
}


public function destroy(Request $request){
    // Get the appointment id from the request
    $appointment = Appointment::findOrFail($request->appointment_id);

    // Delete the appointment
    $appointment->delete();

    // Redirect back with a success message
    return back()->with('success', 'Appointment canceled successfully.');
}






    // public function reserve(AppointmentRequest $request)
    // {

    //     $data = $request->merge(['user_id'=>auth()->id()])->toArray();

    //     Appointment::create($data);

    //     return 'created';
    // }
    
}
