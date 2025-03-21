@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-full mx-auto"> <!-- Changed max-w-lg to max-w-full -->
        <div class="bg-white shadow-lg rounded-lg">
            <div class="bg-indigo-600 text-white rounded-t-lg p-4">
                <h4 class="mb-0 text-xl font-semibold">Appointment Details</h4>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-calendar-alt text-indigo-600 mr-2"></i>
                        <div>
                            <span class="text-sm text-gray-500">Date</span>
                            <h5 class="text-lg font-medium text-gray-800">Mar 17, 2025</h5>
                        </div>
                    </div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-clock text-indigo-600 mr-2"></i>
                        <div>
                            <span class="text-sm text-gray-500">Time</span>
                            <h5 class="text-lg font-medium text-gray-800">10:00 AM - 10:30 AM</h5>
                        </div>
                    </div>
                </div>
                
                <hr class="my-4">
                
                <div class="flex items-center mb-4">
                    <i class="fas fa-user-md text-indigo-600 mr-2"></i>
                    <div>
                        <span class="text-sm text-gray-500">Doctor</span>
                        <h5 class="text-lg font-medium text-gray-800">Dr. Sarah Johnson</h5>
                        <p class="text-sm text-gray-500">Cardiology</p>
                    </div>
                </div>
                
                <div class="flex items-center mb-4">
                    <i class="fas fa-hospital text-indigo-600 mr-2"></i>
                    <div>
                        <span class="text-sm text-gray-500">Location</span>
                        <h5 class="text-lg font-medium text-gray-800">City General Hospital</h5>
                        <p class="text-sm text-gray-500">Room 101</p>
                    </div>
                </div>
                
                <div class="mb-4">
                    <span class="text-sm text-gray-500">Reason for Visit</span>
                    <div class="border rounded p-3 mt-1 bg-gray-100">
                        <p class="mb-0">Routine check-up and follow-up on blood pressure.</p>
                    </div>
                </div>
                
                <div class="mb-4">
                    <span class="text-sm text-gray-500">Additional Notes</span>
                    <div class="border rounded p-3 mt-1 bg-gray-100">
                        <p class="mb-0">Patient should arrive 15 minutes early for paperwork.</p>
                    </div>
                </div>
                
                <div class="flex items-center mb-4">
                    <i class="fas fa-clipboard-list text-indigo-600 mr-2"></i>
                    <div>
                        <span class="text-sm text-gray-500">Status</span>
                        <h5 class="text-lg font-medium text-gray-800">
                            <span class="inline-block px-2 py-1 rounded-full text-white bg-green-500">
                                Confirmed
                            </span>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 rounded-b-lg p-4">
                <div class="flex justify-between">
                    <button class="btn btn-outline-secondary text-indigo-600 border-indigo-600 hover:bg-indigo-600 hover:text-white transition duration-150">
                        <i class="fas fa-edit mr-1"></i> Reschedule
                    </button>
                    <button class="btn btn-danger text-white bg-red-600 hover:bg-red-700 transition duration-150">
                        <i class="fas fa-times mr-1"></i> Cancel Appointment
                    </button>
                </div>
            </div>
        </div>
        
        <div class="mt-3 text-right">
            <a href="" class="btn btn-primary text-white bg-indigo-600 hover:bg-indigo-700 transition duration-150">
                <i class="fas fa-arrow-left mr-1"></i> Back to All Appointments
            </a>
        </div>
    </div>
</div>
@endsection