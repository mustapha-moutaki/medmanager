<?php
namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Autoriser tous les utilisateurs à envoyer cette requête
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'nullable|integer|min:1|max:120',
            'gender' => 'required|in:male,female',
            'address' => 'nullable|string|max:500',
            'CIN' => 'nullable|string|max:20|unique:users,CIN',
            'phone' => 'required|string|max:15|unique:users,phone',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Le prénom est obligatoire.',
            'last_name.required' => 'Le nom est obligatoire.',
            'age.integer' => 'L\'âge doit être un nombre entier.',
            'age.min' => 'L\'âge doit être au moins 1.',
            'age.max' => 'L\'âge ne peut pas dépasser 120 ans.',
            'gender.required' => 'Le genre est obligatoire.',
            'gender.in' => 'Le genre doit être "male" ou "female".',
            'address.max' => 'L\'adresse ne peut pas dépasser 500 caractères.',
            'CIN.unique' => 'Ce CIN est déjà utilisé.',
            'CIN.max' => 'Le CIN ne peut pas dépasser 20 caractères.',
            'phone.required' => 'Le numéro de téléphone est obligatoire.',
            'phone.unique' => 'Ce numéro de téléphone est déjà utilisé.',
            'email.required' => 'L\'adresse e-mail est obligatoire.',
            'email.unique' => 'Cette adresse e-mail est déjà utilisée.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins 6 caractères.',
            'password.confirmed' => 'Les mots de passe ne correspondent pas.',
        ];
    }
}