@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-4xl font-extrabold text-teal-600">Add Patient Vitals</h2>
    </div>

    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Vital Signs Form -->
        <div class="lg:w-2/3">
            <form id="vitals-form" action="{{ route('patient.vitals.store', $patient->id) }}" method="POST" class="bg-white shadow-xl rounded-xl p-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                @csrf
                <input type="hidden" name="patient_id" value="{{ $patient->id }}">

                <!-- Alerts for Out-of-Range Values -->
                <div id="alerts" class="col-span-2 mb-2 hidden">
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg" role="alert">
                        <p class="font-bold">Warning: Some vital signs are out of safe range!</p>
                        <p id="alert-message">Please review the highlighted fields below.</p>
                    </div>
                </div>

               <!-- Chills -->
<div class="mb-6">
    <label for="chills" class="block text-lg text-gray-700 font-semibold mb-2">
        <i class="fas fa-snowflake text-blue-500 mr-2"></i>
        <span>Experiencing Chills</span>
    </label>
    <select id="chills" name="chills" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500">
        <option value="no" {{ old('chills') == 'no' ? 'selected' : '' }}>No</option>
        <option value="yes" {{ old('chills') == 'yes' ? 'selected' : '' }}>Yes</option>
    </select>
</div>

                <!-- Blood Pressure - Diastolic -->
                <div class="relative">
                    <label for="diastole_bp" class="block text-lg font-medium text-gray-700 flex items-center space-x-3">
                        <i class="fas fa-tachometer-alt text-teal-500 text-2xl"></i>
                        <span>Diastolic BP</span>
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="number" id="diastole_bp" name="diastole_bp" value="{{ old('diastole_bp', 75) }}" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500"
                            data-min="60" data-max="80">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <span class="text-gray-500">mm Hg</span>
                        </div>
                    </div>
                    <div class="flex justify-between mt-1">
                        <p class="text-sm text-gray-500">Safe Range: 60 - 80 mm Hg</p>
                        <span id="diastole_bp_status" class="text-sm font-medium"></span>
                    </div>
                </div>
                
                <!-- Blood Pressure - Systolic -->
                <div class="relative">
                    <label for="systole_bp" class="block text-lg font-medium text-gray-700 flex items-center space-x-3">
                        <i class="fas fa-tachometer-alt text-teal-500 text-2xl"></i>
                        <span>Systolic BP</span>
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="number" id="systole_bp" name="systole_bp" value="{{ old('systole_bp', 91) }}" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500"
                            data-min="90" data-max="120">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <span class="text-gray-500">mm Hg</span>
                        </div>
                    </div>
                    <div class="flex justify-between mt-1">
                        <p class="text-sm text-gray-500">Safe Range: 90 - 120 mm Hg</p>
                        <span id="systole_bp_status" class="text-sm font-medium"></span>
                    </div>
                </div>

                <!-- Heart Rate -->
                <div class="relative">
                    <label for="heart_rate" class="block text-lg font-medium text-gray-700 flex items-center space-x-3">
                        <i class="fas fa-heartbeat text-red-500 text-2xl"></i>
                        <span>Heart Rate</span>
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="number" id="heart_rate" name="heart_rate" value="{{ old('heart_rate', 69) }}" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500"
                            data-min="60" data-max="100">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <span class="text-gray-500">bpm</span>
                        </div>
                    </div>
                    <div class="flex justify-between mt-1">
                        <p class="text-sm text-gray-500">Safe Range: 60 - 100 beats/min</p>
                        <span id="heart_rate_status" class="text-sm font-medium"></span>
                    </div>
                </div>

                <!-- Respiration Rate -->
                <div class="relative">
                    <label for="respiration_rate" class="block text-lg font-medium text-gray-700 flex items-center space-x-3">
                        <i class="fas fa-lungs text-green-500 text-2xl"></i>
                        <span>Respiration Rate</span>
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="number" id="respiration_rate" name="respiration_rate" value="{{ old('respiration_rate', 14) }}" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                            data-min="12" data-max="16">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <span class="text-gray-500">br/min</span>
                        </div>
                    </div>
                    <div class="flex justify-between mt-1">
                        <p class="text-sm text-gray-500">Safe Range: 12 - 16 breaths/min</p>
                        <span id="respiration_rate_status" class="text-sm font-medium"></span>
                    </div>
                </div>

                <!-- SpO2 -->
                <div class="relative">
                    <label for="spo2" class="block text-lg font-medium text-gray-700 flex items-center space-x-3">
                        <i class="fas fa-plus-square text-green-500 text-2xl"></i>
                        <span>SpO2</span>
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="number" id="spo2" name="spo2" value="{{ old('spo2', 98) }}" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                            data-min="95" data-max="100">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <span class="text-gray-500">%</span>
                        </div>
                    </div>
                    <div class="flex justify-between mt-1">
                        <p class="text-sm text-gray-500">Safe Range: 95% or higher</p>
                        <span id="spo2_status" class="text-sm font-medium"></span>
                    </div>
                </div>

                <!-- Blood Group -->
                <div>
                    <label for="blood_group" class="block text-lg font-medium text-gray-700 flex items-center space-x-3">
                        <i class="fas fa-tint text-red-600 text-2xl"></i>
                        <span>Blood Group</span>
                    </label>
                    <select id="blood_group" name="blood_group" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500">
                        <option value="A+" {{ old('blood_group') == 'A+' ? 'selected' : '' }}>A+</option>
                        <option value="A-" {{ old('blood_group') == 'A-' ? 'selected' : '' }}>A-</option>
                        <option value="B+" {{ old('blood_group') == 'B+' ? 'selected' : '' }}>B+</option>
                        <option value="B-" {{ old('blood_group') == 'B-' ? 'selected' : '' }}>B-</option>
                        <option value="AB+" {{ old('blood_group') == 'AB+' ? 'selected' : '' }}>AB+</option>
                        <option value="AB-" {{ old('blood_group') == 'AB-' ? 'selected' : '' }}>AB-</option>
                        <option value="O+" {{ old('blood_group') == 'O+' ? 'selected' : '' }}>O+</option>
                        <option value="O-" {{ old('blood_group') == 'O-' ? 'selected' : '' }}>O-</option>
                    </select>
                    <p class="text-sm text-gray-500 mt-1">Select the patient's blood group</p>
                </div>

                <!-- Temperature (Now in Celsius) -->
                <div class="relative">
                    <label for="temperature" class="block text-lg font-medium text-gray-700 flex items-center space-x-3">
                        <i class="fas fa-thermometer-half text-orange-500 text-2xl"></i>
                        <span>Temperature</span>
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="number" step="0.1" id="temperature" name="temperature" value="{{ old('temperature', 35) }}" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500"
                            data-min="36" data-max="37.5">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <span class="text-gray-500">°C</span>
                        </div>
                    </div>
                    <div class="flex justify-between mt-1">
                        <p class="text-sm text-gray-500">Safe Range: 36°C - 37.5°C</p>
                        <span id="temperature_status" class="text-sm font-medium"></span>
                    </div>
                </div>

                <!-- Ambulation -->
<div class="mb-6">
    <label for="ambulation" class="block text-lg text-gray-700 font-semibold mb-2">
        <i class="fas fa-walking text-teal-500 mr-2"></i>
        <span>Able to Ambulate</span>
    </label>
    <select id="ambulation" name="ambulation" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500">
        <option value="no" {{ old('ambulation') == 'no' ? 'selected' : '' }}>No</option>
        <option value="yes" {{ old('ambulation') == 'yes' ? 'selected' : '' }}>Yes</option>
    </select>
</div>

                <!-- Fever History -->
                <div>
                    <label for="fever_history" class="block text-lg font-medium text-gray-700 flex items-center space-x-3">
                        <i class="fas fa-thermometer-three-quarters text-red-600 text-2xl"></i>
                        <span>Fever History</span>
                    </label>
                    <select id="fever_history" name="fever_history" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500">
                        <option value="never" {{ old('fever_history') == 'never' ? 'selected' : '' }}>Never</option>
                        <option value="yes" {{ old('fever_history') == 'yes' ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ old('fever_history') == 'no' ? 'selected' : '' }}>No</option>
                    </select>
                    <p class="text-sm text-gray-500 mt-1">Select patient's fever history</p>
                </div>

                <!-- BMI -->
                <div class="relative">
                    <label for="bmi" class="block text-lg font-medium text-gray-700 flex items-center space-x-3">
                        <i class="fas fa-weight text-blue-500 text-2xl"></i>
                        <span>BMI</span>
                    </label>
                    <input type="number" step="0.1" id="bmi" name="bmi" value="{{ old('bmi', 18.5) }}" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        data-min="18.5" data-max="24.9">
                    <div class="flex justify-between mt-1">
                        <p class="text-sm text-gray-500">Safe Range: 18.5 - 24.9</p>
                        <span id="bmi_status" class="text-sm font-medium"></span>
                    </div>
                </div>

                <!-- FiO2 -->
                <div class="relative">
                    <label for="fio2" class="block text-lg font-medium text-gray-700 flex items-center space-x-3">
                        <i class="fas fa-lungs text-green-600 text-2xl"></i>
                        <span>FiO2</span>
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="number" id="fio2" name="fio2" value="{{ old('fio2', 66) }}" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                            data-min="21" data-max="100">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <span class="text-gray-500">%</span>
                        </div>
                    </div>
                    <div class="flex justify-between mt-1">
                        <p class="text-sm text-gray-500">Safe Range: 21% - 100%</p>
                        <span id="fio2_status" class="text-sm font-medium"></span>
                    </div>
                </div>

              <!-- Submit Button -->
<div class="flex space-x-4 mt-8 col-span-2">
    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl transition duration-200 flex items-center">
        <i class="fas fa-save mr-2"></i> Save Vitals
    </button>
    <a href="" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-6 py-3 rounded-xl transition duration-200 flex items-center">
        <i class="fas fa-times mr-2"></i> Cancel
    </a>
</div>

            </form>

            @if ($errors->any())
            <div class="p-4 mt-6 mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg">
                <p class="font-bold">Please correct the following errors:</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>

        <!-- Patient Body Image with Interactive Markers - Now beside the form -->
        <div class="lg:w-1/3">
            <div class="bg-white shadow-xl rounded-xl p-6 sticky top-6">
                <h3 class="text-xl font-bold text-gray-700 mb-4">Patient Body Reference</h3>
                <div class="relative">
                    <img src="https://i.pinimg.com/736x/77/b0/5f/77b05fb72cea11bb5ccf2df4b7986c31.jpg" alt="Patient Body" class="w-full rounded-lg">
                    
                    <!-- Vital Sign Labels -->
                    <div class="absolute top-16 left-1/3 transform -translate-x-1/2 transition-all hover:scale-110">
                        <span class="bg-white px-3 py-2 text-sm font-medium text-gray-700 rounded-lg shadow hover:bg-red-100 cursor-pointer">
                            <i class="fas fa-heartbeat text-red-500 mr-1"></i> Heart
                        </span>
                    </div>
                    <div class="absolute top-32 left-1/3 transform -translate-x-1/2 transition-all hover:scale-110">
                        <span class="bg-white px-3 py-2 text-sm font-medium text-gray-700 rounded-lg shadow hover:bg-teal-100 cursor-pointer">
                            <i class="fas fa-tachometer-alt text-teal-500 mr-1"></i> BP
                        </span>
                    </div>
                    <div class="absolute top-48 left-1/3 transform -translate-x-1/2 transition-all hover:scale-110">
                        <span class="bg-white px-3 py-2 text-sm font-medium text-gray-700 rounded-lg shadow hover:bg-orange-100 cursor-pointer">
                            <i class="fas fa-thermometer-half text-orange-500 mr-1"></i> Temp
                        </span>
                    </div>
                    <div class="absolute top-64 left-1/3 transform -translate-x-1/2 transition-all hover:scale-110">
                        <span class="bg-white px-3 py-2 text-sm font-medium text-gray-700 rounded-lg shadow hover:bg-green-100 cursor-pointer">
                            <i class="fas fa-plus-square text-green-500 mr-1"></i> SpO2
                        </span>
                    </div>
                </div>
                
                <!-- Vital Signs Summary -->
                <div class="mt-6">
                    <h4 class="font-semibold text-lg mb-2">Vital Signs Reference</h4>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span>Temperature:</span>
                            <span>36°C - 37.5°C</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Heart Rate:</span>
                            <span>60 - 100 bpm</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Blood Pressure:</span>
                            <span>90/60 - 120/80 mmHg</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Respiration:</span>
                            <span>12 - 16 br/min</span>
                        </div>
                        <div class="flex justify-between">
                            <span>SpO2:</span>
                            <span>≥ 95%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // validations
    const fieldsToValidate = [
        'diastole_bp', 'systole_bp', 'heart_rate', 'respiration_rate', 
        'spo2', 'temperature', 'bmi', 'fio2'
    ];
    
    // this function to check all value are in the acceptable range
    function checkRange(value, min, max) {
        value = parseFloat(value);
        min = parseFloat(min);
        max = parseFloat(max);
        
        if (value < min) return 'low';
        if (value > max) return 'high';
        return 'normal';
    }
    
    // this function just to highlight fields without validation
    function highlightField(field) {
        const input = document.getElementById(field);
        if (!input) return;
        
        const value = input.value;
        const min = input.dataset.min;
        const max = input.dataset.max;
        const statusEl = document.getElementById(field + '_status');
        
        if (!statusEl) return;
        
        const status = checkRange(value, min, max);
        
        input.classList.remove('border-red-500', 'border-yellow-500', 'border-green-500');
        statusEl.classList.remove('text-red-500', 'text-yellow-500', 'text-green-500');
        
        if (status === 'low') {
            input.classList.add('border-red-500');
            statusEl.classList.add('text-red-500');
            statusEl.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Low';
        } else if (status === 'high') {
            input.classList.add('border-yellow-500');
            statusEl.classList.add('text-yellow-500');
            statusEl.innerHTML = '<i class="fas fa-exclamation-circle"></i> High';
        } else {
            input.classList.add('border-green-500');
            statusEl.classList.add('text-green-500');
            statusEl.innerHTML = '<i class="fas fa-check-circle"></i> Normal';
        }
    }
    
    fieldsToValidate.forEach(field => {
        const input = document.getElementById(field);
        if (input) {
            input.addEventListener('input', function() {
                updateAllFields();
            });
        }
    });
    
    function updateAllFields() {
        let outOfRangeFields = [];
        
        fieldsToValidate.forEach(field => {
            highlightField(field);
            
            const input = document.getElementById(field);
            if (!input) return;
            
            const value = input.value;
            const min = input.dataset.min;
            const max = input.dataset.max;
            const status = checkRange(value, min, max);
            
            if (status !== 'normal') {
                const label = document.querySelector(`label[for="${field}"]`).innerText.trim();
                outOfRangeFields.push(label);
            }
        });
        
        // Show or hide info message
        const alertsDiv = document.getElementById('alerts');
        const alertMessage = document.getElementById('alert-message');
        
        if (outOfRangeFields.length > 0) {
            alertsDiv.classList.remove('hidden');
            alertMessage.innerText = `Note: Some values are outside typical ranges: ${outOfRangeFields.join(', ')}`;
            // Change the alert style to be informational rather than an error
            const alertBox = alertsDiv.querySelector('div');
            alertBox.classList.remove('bg-red-100', 'border-red-500', 'text-red-700');
            alertBox.classList.add('bg-blue-100', 'border-blue-500', 'text-blue-700');
            // Update the heading to be informational
            const alertHeading = alertBox.querySelector('p.font-bold');
            alertHeading.textContent = 'Note: Some vital signs are outside typical ranges';
        } else {
            alertsDiv.classList.add('hidden');
        }
    }
    
    updateAllFields();
    
    // No form validation on submit - just submit the form as is
    document.getElementById('vitals-form').addEventListener('submit', function(e) {
        // No validation or prevention of submission
    });
});
</script>
@endsection