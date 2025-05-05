@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-6 w-full bg-gray-100">
    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-gradient-to-r from-purple-500 to-pink-500 p-6">
            <h1 class="text-3xl font-bold text-white flex items-center">
                <i class="fas fa-user-nurse mr-3"></i>
                Nurse Profile
            </h1>
            <p class="text-purple-200 mt-1">Details for <span class="font-semibold">Nurse Name</span></p>
        </div>

        <div class="p-8">
            <div class="grid grid-cols-1 gap-6">
                <!-- SECTION 1: Personal Information -->
                <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Personal Information</h2>
                    
                    <!-- Profile Image -->
                    <div class="flex flex-col items-center mb-6">
                        <div class="h-40 w-40 rounded-full bg-gray-200 mb-4 overflow-hidden border-2 border-gray-300 flex items-center justify-center">
                            <i class="fas fa-user text-gray-500 text-5xl"></i>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- First Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-gray-100">John</div>
                        </div>
                        
                        <!-- Last Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-gray-100">Doe</div>
                        </div>
                        
                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-gray-100">john.doe@example.com</div>
                        </div>
                        
                        <!-- Phone -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-gray-100">(123) 456-7890</div>
                        </div>
                    </div>
                </div>

                <!-- SECTION 2: Professional Information -->
                <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Professional Information</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Specialization -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Specialization</label>
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-gray-100">Cardiology</div>
                        </div>
                        
                        <!-- Experience -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Years of Experience</label>
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-gray-100">5</div>
                        </div>
                        
                        <!-- License Number -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">License Number</label>
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-gray-100">ABC123456</div>
                        </div>
                        
                        <!-- License Expiry -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">License Expiry Date</label>
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-gray-100">12/31/2025</div>
                        </div>
                    </div>
                </div>

                <!-- SECTION 3: Employment Information -->
                <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Employment Information</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Employment Status -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Employment Status</label>
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-gray-100">Full Time</div>
                        </div>
                        
                        <!-- Department -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Department</label>
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-gray-100">Emergency</div>
                        </div>
                        
                        <!-- Join Date -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Join Date</label>
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-gray-100">01/01/2020</div>
                        </div>
                        
                        <!-- Shift Preference -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Shift Preference</label>
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-gray-100">Morning</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back Button -->
            <div class="flex justify-end mt-6">
                <a href="" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-md transition duration-200">
                    Back
                </a>
            </div>
        </div>
    </div>
</div>
@endsection