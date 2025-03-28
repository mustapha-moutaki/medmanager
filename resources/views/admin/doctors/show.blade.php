@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-blue-800 p-3 text-center">
            <h2 class="text-lg font-bold text-white">Doctor Profile</h2>
        </div>

        <div class="p-6 text-center">
            <img src="/images/doctor1.jpg" alt="Dr. {{ $doctor->user->first_name }} {{ $doctor->user->last_name }}" class="w-32 h-32 rounded-full mx-auto object-cover border-2 border-blue-500 mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Dr. {{ $doctor->user->first_name }} {{ $doctor->user->last_name }}</h3>
        </div>

        <div class="p-6">
            <!-- Personal Info Section -->
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-user text-blue-600 mr-2"></i>
                    Personal Info
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                    <div class="bg-blue-50 p-4 rounded-lg">
                        <h4 class="text-xs text-gray-500">First Name</h4>
                        <p class="text-sm font-bold text-gray-800">{{ $doctor->user->first_name }}</p>
                    </div>
                    <div class="bg-blue-50 p-4 rounded-lg">
                        <h4 class="text-xs text-gray-500">Last Name</h4>
                        <p class="text-sm font-bold text-gray-800">{{ $doctor->user->last_name }}</p>
                    </div>
                    <div class="bg-blue-50 p-4 rounded-lg">
                        <h4 class="text-xs text-gray-500">Birthdate</h4>
                        {{ $doctor->user->birth_date ? \Carbon\Carbon::parse($doctor->user->birth_date)->format('d/m/Y') : 'birath dath is not available ' }}
                    </div>
                    <div class="bg-blue-50 p-4 rounded-lg">
                        <h4 class="text-xs text-gray-500">Gender</h4>
                        <p class="text-sm font-bold text-gray-800">{{ $doctor->user->gender }}</p>
                    </div>
                </div>
            </div>

            <!-- Contact Info Section -->
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-phone-alt text-blue-600 mr-2"></i>
                    Contact Info
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                    <div class="bg-blue-50 p-4 rounded-lg">
                        <h4 class="text-xs text-gray-500">Phone Number</h4>
                        <p class="text-sm font-bold text-gray-800">{{ $doctor->user->phone }}</p>
                    </div>
                    <div class="bg-blue-50 p-4 rounded-lg">
                        <h4 class="text-xs text-gray-500">Email</h4>
                        <p class="text-sm font-bold text-gray-800">{{ $doctor->user->email }}</p>
                    </div>
                </div>
            </div>

            <!-- Additional Info Section -->
            <div class="mt-6">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                    Additional Info
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                    <div class="bg-blue-50 p-4 rounded-lg">
                        <h4 class="text-xs text-gray-500">Specialty</h4>
                        <p class="text-sm font-bold text-gray-800">{{ $doctor->specialist }}</p>
                    </div>
                    <div class="bg-blue-50 p-4 rounded-lg">
                        <h4 class="text-xs text-gray-500">Years of Experience</h4>
                        <p class="text-sm font-bold text-gray-800">{{ $doctor->yearsOfExperience }}</p>
                    </div>
                    <div class="bg-blue-50 p-4 rounded-lg">
                        <h4 class="text-xs text-gray-500">Patients Treated</h4>
                        <p class="text-sm font-bold text-gray-800">5,420+</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
