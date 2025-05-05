<?php
namespace App\Repositories;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Staff;
use App\Models\Doctor;
use App\Models\Patient; 
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\UserRepository;

class EloquentUserRepository implements UserRepository
{
    public function all()
    {
       
    }

    public function find($id)
    {
        
    }

    public function countDoctors()
    {
        return Doctor::count();
    }

    public function countPatients()
    {
        return Patient::count(); 
    }

    public function countStaff()
    {
        return Staff::count(); 
    }




    public function countAppointments()
    {
        return Appointment::whereDate('date', Carbon::today())->count();
    }

    function getDoctorAppointments()
{
    // Get the logged-in doctor
    $doctor = Auth::user();

    // Fetch all patients for the logged-in doctor
    $patients = Patient::where('user_id', $doctor->id)->get();

    // Fetch all appointments for the doctor's patients
    $appointments = Appointment::whereIn('patient_id', $patients->pluck('id'))->get();

    // Get the current date
    $currentDate = now();

    // Format appointments for FullCalendar
    return $appointments->map(function ($appointment) use ($currentDate) {
        $isPast = $appointment->date < $currentDate;

        return [
            'title' => 'Appointment with ' . $appointment->patient->name,
            'start' => $appointment->date, // Format: Y-m-d H:i:s
            'end' => $appointment->end_time, // Include end time if needed
            'className' => $isPast ? 'past-appointment' : 'future-appointment' // Add class based on date
        ];
    });
}

    public function gender()
    {
        $totalUsers = User::count();
        
        if ($totalUsers === 0) {
            return [
                'majority_gender' => 'none',
                'majority_percentage' => 0,
            ];
        }

        $maleCount = User::where('gender', 'male')->count();
        $femaleCount = User::where('gender', 'female')->count();

        $malePercentage = ($maleCount / $totalUsers) * 100;
        $femalePercentage = ($femaleCount / $totalUsers) * 100;

        if ($malePercentage > $femalePercentage) {
            return [
                'majority_gender' => 'male',
                'majority_percentage' => round($malePercentage, 2),
            ];
        } else {
            return [
                'majority_gender' => 'female',
                'majority_percentage' => round($femalePercentage, 2),
            ];
        }
    }
}
