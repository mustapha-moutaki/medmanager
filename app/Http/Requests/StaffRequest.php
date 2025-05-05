<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
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
            'first_name'              => 'required|string|max:255',
            'last_name'               => 'required|string|max:255',
            'email'                   => 'required|email|unique:users,email',
            'password'                => 'required|string|min:6',
            'phone'                   => 'required|string|max:15',
            'age'                     => 'nullable|integer|min:0',
            'CIN'                     => 'required|string|max:20',
            'gender'                  => 'required|string|in:male,female',
            'address'                 => 'nullable|string|max:255',
            'birth_date'              => 'required|date',
            'profile_photo'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio'                     => 'nullable|string',
            'email_verified_at'       => 'nullable|date',
            'remember_token'          => 'nullable|string',
            'reset_pass_token'        => 'nullable|string',

            // staff add infos
            'specialist'              => 'required|string|max:255|in:Cardiology,Emergency,Pediatric,Intensive Care,Oncology,Maternity,Surgical,Psychiatric,General',
            'years_of_experience'       => 'required|integer|min:0',
            'license_number'            => 'required|digits_between:5,10',
            'license_expiry_date'          => 'required|date',
            'department'              => 'required|string',
            'role'                    => 'required|string|in:Nurse,Receptionist,Technician,Other',
            'shift_preference'        => 'required|string|in:Morning,Evening,Night,Rotating',
            'employment_status'       => 'required|string|in:full_time,part_time,contract',
            'emergency_contact_phone' => 'nullable|string|max:15',
            'certificate'             => 'nullable|string|max:255',
        ];
    }
   

    /**
     * Get the custom validation messages for the request.
     *
     * @return array
     */
    // public function messages(): array
    // {
    //     return [
    //     'first_name.required' => 'First name is required.',
    //     'first_name.string' => 'The first name must be a string.',
    //     'first_name.max' => 'The first name must not exceed 255 characters.',

    //     'last_name.required' => 'Last name is required.',
    //     'last_name.string' => 'The last name must be a string.',
    //     'last_name.max' => 'The last name must not exceed 255 characters.',

    //     'email.required' => 'Email is required.',
    //     'email.email' => 'The email must be a valid email address.',
    //     'email.unique' => 'The email is already registered.',

    //     'password.required' => 'Password is required.',
    //     'password.string' => 'The password must be a string.',
    //     'password.min' => 'The password must be at least 6 characters long.',

    //     'phone.required' => 'Phone number is required.',
    //     'phone.string' => 'The phone number must be a string.',
    //     'phone.max' => 'The phone number must not exceed 15 digits.',

    //     // 'age.required' => 'Age is required.',
    //     // 'age.integer' => 'The age must be an integer.',
    //     // 'age.min' => 'Age cannot be less than 0.',

    //     'CIN.required' => 'National ID is required.',
    //     'CIN.string' => 'The national ID must be a string.',
    //     'CIN.max' => 'The national ID must not exceed 20 characters.',

    //     'gender.required' => 'Gender is required.',
    //     'gender.in' => 'Gender must be either "male" or "female".',

    //     'birth_date.required' => 'Birth date is required.',
    //     'birth_date.date' => 'The birth date must be a valid date.',

    //     'profile_photo.image' => 'The file must be an image.',
    //     'profile_photo.mimes' => 'The image must be in one of the following formats: jpeg, png, jpg, gif.',
    //     'profile_photo.max' => 'The image must not exceed 2MB.',

    //     'specialist.required' => 'Specialty is required.',
    //     'specialist.in' => 'The specialty must be one of the specified values.',

    //     'yearsOfExperience.required' => 'Years of experience are required.',
    //     'yearsOfExperience.integer' => 'The years of experience must be an integer.',
    //     'yearsOfExperience.min' => 'Years of experience cannot be less than 0.',

    //     'license_number.required' => 'License number is required.',
    //     'license_number.integer' => 'The license number must be a number.',
    //     'license_number.max' => 'The license number must not exceed 100.',

    //     'license_expiry.required' => 'License expiry date is required.',
    //     'license_expiry.date' => 'The license expiry date must be a valid date.',

    //     'role.required' => 'Role is required.',
    //     'role.in' => 'The role must be one of the following: nurse, receptionist, technician, other.',

    //     'shift_preference.required' => 'Shift preference is required.',
    //     'shift_preference.in' => 'The shift preference must be one of the following: Morning, Evening, Night, Rotating.',

    //     'employment_status.required' => 'Employment status is required.',
    //     'employment_status.in' => 'Employment status must be one of the following: full_time, part_time, contract.',

    //     'emergency_contact_phone.max' => 'The emergency contact phone number must not exceed 15 digits.',

    //     'certificate.max' => 'The certificate must not exceed 255 characters.',

    //     ];
    // }
}
