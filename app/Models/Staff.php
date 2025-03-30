<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{

    protected $table='staff';
    protected $fillable=[
        'specialist',//
        'years_of_experience',//
        'certificate',//
        'license_number',//
        'license_expiry_date',//
        'shift_preference',//   
        'employment_status',//
        'emergency_contact_phone',//
        'role'//
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
