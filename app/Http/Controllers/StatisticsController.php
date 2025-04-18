<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        // Fetch the statistics data
        $appointmentsCount = Appointment::count();
        $patientsCount = Patient::count();
        $doctorsCount = Doctor::count();
        $canceledAppointments = Appointment::where('status', 'Canceled')->count();
        
        // Pass the data to the view
        return view('admin.statistics', compact('appointmentsCount', 'patientsCount', 'doctorsCount', 'canceledAppointments'));
    }
}

