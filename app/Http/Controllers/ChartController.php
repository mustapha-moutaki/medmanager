<?php
// In app/Http/Controllers/ChartController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index()
    {
        // Get monthly patient registrations for the past 12 months
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
        
        $locale = app()->getLocale();
        
        foreach ($patientData as $data) {
            if ($locale == 'ar') {
                // Arabic month names
                $arabicMonths = [
                    1 => 'يناير', 2 => 'فبراير', 3 => 'مارس', 4 => 'أبريل',
                    5 => 'مايو', 6 => 'يونيو', 7 => 'يوليو', 8 => 'أغسطس',
                    9 => 'سبتمبر', 10 => 'أكتوبر', 11 => 'نوفمبر', 12 => 'ديسمبر'
                ];
                $monthName = $arabicMonths[$data->month];
            } else {
                // English month names
                $date = \DateTime::createFromFormat('!m', $data->month);
                $monthName = $date->format('M'); // Short month name
            }
            
            $months[] = $monthName . ' ' . $data->year;
            $counts[] = $data->total;
        }
        
        return view('charts.patients', [
            'chartMonths' => json_encode($months),
            'chartCounts' => json_encode($counts),
            'isRTL' => $locale == 'ar'
        ]);
    }
}