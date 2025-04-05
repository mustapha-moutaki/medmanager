<?php

namespace App\Http\Controllers;

use App\Models\Vital;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Requests\VitalsRequest;

class VitalController extends Controller
{
    /**
     * Show the form for creating a new vital record.
     */
    public function create(Patient $patient)
    {
        return view('admin.patients.patientVitals', compact('patient'));
    }

    /**
     * Store a newly created vital record in storage.
     */
    public function store(Patient $patient, VitalsRequest $request)
{
    $validated = $request->validated();
    
    $validated['patient_id'] = $patient->id;
    
    $vital = Vital::create($validated);
    
    // return redirect()->route('patients-list', $vital)->with('success', 'Vital saved successfully');
    return redirect()->route('patient.edit', $patient->id)->with('success', 'Vital saved successfully');
}

    
    


    /**
     * Display the specified vital record.
     */
    public function show(Vital $vital)
    {
        return view('vitals.show', compact('vital'));
    }

    /**
     * Show the form for editing the specified vital record.
     */
    public function edit(Vital $vital)
    {
        return view('vitals.edit', compact('vital'));
    }

    /**
     * Update the specified vital record in storage.
     */
    public function update(VitalsRequest $request, Vital $vital)
    {
        $validated = $request->validated();
        
        // Handle checkboxes that might not be present in the request
        $validated['chills'] = $request->has('chills');
        $validated['ambulation'] = $request->has('ambulation');
    
        // Update the vital record
        $vital->update($validated);
    
        return redirect()->route('vitals.show', $vital)
            ->with('success', 'Vital signs updated successfully!');
    }

    /**
     * Remove the specified vital record from storage.
     */
    public function destroy(Vital $vital)
    {
        $vital->delete();

        return redirect()->route('vitals.index')
            ->with('success', 'Vital signs deleted successfully!');
    }
}