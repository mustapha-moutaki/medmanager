@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Page Header with Add Nurse Button -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Nursing Staff</h1>
        <a href="{{route('stuff.create')}}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg shadow flex items-center transition duration-300">
            <i class="fas fa-user-plus mr-2"></i>
            Add New Nurse
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Nurse Card 1 - Redesigned -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition duration-300">
            <div class="bg-gradient-to-r from-blue-500 to-blue-700 p-4">
                <div class="flex justify-between items-start">
                    <div class="flex items-center">
                        <div class="bg-white p-2 rounded-full mr-3">
                            <i class="fas fa-user-nurse text-blue-600 text-lg"></i>
                        </div>
                        <h2 class="text-lg font-bold text-white">Nurse Alice</h2>
                    </div>
                    <span class="bg-blue-200 text-blue-800 text-xs font-bold px-2 py-1 rounded-full">Cardiology</span>
                </div>
            </div>
            
            <div class="p-5">
                <div class="flex items-center mb-4">
                    <img src="/images/nurse1.jpg" alt="Nurse Alice" class="w-20 h-20 rounded-full object-cover border-2 border-blue-500 mr-4">
                    <div>
                        <div class="flex items-center mb-1">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <p class="text-sm text-gray-600">5 Years Experience</p>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-users text-blue-500 mr-1"></i>
                            <p class="text-sm text-gray-600">1,200+ Patients</p>
                        </div>
                    </div>
                </div>
                
                <div class="border-t border-gray-200 pt-4">
                    <p class="text-sm text-gray-600 mb-4">Specialized in cardiac care and patient monitoring with excellent emergency response skills.</p>
                    
                    <div class="flex justify-between items-center">
                        <div class="flex space-x-2">
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">ICU</span>
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Critical Care</span>
                        </div>
                        
                        <div class="flex space-x-3">
                            <a href="{{route('stuff.show')}}" class="text-blue-500 hover:text-blue-700 transition duration-200">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{route('stuff.edit')}}" class="text-blue-500 hover:text-blue-700 transition duration-200">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="text-red-500 hover:text-red-700 transition duration-200">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nurse Card 2 - Redesigned -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition duration-300">
            <div class="bg-gradient-to-r from-blue-500 to-blue-700 p-4">
                <div class="flex justify-between items-start">
                    <div class="flex items-center">
                        <div class="bg-white p-2 rounded-full mr-3">
                            <i class="fas fa-user-nurse text-blue-600 text-lg"></i>
                        </div>
                        <h2 class="text-lg font-bold text-white">Nurse Bob</h2>
                    </div>
                    <span class="bg-blue-200 text-blue-800 text-xs font-bold px-2 py-1 rounded-full">Emergency</span>
                </div>
            </div>
            
            <div class="p-5">
                <div class="flex items-center mb-4">
                    <img src="/images/nurse2.jpg" alt="Nurse Bob" class="w-20 h-20 rounded-full object-cover border-2 border-blue-500 mr-4">
                    <div>
                        <div class="flex items-center mb-1">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <p class="text-sm text-gray-600">8 Years Experience</p>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-users text-blue-500 mr-1"></i>
                            <p class="text-sm text-gray-600">2,500+ Patients</p>
                        </div>
                    </div>
                </div>
                
                <div class="border-t border-gray-200 pt-4">
                    <p class="text-sm text-gray-600 mb-4">Expert in emergency medicine with trauma care certification and advanced life support training.</p>
                    
                    <div class="flex justify-between items-center">
                        <div class="flex space-x-2">
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">ER</span>
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Trauma</span>
                        </div>
                        
                        <div class="flex space-x-3">
                            <a href="" class="text-blue-500 hover:text-blue-700 transition duration-200">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="" class="text-blue-500 hover:text-blue-700 transition duration-200">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="text-red-500 hover:text-red-700 transition duration-200">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nurse Card 3 - Redesigned -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition duration-300">
            <div class="bg-gradient-to-r from-blue-500 to-blue-700 p-4">
                <div class="flex justify-between items-start">
                    <div class="flex items-center">
                        <div class="bg-white p-2 rounded-full mr-3">
                            <i class="fas fa-user-nurse text-blue-600 text-lg"></i>
                        </div>
                        <h2 class="text-lg font-bold text-white">Nurse Carol</h2>
                    </div>
                    <span class="bg-blue-200 text-blue-800 text-xs font-bold px-2 py-1 rounded-full">Pediatric</span>
                </div>
            </div>
            
            <div class="p-5">
                <div class="flex items-center mb-4">
                    <img src="/images/nurse3.jpg" alt="Nurse Carol" class="w-20 h-20 rounded-full object-cover border-2 border-blue-500 mr-4">
                    <div>
                        <div class="flex items-center mb-1">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <p class="text-sm text-gray-600">6 Years Experience</p>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-users text-blue-500 mr-1"></i>
                            <p class="text-sm text-gray-600">1,800+ Patients</p>
                        </div>
                    </div>
                </div>
                
                <div class="border-t border-gray-200 pt-4">
                    <p class="text-sm text-gray-600 mb-4">Specialized in pediatric care with expertise in child development and family-centered nursing.</p>
                    
                    <div class="flex justify-between items-center">
                        <div class="flex space-x-2">
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">NICU</span>
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Pediatrics</span>
                        </div>
                        
                        <div class="flex space-x-3">
                            <a href="" class="text-blue-500 hover:text-blue-700 transition duration-200">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="" class="text-blue-500 hover:text-blue-700 transition duration-200">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="text-red-500 hover:text-red-700 transition duration-200">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection