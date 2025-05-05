<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BusinessHour;

class BusinessHourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $days= config('appointments.days');
        foreach($days as $day){
            BusinessHour::query()->updateOrCreate(['day' => $day], [
                'from' => "09:00",
                'to' => '17:00',
                'step' => 30,
                'off' => false
            ]);
        }
    }
}
