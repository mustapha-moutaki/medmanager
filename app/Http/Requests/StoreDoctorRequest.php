<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

    class StoreDoctorRequest extends FormRequest
    {
        /**
         * Determine if the user is authorized to make this request.
         *
         * @return bool
         */
        public function authorize()
        {
            return true; // Change if you want to restrict access based on user roles
        }

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array
         */
        public function rules()
        {
            return [
                // User validation rules
                'first_name'              => 'required|string|max:255',
                'last_name'               => 'required|string|max:255',
                'email'                   => 'required|email|unique:users,email',
                'password'                => 'required|string|min:6',
                'phone'                   => 'required|string|max:15',
                'age'                     => 'required|integer|min:0',
                'CIN'                     => 'required|string|max:20', // Adjust as needed
                'gender'                  => 'required|string|in:male,female,other', // Adjust as needed
                'address'                 => 'nullable|string|max:255',
                'birth_date'              => 'required|date',
                'profile_photo'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'bio'                      => 'nullable|string',
                'email_verified_at'       => 'nullable|date',
                'remember_token'          => 'nullable|string',
                'reset_pass_token'        => 'nullable|string',

                // Doctor validation rules
                'specialist'              => 'required|string|max:255',
                'yearsOfExperience'       => 'required|integer|min:0',
                'emergency_contact_phone'  => 'nullable|string|max:15', // Adjust max length as needed
                'certificate'             => 'nullable|string|max:255',
                
            
            ];

            
        }
    }
