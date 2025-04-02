<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
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
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max:20',
            'age' => 'required|integer|min:0|max:120',
            'gender' => 'required|in:male,female,other',
            'address' => 'required|string|max:500',
            'CIN' => 'required|string|max:20|unique:users,CIN',
            'birth_date' => 'required|date',
            'bio' => 'nullable|string|max:2000',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            
            // Patient-specific fields
            'marital_status' => 'required|in:single,married,divorced,widowed',
            'CNSS' => 'nullable|string|max:255',
            'insurance' => 'nullable|string|max:255',
            'patient_type' => 'required|in:outpatient,inpatient,emergency',
            'extra_phone_number' => 'nullable|string|max:20',
            
            // Document uploads
            'documents' => 'nullable|array',
            'documents.*' => 'file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',

            // Nurse and doctor assignments
            'doctor_id' => 'required|exists:doctors,id',
            'nurse_id' => 'required|exists:staff,id',
        ];
    }
}