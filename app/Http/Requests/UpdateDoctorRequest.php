<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDoctorRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'age' => 'required|integer|min:0|max:120',
            'gender' => 'required|in:male,female,other',
            'address' => 'required|string|max:500',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email,',
            'emergency_contact_phone' => 'required|string|max:20',
            'specialist' => 'sometimes|string|max:255',
            'years_of_experience' => 'required|integer|min:0',
            'patients_treated' => 'required|integer|min:0',
            'certificates' => 'nullable|string|max:1000',
            'bio' => 'nullable|string|max:2000',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    /**
     * Custom error messages (optional)
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'email.unique' => 'This email is already in use by another user.',
            'birthdate.before' => 'Birthdate must be a date before today.',
            'image.dimensions' => 'Image must not exceed 3000x3000 pixels.',
            'photo.max' => 'Photo must not be larger than 2MB.',
        ];
    }
}