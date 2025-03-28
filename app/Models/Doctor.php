<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Doctor extends Model
{
    use HasFactory;

        protected $fillable = [
            'user_id',  
            'first_name',
            'last_name',
            'email',
            'password',
            'phone',
            'age',
            'CIN',
            'gender',
            'address',
            'birth_date',
            'profile_photo',
            'bio',
            'email_verified_at',
            'remember_token',
            'reset_pass_token',
            'specialist',
            'yearsOfExperience',
            'emergency_contact_phone',
            'certificate',
        ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
