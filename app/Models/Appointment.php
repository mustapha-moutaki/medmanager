<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'date',
        'time',
    ];

    protected $casts= [
        'time' =>'datetime'
    ];
    protected $guarded = [];
 

    public function doctor()
    {
    return $this->belongsTo(Doctor::class);
    }

public function patient()
{
    return $this->belongsTo(Patient::class);
}
}
