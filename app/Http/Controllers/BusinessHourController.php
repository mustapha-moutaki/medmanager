<?php

namespace App\Http\Controllers;

use App\Models\BusinessHour;
use Illuminate\Http\Request;

class BusinessHourController extends Controller
{
    public function index(){
        $businessHours= BusinessHour::all();
        return view('admin.appointments.index', compact('businessHours'));
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
