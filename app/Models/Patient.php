<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'marital_status',
        'CNSS',
        'insurance',
        'patient_type',
        'registration_date',
        'extra_phone_number',
    ];

    protected $casts = [
        'registration_date' => 'datetime',
    ];

    /**
     * Get the user associated with the patient
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the documents for the patient
     */
    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    /**
     * Get the appointments for the patient
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'patient_id');
    }
    
    /**
     * Get the full name attribute
     */
    public function getFullNameAttribute()
    {
        return $this->user->first_name . ' ' . $this->user->last_name;
    }


    public function doctor()
{
    return $this->belongsTo(Doctor::class);
}

public function nurse()
{
    return $this->belongsTo(Staff::class, 'nurse_id');
}

public function vitals()
{
    return $this->hasMany(Vital::class);
}
}