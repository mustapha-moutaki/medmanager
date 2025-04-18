<?php
namespace App\Repositories;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Patient; // نموذج المرضى
use App\Models\Staff; // نموذج الموظفين
use App\Repositories\Interfaces\UserRepository;

class EloquentUserRepository implements UserRepository
{
    public function all()
    {
       
    }

    public function find($id)
    {
        
    }

    public function countDoctors()
    {
        return Doctor::count();
    }

    public function countPatients()
    {
        return Patient::count(); 
    }

    public function countStaff()
    {
        return Staff::count(); 
    }

    public function countAppointments()
    {
        return Appointment::whereDate('date', Carbon::today())->count();
    }

    public function gender()
    {
        $totalUsers = User::count();
        
        if ($totalUsers === 0) {
            return [
                'majority_gender' => 'none',
                'majority_percentage' => 0,
            ];
        }

        $maleCount = User::where('gender', 'male')->count();
        $femaleCount = User::where('gender', 'female')->count();

        $malePercentage = ($maleCount / $totalUsers) * 100;
        $femalePercentage = ($femaleCount / $totalUsers) * 100;

        if ($malePercentage > $femalePercentage) {
            return [
                'majority_gender' => 'male',
                'majority_percentage' => round($malePercentage, 2),
            ];
        } else {
            return [
                'majority_gender' => 'female',
                'majority_percentage' => round($femalePercentage, 2),
            ];
        }
    }
}
