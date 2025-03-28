<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable=[
        'specialist',
        'years_of_experience',
        'certificate',
        'license_number',
        'shift_preference',
        'employment_status',
        'emergency_contact_phone',
        'role'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
