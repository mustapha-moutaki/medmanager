<?php
namespace App\Http\Controllers;

use Carbon\Carbon; 
use App\Models\Patient;
use App\Models\Appointment; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\UserRepository;

class AdminController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        if (Auth::check() && Auth::user()->hasRole(['admin']) || Auth::user()->hasRole(['reception'])) {
            $doctorsCount = $this->userRepository->countDoctors();
            $patientsCount = $this->userRepository->countPatients();
            $staffCount = $this->userRepository->countStaff();
            $appointmentsCount = $this->userRepository->countAppointments();
            $genderStats = $this->userRepository->gender(); 

            // Fetch today's appointments
            $currentDate = Carbon::now()->format('Y-m-d');
            $appointments = Appointment::whereDate('date', $currentDate)
                ->with('patient') // Load related patient
                ->get();

                $patientData = Patient::select(
                    DB::raw('YEAR(created_at) as year'),
                    DB::raw('MONTH(created_at) as month'),
                    DB::raw('COUNT(*) as total')
                )
                ->whereRaw('created_at >= DATE_SUB(NOW(), INTERVAL 12 MONTH)')
                ->groupBy('year', 'month')
                ->orderBy('year')
                ->orderBy('month')
                ->get();
                
                // Format data for Chart.js
                $months = [];
                $counts = [];
                
                foreach ($patientData as $data) {
                    // Format month name based on locale
                    $date = \DateTime::createFromFormat('!m', $data->month);
                    $monthName = $date->format('M'); // Short month name
                    
                    $months[] = $monthName . ' ' . $data->year;
                    $counts[] = $data->total;
                }
                
               

                return view('dashboard.admin', [
                    'doctorsCount' => $doctorsCount,
                    'patientsCount' => $patientsCount,
                    'staffCount' => $staffCount,
                    'appointmentsCount' => $appointmentsCount,
                    'genderStats' => $genderStats,
                    'appointments' => $appointments,
                    'chartMonths' => json_encode($months),
                    'chartCounts' => json_encode($counts),
                    'isRTL' => app()->getLocale() == 'ar'
                ]);
        }


        

        return redirect()->route('/home')->with('error', 'You do not have access to this page!');
    }
}
