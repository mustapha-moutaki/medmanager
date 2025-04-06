<?php

namespace App\Services;

use App\Models\Appointment;
use App\Models\BusinessHour;
use Carbon\Carbon;

class AppointmentService {

    public function generateTimeData(Carbon $date)
{
    // heere we get the complete name of the day 
    $dayName = $date->format('l');

    //getting hours in db
    $businessHours = BusinessHour::where('day', $dayName)->first();

    //checjing if the appointemnts hours are exist in that day
    if (!$businessHours || !is_array($businessHours->TimesPeriod)) {
        return [
            'day_name' => $dayName,
            'date' => $date->format('d M'),
            'full_date' => $date->format('Y-m-d'),
            'available_hours' => [],
            'reserved_hours' => [],
            'business_hours' => [],
            //here if the array is empty we change the status of the day to become a holiday
            'off' => true
        ];
    }
    
    //this methode it's filtration hours
    $hours = array_filter($businessHours->TimesPeriod);

    // Get appointments of that day
    $appointments = Appointment::where('date', $date->toDateString())->get();
    $currentAppointments = collect();// create a collection
    
    foreach ($appointments as $appointment) {
        // Skip invalid appointments
        if (!$appointment->time || !$appointment->time instanceof \Carbon\Carbon) {
            continue;
        }
        
        $currentAppointments->push($appointment->time->format('H:i'));//check if the format is carbon format and transform time to 24h not 12h
    }

    // this return only inreserved hours
    $availableHours = array_diff($hours, $currentAppointments->toArray());

    // return data like reserved appointments and inreserved appoin
    return [
        'day_name' => $dayName,
        'date' => $date->format('d M'),
        'full_date' => $date->format('Y-m-d'),
        'available_hours' => $availableHours,
        'reserved_hours' => $currentAppointments->toArray(),
        'business_hours' => $hours,
        'off' => $businessHours->off
    ];
}
}