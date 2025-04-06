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
                            <div class="stat-card bg-white p-4 border-l-4 border-blue-500">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="text-3xl font-bold text-gray-800">150</div>
                                        <div class="text-sm mt-1 text-gray-600"></div>
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
                                        <div class="text-3xl font-bold text-gray-800">42</div>
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

                            <div class="stat-card bg-white p-4 border-l-4 border-amber-500">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="text-3xl font-bold text-gray-800">24</div>
                                        <div class="text-sm mt-1 text-gray-600">Doctors Available</div>
                                    </div>
                                    <div class="h-12 w-12 rounded-full bg-amber-100 flex items-center justify-center">
                                        <i class="fas fa-user-md text-amber-500 text-xl"></i>
                                    </div>
                                </div>
                                <div class="mt-2 text-xs text-amber-600">
                                    <i class="fas fa-equals mr-1"></i>
                                    <span>Same as last week</span>
                                </div>
                            </div>

                            <div class="stat-card bg-white p-4 border-l-4 border-red-500">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="text-3xl font-bold text-gray-800">7</div>
                                        <div class="text-sm mt-1 text-gray-600">Pending Reports</div>
                                    </div>
                                    <div class="h-12 w-12 rounded-full bg-red-100 flex items-center justify-center">
                                        <i class="fas fa-file-medical-alt text-red-500 text-xl"></i>
                                    </div>
                                </div>
                                <div class="mt-2 text-xs text-red-600">
                                    <i class="fas fa-clock mr-1"></i>
                                    <span>Need attention</span>
                                </div>
                            </div>

                            <div class="stat-card bg-white p-4 border-l-4 border-teal-500">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="text-3xl font-bold text-gray-800">93%</div>
                                        <div class="text-sm mt-1 text-gray-600">Patient Satisfaction</div>
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
                        <div class="bg-white p-4 rounded-lg shadow-sm mb-6">
                            <h2 class="text-lg font-semibold text-gray-800 mb-4">Patient Visits Overview</h2>
                            <div class="chart-container">
                                <canvas id="patientsChart"></canvas>
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
                                <h2 class="text-lg font-semibold text-gray-800">Calendar</h2>
                                <div class="flex space-x-2">
                                    <button class="p-1 rounded hover:bg-gray-100">
                                        <i class="fas fa-chevron-left text-gray-600"></i>
                                    </button>
                                    <span class="text-gray-700">March 2025</span>
                                    <button class="p-1 rounded hover:bg-gray-100">
                                        <i class="fas fa-chevron-right text-gray-600"></i>
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
                                <div class="calendar-day text-gray-400">23</div>
                                <div class="calendar-day text-gray-400">24</div>
                                <div class="calendar-day text-gray-400">25</div>
                                <div class="calendar-day text-gray-400">26</div>
                                <div class="calendar-day text-gray-400">27</div>
                                <div class="calendar-day text-gray-400">28</div>
                                <div class="calendar-day text-gray-600">1</div>
                                
                                <!-- Current month days -->
                                <div class="calendar-day active text-gray-600">2</div>
                                <div class="calendar-day has-event text-gray-600">3</div>
                                <div class="calendar-day text-gray-600">4</div>
                                <div class="calendar-day text-gray-600">5</div>
                                <div class="calendar-day has-event text-gray-600">6</div>
                                <div class="calendar-day text-gray-600">7</div>
                                <div class="calendar-day text-gray-600">8</div>
                                
                                <div class="calendar-day text-gray-600">9</div>
                                <div class="calendar-day text-gray-600">10</div>
                                <div class="calendar-day has-event text-gray-600">11</div>
                                <div class="calendar-day text-gray-600">12</div>
                                <div class="calendar-day text-gray-600">13</div>
                                <div class="calendar-day has-event text-gray-600">14</div>
                                <div class="calendar-day text-gray-600">15</div>
                                
                                <div class="calendar-day text-gray-600">16</div>
                                <div class="calendar-day text-gray-600">17</div>
                                <div class="calendar-day text-gray-600">18</div>
                                <div class="calendar-day has-event text-gray-600">19</div>
                                <div class="calendar-day text-gray-600">20</div>
                                <div class="calendar-day text-gray-600">21</div>
                                <div class="calendar-day text-gray-600">22</div>
                                
                                <div class="calendar-day text-gray-600">23</div>
                                <div class="calendar-day has-event text-gray-600">24</div>
                                <div class="calendar-day text-gray-600">25</div>
                                <div class="calendar-day text-gray-600">26</div>
                                <div class="calendar-day text-gray-600">27</div>
                                <div class="calendar-day has-event text-gray-600">28</div>
                                <div class="calendar-day text-gray-600">29</div>
                                
                                <div class="calendar-day text-gray-600">30</div>
                                <div class="calendar-day text-gray-600">31</div>
                                <div class="calendar-day text-gray-400">1</div>
                                <div class="calendar-day text-gray-400">2</div>
                                <div class="calendar-day text-gray-400">3</div>
                                <div class="calendar-day text-gray-400">4</div>
                                <div class="calendar-day text-gray-400">5</div>
                            </div>
                        </div>

                        <!-- Today's Appointments -->
                        <div class="bg-white p-4 rounded-lg shadow-sm mb-6">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-lg font-semibold text-gray-800">Today's Appointments</h2>
                                <a href="#" class="text-sm text-primary hover:underline">View All</a>
                            </div>
                            
                            <div class="space-y-3">
                                <div class="p-3 border border-gray-100 rounded-lg flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-user-injured text-blue-500"></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium">John Wilson</div>
                                            <div class="text-xs text-gray-500">Follow-up Appointment</div>
                                        </div>
                                    </div>
                                    <div class="text-sm text-gray-600">09:00 AM</div>
                                </div>
                                
                                <div class="p-3 border border-gray-100 rounded-lg flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-user-injured text-green-500"></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium">Sarah Johnson</div>
                                            <div class="text-xs text-gray-500">Consultation</div>
                                        </div>
                                    </div>
                                    <div class="text-sm text-gray-600">10:30 AM</div>
                                </div>
                                
                                <div class="p-3 border border-gray-100 rounded-lg flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-user-injured text-purple-500"></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium">Robert Chen</div>
                                            <div class="text-xs text-gray-500">Annual Checkup</div>
                                        </div>
                                    </div>
                                    <div class="text-sm text-gray-600">01:15 PM</div>
                                </div>
                                
                                <div class="p-3 border border-gray-100 rounded-lg flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-amber-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-user-injured text-amber-500"></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium">Emily Thompson</div>
                                            <div class="text-xs text-gray-500">Lab Results Review</div>
                                        </div>
                                    </div>
                                    <div class="text-sm text-gray-600">03:45 PM</div>
                                </div>
                            </div>
                        </div>
                        
                       <!-- Quick Actions -->
                       <div class="bg-white p-4 rounded-lg shadow-sm">
                        <h2 class="text-lg font-semibold text-gray-800 mb-3">Quick Actions</h2>
                        <div class="grid grid-cols-2 gap-2">
                            <button class="p-3 bg-blue-50 text-blue-600 rounded-lg text-sm flex items-center justify-center">
                                <i class="fas fa-user-plus mr-2"></i> New Patient
                            </button>
                            <button class="p-3 bg-green-50 text-green-600 rounded-lg text-sm flex items-center justify-center">
                                <i class="fas fa-calendar-plus mr-2"></i> New Appointment
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