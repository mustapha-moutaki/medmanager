<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VitalsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'chills' => 'required|in:yes,no',
            'ambulation' => 'required|in:yes,no',
            'diastole_bp' => 'nullable|integer|min:0|max:200',
            'systole_bp' => 'nullable|integer|min:0|max:250',
            'heart_rate' => 'nullable|integer|min:0|max:250',
            'respiration_rate' => 'nullable|integer|min:0|max:100',
            'spo2' => 'nullable|integer|min:0|max:100',
            'blood_group' => 'nullable|string|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            'temperature' => 'nullable|numeric|between:30,45',
            'fever_history' => 'nullable|string|in:never,yes,no',
            'bmi' => 'nullable|numeric|between:10,50',
            'fio2' => 'nullable|integer|min:21|max:100',
            'patient_id' => 'required|exists:patients,id',
        ];
    }
}
