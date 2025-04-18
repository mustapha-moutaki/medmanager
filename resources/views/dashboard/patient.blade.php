@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @php
        // because the patient can have many recordes we use last to get the last recorde every time
        $firstVital = optional(optional($patient)->vitals)->last();
    @endphp

    <!-- Chills -->
    <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
        <i class="fas fa-snowflake text-blue-500 text-4xl"></i>
        <div class="ml-4">
            <h2 class="text-lg font-semibold">Chills</h2>
            <p class="text-2xl font-bold">{{ optional($firstVital)->chills === 'yes' ? 'true' : (optional($firstVital)->chills === 'no' ? 'false' : 'not available') }}</p>
            <p class="text-gray-500">Safe: False</p>
        </div>
    </div>

    <!-- Diastole BP -->
    <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
        <i class="fas fa-heartbeat text-green-500 text-4xl"></i>
        <div class="ml-4">
            <h2 class="text-lg font-semibold">Diastole BP</h2>
            <p class="text-2xl font-bold">{{ optional($firstVital)->diastole_bp ?? 'not available' }}</p>
            <p class="text-gray-500">Safe [60 - 80 mm Hg]</p>
        </div>
    </div>

    <!-- Systole BP -->
    <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
        <i class="fas fa-heart text-red-500 text-4xl"></i>
        <div class="ml-4">
            <h2 class="text-lg font-semibold">Systole BP</h2>
            <p class="text-2xl font-bold">{{ optional($firstVital)->systole_bp ?? 'not available' }}</p>
            <p class="text-gray-500">Safe [90 - 120 mm Hg]</p>
        </div>
    </div>

    <!-- Heart Rate -->
    <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
        <i class="fas fa-heart text-red-500 text-4xl"></i>
        <div class="ml-4">
            <h2 class="text-lg font-semibold">Heart Rate</h2>
            <p class="text-2xl font-bold">{{ optional($firstVital)->heart_rate ?? 'not available' }}</p>
            <p class="text-gray-500">Safe [60 to 100 beats]</p>
        </div>
    </div>

    <!-- Respiration Rate -->
    <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
        <i class="fas fa-lungs text-green-500 text-4xl"></i>
        <div class="ml-4">
            <h2 class="text-lg font-semibold">Respiration Rate</h2>
            <p class="text-2xl font-bold">{{ optional($firstVital)->respiration_rate ?? 'not available' }}</p>
            <p class="text-gray-500">Safe [12 to 16 breaths/min]</p>
        </div>
    </div>

    <!-- SpO2 -->
    <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
        <i class="fas fa-tint text-blue-500 text-4xl"></i>
        <div class="ml-4">
            <h2 class="text-lg font-semibold">SpO2</h2>
            <p class="text-2xl font-bold">{{ optional($firstVital)->spo2 ?? 'not available' }}</p>
            <p class="text-gray-500">Range [95% or higher]</p>
        </div>
    </div>

    <!-- Blood Group -->
    <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
        <i class="fas fa-tint text-red-500 text-4xl"></i>
        <div class="ml-4">
            <h2 class="text-lg font-semibold">Blood Group</h2>
            <p class="text-2xl font-bold">{{ optional($firstVital)->blood_group ?? 'not available' }}</p>
        </div>
    </div>

    <!-- Temperature -->
    <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
        <i class="fas fa-thermometer-half text-orange-500 text-4xl"></i>
        <div class="ml-4">
            <h2 class="text-lg font-semibold">Temperature</h2>
            <p class="text-2xl font-bold">{{ optional($firstVital)->temperature ?? 'not available' }}</p>
            <p class="text-gray-500">Range [36°F to 37.2°F]</p>
        </div>
    </div>

    <!-- Ambulation -->
    <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
        <i class="fas fa-walking text-gray-500 text-4xl"></i>
        <div class="ml-4">
            <h2 class="text-lg font-semibold">Ambulation</h2>
            <p class="text-2xl font-bold">{{ optional($firstVital)->ambulation === 'yes' ? 'true' : (optional($firstVital)->ambulation === 'no' ? 'false' : 'not available') }}</p>
            <p class="text-gray-500">Values possible: True/False</p>
        </div>
    </div>

    <!-- Fever History -->
    <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
        <i class="fas fa-file-medical text-yellow-500 text-4xl"></i>
        <div class="ml-4">
            <h2 class="text-lg font-semibold">Fever History</h2>
            <p class="text-2xl font-bold">{{ optional($firstVital)->fever_history ?? 'not available' }}</p>
            <p class="text-gray-500">Values possible: Yes/No/Never</p>
        </div>
    </div>

    <!-- BMI -->
    <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
        <i class="fas fa-weight text-purple-500 text-4xl"></i>
        <div class="ml-4">
            <h2 class="text-lg font-semibold">BMI</h2>
            <p class="text-2xl font-bold">{{ optional($firstVital)->bmi ?? 'not available' }}</p>
            <p class="text-gray-500">Range [18.5 to 24.9]</p>
        </div>
    </div>

    <!-- FiO2 -->
    <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
        <i class="fas fa-lungs text-green-500 text-4xl"></i>
        <div class="ml-4">
            <h2 class="text-lg font-semibold">FiO2</h2>
            <p class="text-2xl font-bold">{{ optional($firstVital)->fio2 ?? 'not available' }}</p>
            <p class="text-gray-500">Range [50 to 100]</p>
        </div>
    </div>
</div>

<div class="treatment dashboard p-6 bg-gray-100 max-content">
    <div class="treat-list box bg-white shadow-lg rounded-lg p-4">
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200 shadow-md">
                <thead>
                    <tr class="bg-blue-800 text-white text-left">
                        <th class="p-3 border border-gray-300">Date</th>
                        <th class="p-3 border border-gray-300">Time</th>
                        <th class="p-3 border border-gray-300">Doctor</th>
                        <th class="p-3 border border-gray-300">Status</th> <!-- New Status Column -->
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @if($patient && $patient->appointments->isNotEmpty()) <!-- Check if $patient exists and has appointments -->
                        @foreach ($patient->appointments as $appointment)
                            <tr class="border border-gray-200 hover:bg-gray-100">
                                <td class="p-3 border border-gray-300">{{ optional($appointment->datetime)->format('Y-m-d') ?? '' }}</td>
                                <td class="p-3 border border-gray-300">{{ optional($appointment->datetime)->format('h:i A') ?? '' }}</td>
                                <td class="p-3 border border-gray-300">{{ optional($appointment->doctor)->name ?? '' }}</td>
                                <td class="p-3 border border-gray-300">
                                    <span class="text-yellow-600 font-semibold">Pending</span>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="p-3 text-center text-gray-500">No appointments found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
    <div class="mb-2 border-solid border-blue-300 rounded border shadow-sm w-full">
        <div class="bg-blue-800 text-white px-2 py-3 border-solid border-blue-900 border-b">
            <h2 class="text-lg font-semibold">Appointment Form</h2>
        </div>
        <div class="p-3">
        <a href="{{ route('reserveappointment', ['id' => auth()->id()]) }}" class="text-blue-600 hover:underline">Take Appointment</a>
        </div>
    </div>
</div>

@endsection
