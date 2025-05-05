<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\BusinessHour;
use Illuminate\Http\Request;

class BusinessHourController extends Controller
{
    // public function index(){
    //     $businessHours= BusinessHour::all();
    //     return view('admin.appointments.index', compact('businessHours'));
    // }
    public function index()
    {
        $businessHours = BusinessHour::all();
        
        // Get appointments with all relationships and paginate them (10 per page)
        $appointments = Appointment::with(['patient.user', 'patient.doctor.user'])
                        ->orderBy('date', 'desc')
                        ->paginate(10);
        
        return view('admin.appointments.index', compact('businessHours', 'appointments'));
    }
    
    

    
    public function update(Request $request){
    
        $data = $request->all()['data'];
    
        foreach ($data as $index => $businessHour) {
            $businessHour['off'] = isset($businessHour['off']) ? true : false;

            BusinessHour::updateOrCreate(
                ['day' => $businessHour['day']], 
                $businessHour
            );
        }
    
        return back();
    }


    
}
