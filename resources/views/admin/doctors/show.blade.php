@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-blue-800 p-3 text-center">
            <h2 class="text-lg font-bold text-white">Doctor Profile</h2>
        </div>
  <div class="p-6 text-center">
        <img src="{{ $doctor->user->profile_photo ? asset('storage/' . $doctor->user->profile_photo) : 'https://i.pinimg.com/736x/e3/5d/19/e35d191a414645f5ef13de6026ba3f80.jpg' }}" 
             alt="Dr. {{ $doctor->user->first_name }} {{ $doctor->user->last_name }}" 
             class="w-32 h-32 rounded-full mx-auto object-cover border-2 border-blue-500 mb-4">
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
                    <p class="text-sm font-bold text-gray-800">
                        {{ $doctor->user->birth_date ? \Carbon\Carbon::parse($doctor->user->birth_date)->format('d/m/Y') : 'Birthdate not available' }}
                    </p>
                </div>
                <div class="bg-blue-50 p-4 rounded-lg">
                    <h4 class="text-xs text-gray-500">Gender</h4>
                    <p class="text-sm font-bold text-gray-800">{{ $doctor->user->gender }}</p>
                </div>
                <div class="bg-blue-50 p-4 rounded-lg">
                    <h4 class="text-xs text-gray-500">CIN</h4>
                    <p class="text-sm font-bold text-gray-800">{{ $doctor->user->CIN ?? 'Not provided' }}</p>
                </div>
            </div>
        </div>

        <!-- Address Info Section -->
        <div class="mb-4">
            <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                <i class="fas fa-map-marker-alt text-blue-600 mr-2"></i>
                Address Information
            </h3>
            <div class="bg-blue-50 p-4 rounded-lg mt-2">
                <h4 class="text-xs text-gray-500">Full Address</h4>
                <p class="text-sm font-bold text-gray-800">
                    {{ $doctor->user->address ?? 'Address not provided' }}
                </p>
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
                <div class="bg-blue-50 p-4 rounded-lg">
                    <h4 class="text-xs text-gray-500">Emergency Contact Phone</h4>
                    <p class="text-sm font-bold text-gray-800">{{ $doctor->emergency_contact_phone ?? 'Not provided' }}</p>
                </div>
            </div>
        </div>

        <!-- Bio Section -->
        <div class="mb-4">
            <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                Professional Bio
            </h3>
            <div class="bg-blue-50 p-4 rounded-lg mt-2">
                <h4 class="text-xs text-gray-500">Biography</h4>
                <p class="text-sm text-gray-800">
                    {{ $doctor->user->bio ?? 'No biography provided' }}
                </p>
            </div>
        </div>

        <!-- Additional Info Section -->
        <div class="mt-6">
            <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                <i class="fas fa-graduation-cap text-blue-600 mr-2"></i>
                Professional Details
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
                    <p class="text-sm font-bold text-gray-800">457+</p>
                    <!-- doctor patient_count  + -->
                </div>
                <div class="bg-blue-50 p-4 rounded-lg">
                    <h4 class="text-xs text-gray-500">Certificates</h4>
                    <p class="text-sm font-bold text-gray-800">
                        {{ $doctor->certificate ?? 'No certificates uploaded' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection