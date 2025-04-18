@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<main class="bg-white flex-1 p-6 overflow-hidden">
                <div class="flex items-center justify-between mb-6">
                    <h1 class="text-2xl font-semibold text-gray-800">Dashboard Overview</h1>
                    <div class="text-sm text-gray-600">
                        <i class="far fa-calendar-alt mr-1"></i> 
                        <span id="currentDate">March 2, 2025</span>
                    </div>
                </div>
                
                <div class="dashboard-grid">
                    <div>
                        <!-- Stats Row -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
                            <div class="stat-card bg-white p-4 border-l-4 border-red-500">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="text-3xl font-bold text-gray-800">{{ $patientsCount }}</div>
                                        <div class="text-sm mt-1 text-gray-600">patients</div>
                                    </div>
                                    <div class="h-12 w-12 rounded-full bg-blue-100 flex items-center justify-center">
                                        <i class="fas fa-user-injured text-blue-500 text-xl"></i>
                                    </div>
                                </div>
                                <div class="mt-2 text-xs text-green-600">
                                    <i class="fas fa-arrow-up mr-1"></i> 
                                    <span>12% this month</span>
                                </div>
                            </div>

                            <div class="stat-card bg-white p-4 border-l-4 border-green-500">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="text-3xl font-bold text-gray-800">{{ $appointmentsCount }}</div>
                                        <div class="text-sm mt-1 text-gray-600">Appointments Today</div>
                                    </div>
                                    <div class="h-12 w-12 rounded-full bg-green-100 flex items-center justify-center">
                                        <i class="fas fa-calendar-check text-green-500 text-xl"></i>
                                    </div>
                                </div>
                                <div class="mt-2 text-xs text-green-600">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    <span>8% this week</span>
                                </div>
                            </div>

                            <div class="stat-card bg-white p-4 border-l-4 border-purple-500">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="text-3xl font-bold text-gray-800">$4,850</div>
                                        <div class="text-sm mt-1 text-gray-600">Revenue Today</div>
                                    </div>
                                    <div class="h-12 w-12 rounded-full bg-purple-100 flex items-center justify-center">
                                        <i class="fas fa-money-bill-wave text-purple-500 text-xl"></i>
                                    </div>
                                </div>
                                <div class="mt-2 text-xs text-green-600">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    <span>15% this month</span>
                                </div>
                            </div>

                            <div class="stat-card bg-white p-4 border-l-4 border-blue-500">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-3xl font-bold text-gray-800">{{ $doctorsCount }}</div>
                                <div class="text-sm mt-1 text-gray-600">Doctors Available</div>
                            </div>
                            <div class="h-12 w-12 rounded-full bg-blue-100 flex items-center justify-center">
                                <i class="fas fa-user-md text-blue-500 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-2 text-xs text-blue-600">
                            <i class="fas fa-equals mr-1"></i>
                            <span>Same as last week</span>
                        </div>
                    </div>


                            <div class="stat-card bg-white p-4 border-l-4 border-yellow-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-3xl font-bold text-gray-800">{{ $staffCount }}</div>
                            <div class="text-sm mt-1 text-gray-600">Total Staff</div>
                        </div>
                        <div class="h-12 w-12 rounded-full bg-blue-100 flex items-center justify-center">
                            <i class="fas fa-user-tie text-blue-500 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-2 text-xs text-blue-600">
                        <i class="fas fa-info-circle mr-1"></i>
                        <span>Staff Members Overview</span>
                    </div>
                </div>


                            <div class="stat-card bg-white p-4 border-l-4 border-green-300">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="text-2xl font-bold text-gray-800">Majority gneder</div>
                                        <div class="text-sm mt-1 text-gray-600">  @if($genderStats['majority_gender'] === 'male')
                                            <i class="fas fa-male text-teal-500 text-xl"></i>
                                        @else
                                            <i class="fas fa-female text-teal-500 text-xl"></i>
                                        @endif
                                        <!-- we use ucfirst to make stirng like upercase -->
                                        {{ ucfirst($genderStats['majority_gender']) }}: {{ $genderStats['majority_percentage'] }}%</div>
                                    </div>
                                    <div class="h-12 w-12 rounded-full bg-teal-100 flex items-center justify-center">
                                        <i class="fas fa-smile text-teal-500 text-xl"></i>
                                    </div>
                                </div>
                                <div class="mt-2 text-xs text-green-600">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    <span>5% this month</span>
                                </div>
                            </div>
                        </div>

                        <!-- Chart Container -->
                        <div class="container">
    <div class="bg-white p-4 rounded-lg shadow-sm mb-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">
            {{ __('Monthly Patient Registrations') }}
        </h2>
        <div class="chart-container" style="height: 300px;">
            <canvas id="patientsChart"></canvas>
        </div>
    </div>
</div>
                   
                        <!-- Doctors Section -->
                        <div class="bg-white p-4 rounded-lg shadow-sm mb-6">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-lg font-semibold text-gray-800">Available Doctors Today</h2>
                                <a href="#" class="text-sm text-primary hover:underline">View All</a>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                <div class="profile-card bg-white shadow-sm overflow-hidden border border-gray-100">
                                    <div class="h-24 bg-gradient-to-r from-blue-500 to-blue-700"></div>
                                    <div class="flex justify-center -mt-8">
                                        <img src="/api/placeholder/80/80" alt="Dr. Emma Thompson" class="h-16 w-16 rounded-full border-4 border-white object-cover">
                                    </div>
                                    <div class="text-center px-3 pb-4 pt-2">
                                        <h3 class="text-gray-800 text-md font-semibold">Dr. Emma Thompson</h3>
                                        <p class="mt-1 text-gray-600 text-sm">Cardiologist</p>
                                        <div class="mt-2 flex justify-center space-x-2">
                                            <button class="px-3 py-1 text-xs bg-primary text-white rounded-full">Schedule</button>
                                            <button class="px-3 py-1 text-xs bg-gray-100 text-gray-700 rounded-full">Profile</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-card bg-white shadow-sm overflow-hidden border border-gray-100">
                                    <div class="h-24 bg-gradient-to-r from-green-500 to-green-700"></div>
                                    <div class="flex justify-center -mt-8">
                                        <img src="/api/placeholder/80/80" alt="Dr. Robert Chen" class="h-16 w-16 rounded-full border-4 border-white object-cover">
                                    </div>
                                    <div class="text-center px-3 pb-4 pt-2">
                                        <h3 class="text-gray-800 text-md font-semibold">Dr. Robert Chen</h3>
                                        <p class="mt-1 text-gray-600 text-sm">Neurologist</p>
                                        <div class="mt-2 flex justify-center space-x-2">
                                            <button class="px-3 py-1 text-xs bg-primary text-white rounded-full">Schedule</button>
                                            <button class="px-3 py-1 text-xs bg-gray-100 text-gray-700 rounded-full">Profile</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-card bg-white shadow-sm overflow-hidden border border-gray-100">
                                    <div class="h-24 bg-gradient-to-r from-purple-500 to-purple-700"></div>
                                    <div class="flex justify-center -mt-8">
                                        <img src="/api/placeholder/80/80" alt="Dr. Sarah Johnson" class="h-16 w-16 rounded-full border-4 border-white object-cover">
                                    </div>
                                    <div class="text-center px-3 pb-4 pt-2">
                                        <h3 class="text-gray-800 text-md font-semibold">Dr. Sarah Johnson</h3>
                                        <p class="mt-1 text-gray-600 text-sm">Pediatrician</p>
                                        <div class="mt-2 flex justify-center space-x-2">
                                            <button class="px-3 py-1 text-xs bg-primary text-white rounded-full">Schedule</button>
                                            <button class="px-3 py-1 text-xs bg-gray-100 text-gray-700 rounded-full">Profile</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Calendar Section -->
                    <div>
                        <div class="bg-white p-4 rounded-lg shadow-sm mb-6">
                            <div class="flex items-center justify-between mb-4">
                               
                              
                            </div>

                            <!-- Calendar Grid -->
      <!-- Calendar Section -->
<div>
    <div class="bg-white p-4 rounded-lg shadow-sm mb-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold text-gray-800">{{ \Carbon\Carbon::now()->format('F Y') }}</h2>
            <div class="flex space-x-2">
                <button class="p-1 rounded hover:bg-gray-100">
                    <!-- <i class="fas fa-chevron-left text-gray-600"></i> -->
                </button>
                <span class="text-gray-700">{{ \Carbon\Carbon::now()->format('F Y') }}</span>
                <button class="p-1 rounded hover:bg-gray-100">
                    <!-- <i class="fas fa-chevron-right text-gray-600"></i> -->
                </button>
            </div>
        </div>

        <!-- Calendar Grid -->
        <div class="grid grid-cols-7 gap-1 mb-2">
            <div class="text-center text-sm font-medium text-gray-500">Sun</div>
            <div class="text-center text-sm font-medium text-gray-500">Mon</div>
            <div class="text-center text-sm font-medium text-gray-500">Tue</div>
            <div class="text-center text-sm font-medium text-gray-500">Wed</div>
            <div class="text-center text-sm font-medium text-gray-500">Thu</div>
            <div class="text-center text-sm font-medium text-gray-500">Fri</div>
            <div class="text-center text-sm font-medium text-gray-500">Sat</div>
        </div>

        <div class="grid grid-cols-7 gap-1">
            <!-- Previous month days -->
            <div class="calendar-day text-gray-400 p-2 text-center">30</div>
            <div class="calendar-day text-gray-400 p-2 text-center">31</div>
            <div class="calendar-day text-gray-600 p-2 text-center">1</div>
            <div class="calendar-day text-gray-600 p-2 text-center">2</div>
            <div class="calendar-day text-gray-600 p-2 text-center">3</div>
            <div class="calendar-day text-gray-600 p-2 text-center">4</div>
            <div class="calendar-day text-gray-600 p-2 text-center">5</div>
            
            <!-- Current month days with current day highlighted and appointment indicators -->
            <div class="calendar-day text-gray-600 p-2 text-center">6</div>
            <div class="calendar-day text-gray-600 p-2 text-center">7</div>
            <div class="calendar-day text-gray-600 p-2 text-center">8</div>
            <div class="calendar-day text-gray-600 p-2 text-center">9</div>
            <div class="calendar-day text-gray-600 p-2 text-center">10</div>
            
            <!-- Today - Highlighted -->
            <div class="calendar-day bg-blue-500 rounded-lg p-2 text-center text-white font-medium">{{ \Carbon\Carbon::now()->format('d') }}</div>
            
            <div class="calendar-day text-gray-600 p-2 text-center">12</div>
            <div class="calendar-day text-gray-600 p-2 text-center">13</div>
            <div class="calendar-day text-gray-600 p-2 text-center relative">
                14
                <div class="absolute bottom-0.5 left-1/2 transform -translate-x-1/2 h-1.5 w-1.5 bg-primary rounded-full"></div>
            </div>
            <div class="calendar-day text-gray-600 p-2 text-center">15</div>
            <div class="calendar-day text-gray-600 p-2 text-center">16</div>
            <div class="calendar-day text-gray-600 p-2 text-center">17</div>
            <div class="calendar-day text-gray-600 p-2 text-center">18</div>
            <div class="calendar-day text-gray-600 p-2 text-center">19</div>
            <div class="calendar-day text-gray-600 p-2 text-center">20</div>
            <div class="calendar-day text-gray-600 p-2 text-center">21</div>
            <div class="calendar-day text-gray-600 p-2 text-center relative">
                22
                <div class="absolute bottom-0.5 left-1/2 transform -translate-x-1/2 h-1.5 w-1.5 bg-primary rounded-full"></div>
            </div>
            <div class="calendar-day text-gray-600 p-2 text-center">23</div>
            <div class="calendar-day text-gray-600 p-2 text-center">24</div>
            <div class="calendar-day text-gray-600 p-2 text-center">25</div>
            <div class="calendar-day text-gray-600 p-2 text-center">26</div>
            <div class="calendar-day text-gray-600 p-2 text-center">27</div>
            <div class="calendar-day text-gray-600 p-2 text-center">28</div>
            <div class="calendar-day text-gray-600 p-2 text-center">29</div>
            <div class="calendar-day text-gray-600 p-2 text-center">30</div>
            <div class="calendar-day text-gray-400 p-2 text-center">1</div>
            <div class="calendar-day text-gray-400 p-2 text-center">2</div>
            <div class="calendar-day text-gray-400 p-2 text-center">3</div>
        </div>
    </div>
</div>

                        <!-- Today's Appointments -->
                        <div class="bg-white p-4 rounded-lg shadow-sm mb-6">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-lg font-semibold text-gray-800">Today's Appointments</h2>
                                <a href="#" class="text-sm text-primary hover:underline">View All</a>
                            </div>
                            
                            <div class="space-y-3">
                              
                            @if($appointments->isEmpty())
                <div class="p-3 text-gray-500">No appointments for today.</div>
                </div>
            @else
                @foreach($appointments as $appointment)
                    <div class="p-3 border border-gray-100 rounded-lg flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                <i class="fas fa-user-injured text-blue-500"></i>
                            </div>
                            <div>
                                <div class="text-sm font-medium">{{ $appointment->patient->user->first_name . ' '. $appointment->patient->user->last_name}}</div>
                                <div class="text-xs text-gray-500">{{ $appointment->description }}</div>
                            </div>
                        </div>
                        <div class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}</div>
                    </div>
                @endforeach
            @endif
                            </div>
                        </div>
                        
                       <!-- Quick Actions -->
                       <div class="bg-white p-4 rounded-lg shadow-sm">
                        <h2 class="text-lg font-semibold text-gray-800 mb-3">Quick Actions</h2>
                        <div class="grid grid-cols-2 gap-2">
                            <button class="p-3 bg-blue-50 text-blue-600 rounded-lg text-sm flex items-center justify-center">
                                <a href="{{ route('patient.create') }}"><i class="fas fa-user-plus mr-2"></i> New Patient</a> 
                            </button>
                            <button class="p-3 bg-green-50 text-green-600 rounded-lg text-sm flex items-center justify-center">
                                <a href="{{ route('patients-list') }}"><i class="fas fa-calendar-plus mr-2"></i> New Appointment</a>
                            </button>
                            <button class="p-3 bg-purple-50 text-purple-600 rounded-lg text-sm flex items-center justify-center">
                                <i class="fas fa-file-prescription mr-2"></i> Create Prescription
                            </button>
                            <button class="p-3 bg-amber-50 text-amber-600 rounded-lg text-sm flex items-center justify-center">
                                <i class="fas fa-file-invoice-dollar mr-2"></i> Generate Invoice
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        @endsection
        @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get data from PHP variables
            const months = {!! $chartMonths !!};
            const counts = {!! $chartCounts !!};
            const isRTL = {{ $isRTL ? 'true' : 'false' }};
            
            // Set RTL options if needed
            if (isRTL) {
                Chart.defaults.font.family = 'Arial, sans-serif';
                Chart.defaults.plugins.tooltip.rtl = true;
                Chart.defaults.plugins.legend.rtl = true;
            }
            
            // Check if we have data
            if (months.length === 0) {
                document.querySelector('.chart-container').innerHTML = 
                    '<div class="p-4 text-center">No patient data available</div>';
                return;
            }
            
            // Create the chart
            const ctx = document.getElementById('patientsChart').getContext('2d');
            const patientsChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: months,
                    datasets: [{
                        label: '{{ __("New Patients") }}',
                        data: counts,
                        backgroundColor: 'rgba(75, 192, 192, 0.4)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: isRTL ? 'right' : 'top',
                        },
                        title: {
                            display: true,
                            text: '{{ __("Monthly Patient Registrations") }}'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: '{{ __("Number of Patients") }}'
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection