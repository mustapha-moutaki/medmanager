@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Add Doctor Button -->
    <div class="mb-6 flex justify-end">
        <a href="{{route('create.doctor')}}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg shadow flex items-center transition duration-300">
            <i class="fas fa-user-plus mr-2"></i>
            Add New Doctor
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        <!-- Doctor Card 1 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-blue-800 p-3 flex items-center">
                <i class="fas fa-user-md text-white text-xl mr-2"></i>
                <h2 class="text-sm font-bold text-white">Specialist Profile</h2>
            </div>
            
            <div class="p-4 text-center">
                <div class="mb-3">
                    <img src="/images/doctor1.jpg" alt="Dr. Emily Rodriguez" class="w-24 h-24 rounded-full mx-auto object-cover border-2 border-blue-500">
                </div>
                
                <h3 class="text-lg font-semibold text-gray-800 mb-1">Dr. Emily Rodriguez</h3>
                
                <div class="flex justify-center items-center mb-3">
                    <i class="fas fa-stethoscope text-blue-500 mr-1"></i>
                    <p class="text-sm text-gray-600">Cardiology Specialist</p>
                    <i class="fas fa-brain text-green-500 mr-1"></i>
                    <i class="fas fa-baby text-pink-500 mr-1"></i>
                </div>
                
                <div class="grid grid-cols-2 gap-2 mt-3">
                    <div class="bg-blue-50 p-2 rounded-lg">
                        <h4 class="text-xs text-gray-500">Experience</h4>
                        <p class="text-sm font-bold text-blue-800">12 Years</p>
                    </div>
                    
                    <div class="bg-blue-50 p-2 rounded-lg">
                        <h4 class="text-xs text-gray-500">Patients</h4>
                        <p class="text-sm font-bold text-blue-800">5,420+</p>
                    </div>
                </div>
                
                <div class="mt-3 flex justify-center space-x-3">
                    <a href="{{route('doctor.show')}}" class="text-blue-500 hover:text-blue-700">
                        <i class="fas fa-eye text-lg"></i>
                    </a>
                    <a href="{{route('doctor.edit')}}" class="text-green-500 hover:text-green-700">
                        <i class="fas fa-edit text-lg"></i>
                    </a>
                    <a href="#" class="text-red-500 hover:text-red-700">
                        <i class="fas fa-trash text-lg"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection