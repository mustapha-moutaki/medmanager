<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vital extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'chills',
        'diastole_bp',
        'systole_bp',
        'heart_rate',
        'respiration_rate',
        'spo2',
        'blood_group',
        'temperature',
        'ambulation',
        'fever_history',
        'bmi',
        'fio2',
        'patient_id',

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    // we use casts if we acting with logical info, so to make sure that our database accept just logical values


    /**
     * Get the patient that owns the vitals.
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}