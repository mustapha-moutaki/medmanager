<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\CarbonInterval;

class BusinessHour extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'TimesPeriod' => 'array',
    ];
    
    public function getTimesPeriodAttribute(){
        $times = CarbonInterval::minutes($this->step)->toPeriod($this->from, $this->to)->toArray();
        return array_map(fn($time) => $time->format('H:i'), $times);
    }
}