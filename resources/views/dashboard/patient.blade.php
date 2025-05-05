@extends('layouts.app')

@section('title', 'Patient Dashboard')

@section('styles')
<!-- Add animate.css for icon animations -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<!-- Add custom styles -->
<style>
    .card-hover:hover .animated-icon {
        animation: pulse 1s infinite;
    }
    .vital-card {
        transition: all 0.3s ease;
        min-height: 200px;
    }
    .vital-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .card-icon {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endsection

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Page Header -->
    <div class="mb-10 bg-gradient-to-r from-blue-700 to-blue-900 text-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold">Patient Health Dashboard</h1>
        <p class="text-xl opacity-80 mt-2">Monitor your vital signs and manage your healthcare appointments</p>
    </div>

    @php
        // Retrieve the latest vital record
        $firstVital = optional(optional($patient)->vitals)->last();
    @endphp

    <!-- Vitals Section -->
    <div class="mb-12">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b-2 border-blue-200 pb-2">Vital Statistics</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            <!-- Blood Pressure Card -->
            <div class="vital-card bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 card-hover">
                <div class="bg-blue-50 px-6 py-4 border-b border-blue-100 flex items-center">
                    <div class="animated-icon card-icon bg-blue-100 rounded-full p-3 mr-4">
                       
                    </div>
                    <h3 class="font-semibold text-xl text-blue-800">Blood Pressure</h3>
                </div>
                <div class="p-6">
                    <div class="flex items-center mb-6">
                        <div class="bg-blue-100 p-3 rounded-full mr-4">
                            <i class="fas fa-heart text-blue-600 text-2xl animated-icon"></i>
                        </div>
                        <div>
                            <p class="text-gray-500">Systolic</p>
                            <p class="text-2xl font-bold">{{ optional($firstVital)->systole_bp ?? 'N/A' }} <span class="text-sm font-normal text-gray-500">mmHg</span></p>
                            <p class="text-sm text-gray-500">Normal: 90-120 mmHg</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="bg-green-100 p-3 rounded-full mr-4">
                            <i class="fas fa-heartbeat text-green-600 text-2xl animated-icon"></i>
                        </div>
                        <div>
                            <p class="text-gray-500">Diastolic</p>
                            <p class="text-2xl font-bold">{{ optional($firstVital)->diastole_bp ?? 'N/A' }} <span class="text-sm font-normal text-gray-500">mmHg</span></p>
                            <p class="text-sm text-gray-500">Normal: 60-80 mmHg</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Heart Metrics Card -->
            <div class="vital-card bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 card-hover">
                <div class="bg-red-50 px-6 py-4 border-b border-red-100 flex items-center">
                    <div class="animated-icon card-icon bg-red-100 rounded-full p-3 mr-4">
                        
                    </div>
                    <h3 class="font-semibold text-xl text-red-800">Cardiac Health</h3>
                </div>
                <div class="p-6">
                    <div class="flex items-center mb-6">
                        <div class="bg-red-100 p-3 rounded-full mr-4">
                            <i class="fas fa-heart text-red-600 text-2xl animated-icon"></i>
                        </div>
                        <div>
                            <p class="text-gray-500">Heart Rate</p>
                            <p class="text-2xl font-bold">{{ optional($firstVital)->heart_rate ?? 'N/A' }} <span class="text-sm font-normal text-gray-500">bpm</span></p>
                            <p class="text-sm text-gray-500">Normal: 60-100 bpm</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="bg-blue-100 p-3 rounded-full mr-4">
                            <i class="fas fa-tint text-blue-600 text-2xl animated-icon"></i>
                        </div>
                        <div>
                            <p class="text-gray-500">Blood Group</p>
                            <p class="text-2xl font-bold">{{ optional($firstVital)->blood_group ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Respiratory Card -->
            <div class="vital-card bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 card-hover">
                <div class="bg-green-50 px-6 py-4 border-b border-green-100 flex items-center">
                    <div class="animated-icon card-icon bg-green-100 rounded-full p-3 mr-4">
                      
                    </div>
                    <h3 class="font-semibold text-xl text-green-800">Respiratory</h3>
                </div>
                <div class="p-6">
                    <div class="flex items-center mb-6">
                        <div class="bg-green-100 p-3 rounded-full mr-4">
                            <i class="fas fa-lungs text-green-600 text-2xl animated-icon"></i>
                        </div>
                        <div>
                            <p class="text-gray-500">Respiration Rate</p>
                            <p class="text-2xl font-bold">{{ optional($firstVital)->respiration_rate ?? 'N/A' }} <span class="text-sm font-normal text-gray-500">breaths/min</span></p>
                            <p class="text-sm text-gray-500">Normal: 12-16 breaths/min</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="bg-blue-100 p-3 rounded-full mr-4">
                            <i class="fas fa-tint text-blue-600 text-2xl animated-icon"></i>
                        </div>
                        <div>
                            <p class="text-gray-500">SpO2</p>
                            <p class="text-2xl font-bold">{{ optional($firstVital)->spo2 ?? 'N/A' }}%</p>
                            <p class="text-sm text-gray-500">Normal: ≥95%</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Temperature Card -->
            <div class="vital-card bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 card-hover">
                <div class="bg-orange-50 px-6 py-4 border-b border-orange-100 flex items-center">
                    <div class="animated-icon card-icon bg-orange-100 rounded-full p-3 mr-4">
                        
                    </div>
                    <h3 class="font-semibold text-xl text-orange-800">Temperature</h3>
                </div>
                <div class="p-6 flex items-center">
                    <div class="bg-orange-100 p-4 rounded-full mr-5">
                        <i class="fas fa-thermometer-half text-orange-600 text-3xl animated-icon"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 mb-1">Current Reading</p>
                        <p class="text-3xl font-bold">{{ optional($firstVital)->temperature ?? 'N/A' }}°F</p>
                        <p class="text-sm text-gray-500">Normal: 36-37.2°F</p>
                        <div class="mt-2">
                            @if(optional($firstVital)->temperature > 37.5)
                                <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full">Elevated</span>
                            @elseif(optional($firstVital)->temperature < 36)
                                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">Below Normal</span>
                            @else
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Normal</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- BMI Card -->
            <div class="vital-card bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 card-hover">
                <div class="bg-purple-50 px-6 py-4 border-b border-purple-100 flex items-center">
                    <div class="animated-icon card-icon bg-purple-100 rounded-full p-3 mr-4">
                       
                    </div>
                    <h3 class="font-semibold text-xl text-purple-800">Body Mass Index</h3>
                </div>
                <div class="p-6 flex items-center">
                    <div class="bg-purple-100 p-4 rounded-full mr-5">
                        <i class="fas fa-weight text-purple-600 text-3xl animated-icon"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 mb-1">Current BMI</p>
                        <p class="text-3xl font-bold">{{ optional($firstVital)->bmi ?? 'N/A' }}</p>
                        <p class="text-sm text-gray-500">Normal: 18.5-24.9</p>
                        <div class="mt-2">
                            @php
                                $bmi = optional($firstVital)->bmi;
                                $bmiCategory = 'N/A';
                                $bmiColorClass = 'gray';
                                
                                if ($bmi !== null) {
                                    if ($bmi < 18.5) {
                                        $bmiCategory = 'Underweight';
                                        $bmiColorClass = 'blue';
                                    } elseif ($bmi >= 18.5 && $bmi < 25) {
                                        $bmiCategory = 'Normal';
                                        $bmiColorClass = 'green';
                                    } elseif ($bmi >= 25 && $bmi < 30) {
                                        $bmiCategory = 'Overweight';
                                        $bmiColorClass = 'yellow';
                                    } else {
                                        $bmiCategory = 'Obese';
                                        $bmiColorClass = 'red';
                                    }
                                }
                            @endphp
                            <span class="bg-{{ $bmiColorClass }}-100 text-{{ $bmiColorClass }}-800 text-xs px-2 py-1 rounded-full">{{ $bmiCategory }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Symptoms Card -->
            <div class="vital-card bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 card-hover">
                <div class="bg-yellow-50 px-6 py-4 border-b border-yellow-100 flex items-center">
                    <div class="animated-icon card-icon bg-yellow-100 rounded-full p-3 mr-4">
                    
                    </div>
                    <h3 class="font-semibold text-xl text-yellow-800">Symptoms</h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex items-center">
                            <div class="mr-3 bg-blue-100 p-2 rounded-full">
                                <i class="fas fa-snowflake text-blue-600 animated-icon"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Chills</p>
                                <p class="font-semibold">
                                    {{ optional($firstVital)->chills === 'yes' ? 'Yes' : (optional($firstVital)->chills === 'no' ? 'No' : 'N/A') }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="mr-3 bg-yellow-100 p-2 rounded-full">
                                <i class="fas fa-file-medical text-yellow-600 animated-icon"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Fever History</p>
                                <p class="font-semibold">{{ optional($firstVital)->fever_history ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="mr-3 bg-gray-100 p-2 rounded-full">
                                <i class="fas fa-walking text-gray-600 animated-icon"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Ambulation</p>
                                <p class="font-semibold">
                                    {{ optional($firstVital)->ambulation === 'yes' ? 'Yes' : (optional($firstVital)->ambulation === 'no' ? 'No' : 'N/A') }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="mr-3 bg-green-100 p-2 rounded-full">
                                <i class="fas fa-lungs text-green-600 animated-icon"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">FiO2</p>
                                <p class="font-semibold">{{ optional($firstVital)->fio2 ?? 'N/A' }}%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Appointments Section -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        <!-- Appointments Table -->
        <div class="lg:col-span-3">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-blue-700 to-blue-900 px-8 py-6 flex items-center">
                    <div class="animated-icon mr-4 bg-white bg-opacity-20 p-3 rounded-full">
                        <i class="fas fa-calendar-check text-white text-2xl"></i>
                    </div>
                    <h2 class="text-white text-xl font-bold">Upcoming Appointments</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 text-left">
                                <th class="px-8 py-4 text-gray-700 font-medium">Date</th>
                                <th class="px-8 py-4 text-gray-700 font-medium">Time</th>
                                <th class="px-8 py-4 text-gray-700 font-medium">Doctor</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @if($patient && $patient->appointments->isNotEmpty())
                                @foreach ($patient->appointments as $appointment)
                                <tr class="hover:bg-blue-50 transition duration-200">
                                    <td class="px-8 py-5 border-b">{{ $appointment->date ?? 'N/A' }}</td>
                                    <td class="px-8 py-5 border-b">{{ optional($appointment->time)->format('h:i A') ?? '' }}</td>
                                    <td class="px-8 py-5 border-b">{{ optional(optional($appointment->doctor)->user)->first_name ?? 'N/A' }}</td>
                                   
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="px-8 py-12 text-center text-gray-500">
                                        <div class="flex flex-col items-center">
                                          
                                            <p class="text-lg font-medium mb-2">No appointments found</p>
                                            <p class="text-gray-500">Schedule your first appointment below</p>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Appointment Scheduling Card -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden h-full">
                <div class="bg-gradient-to-r from-blue-700 to-blue-900 px-6 py-6">
                    <div class="flex justify-center mb-4">
                        <div class="animated-icon bg-white bg-opacity-20 p-4 rounded-full">
                            <i class="fas fa-calendar-plus text-white text-3xl"></i>
                        </div>
                    </div>
                    <h2 class="text-white font-bold text-xl text-center">Schedule Appointment</h2>
                </div>
                <div class="p-6">
                    <div class="flex justify-center mb-6">
                     
                    </div>
                    <p class="text-gray-600 mb-6 text-center">Need to see a doctor? Schedule your next appointment with our healthcare professionals.</p>
                    <a href="{{ route('reserveappointment', ['id' => auth()->id()]) }}" 
                       class="block w-full bg-blue-600 hover:bg-blue-700 transition-colors duration-200 text-white font-bold py-4 px-6 rounded-lg text-center shadow-md hover:shadow-lg animated-icon">
                        <i class="fas fa-calendar-plus mr-2"></i> Book Appointment
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection