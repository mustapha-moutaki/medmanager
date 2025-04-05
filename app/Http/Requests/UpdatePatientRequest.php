<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\File;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $patientId = $this->route('patient');
        $patient = \App\Models\Patient::findOrFail($patientId);
        $userId = $patient->user_id;

        return [
            // User information
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_date' => 'required|date|before:today',
            'age' => 'required|integer|min:0|max:120',
            'gender' => 'required|in:male,female',
            'CIN' => 'required|string|max:20',
            'bio' => 'nullable|string|max:1000',
            
            // Contact information
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'extra_phone_number' => 'nullable|string|max:20',
            
            // Patient specific information
            'marital_status' => 'required|in:married,single,divorced,widowed',
            'CNSS' => 'nullable|string|max:50',
            'patient_type' => 'required|in:outpatient,inpatient,emergency',
            'registration_date' => 'required|date|before_or_equal:today',
            'insurance' => 'nullable|string|max:255',
            
            // Assigned staff
            'doctor_id' => 'nullable|exists:doctors,id',
            'nurse_id' => 'nullable|exists:staff,id',
            
            // Profile photo
            'profile_photo' => [
                'nullable',
                File::types(['jpg', 'jpeg', 'png', 'gif'])
                    ->max(2 * 1024), // 2MB limit
            ],
        ];
    }
}