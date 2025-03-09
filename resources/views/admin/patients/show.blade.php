@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold mb-8 text-center text-blue-600">Patient Details</h2>
    
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="p-4 border border-gray-300 rounded-lg bg-blue-50">
                <h3 class="text-xl font-semibold mb-2 text-blue-600">Patient Information</h3>
                <p class="mt-1"><strong>Name:</strong> <span class="text-gray-700">John Doe</span></p>
                <p class="mt-1"><strong>Age:</strong> <span class="text-gray-700">30</span></p>
                <p class="mt-1"><strong>Gender:</strong> <i class="fas fa-male text-blue-500"></i> <span class="text-gray-700">Male</span></p>
                <p class="mt-1"><strong>Type:</strong> <span class="text-gray-700">Inpatient</span></p>
                <p class="mt-1"><strong>Medical Condition:</strong> <span class="text-gray-700">Hypertension</span></p>
            </div>
            <div class="p-4 border border-gray-300 rounded-lg bg-green-50">
                <h3 class="text-xl font-semibold mb-2 text-green-600">Contact Information</h3>
                <p class="mt-1"><strong>Contact Number:</strong> <span class="text-gray-700">(123) 456-7890</span></p>
            </div>
        </div>

        <hr class="my-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="p-4 border border-gray-300 rounded-lg bg-yellow-50">
                <h3 class="text-xl font-semibold mb-2 text-yellow-600">Assigned Doctor</h3>
                <p class="mt-1"><strong>Name:</strong> <span class="text-gray-700">Dr. Sarah Johnson</span></p>
                <p class="mt-1"><strong>Specialty:</strong> <span class="text-gray-700">Cardiology</span></p>
            </div>
            <div class="p-4 border border-gray-300 rounded-lg bg-pink-50">
                <h3 class="text-xl font-semibold mb-2 text-pink-600">Assigned Nurse</h3>
                <p class="mt-1"><strong>Name:</strong> <span class="text-gray-700">Nurse Emily Smith</span></p>
                <p class="mt-1"><strong>Contact:</strong> <span class="text-gray-700">(987) 654-3210</span></p>
            </div>
        </div>

        <div class="text-center mt-6">
            <a href="" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition">
                <i class="fas fa-edit mr-2"></i> Edit Patient Details
            </a>
        </div>
    </div>
</div>
@endsection