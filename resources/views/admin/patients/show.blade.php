@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold mb-8 text-center text-blue-600">Patient Details</h2>

</div>


<div class="flex-1 flex flex-col overflow-hidden bg-gradient-to-r from-blue-500 to-blue-300 p-2 rounded-lg">
<!-- <div class="flex-1 flex flex-col overflow-hidden bg-white shadow-lg border border-gray-200 p-4 rounded-lg"> -->

    <!-- Patient Profile -->
    <main class="flex-1 overflow-y-auto bg-white rounded-lg shadow-sm p-6">
        <div class="flex space-x-4 mb-6">
            <div class="flex items-center space-x-3 bg-white rounded-lg p-4 shadow-sm flex-1">
                <div class="rounded-full overflow-hidden w-12 h-12">
                <img src="{{ $patient->user->profile_photo ? asset('storage/' . $patient->user->profile_photo) : 'https://i.pinimg.com/736x/1d/ec/e2/1dece2c8357bdd7cee3b15036344faf5.jpg' }}" alt="{{ $patient->user->first_name }}" class="w-full h-full object-cover">
                 </div>
                <div>
                    <h2 class="text-lg font-semibold">{{$patient->user->first_name . ' '. $patient->user->last_name}}</h2>
                    <p class="text-gray-500 text-sm">{{ $patient->patient_type}}</p>
                </div>
            </div>
            <button class="bg-white p-3 rounded-lg shadow-sm">
                <i class="fas fa-video text-blue-600"></i>
            </button>
            <button class="bg-white p-3 rounded-lg shadow-sm">
                <i class="fas fa-phone-alt text-blue-600"></i>
            </button>
        </div>
        
        <div class="grid grid-cols-2 gap-6">
            <!-- Patient Info -->
            <div class="bg-white rounded-lg shadow-sm p-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-gray-500 text-sm">Date of Birth</p>
                        <p class="font-medium">{{ \Carbon\Carbon::parse($patient->user->birth_date)->format('d/M/Y') }}</p>

                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Address</p>
                        <p class="font-medium">{{ $patient->user->address}}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Marital Status</p>
                        <p class="font-medium">{{$patient->marital_status}}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Insurance</p>
                        <p class="font-medium">{{$patient->insurance}}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">phone Number</p>
                        <p class="font-medium">{{$patient->user->phone}}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Extra Phone Number</p>
                        <p class="font-medium">{{$patient->extra_phone_number}}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Gender</p>
                        <p class="font-medium">{{$patient->user->gender}}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Registered On</p>
                        {{ \Carbon\Carbon::parse($patient->registration_date)->format('M d, Y \a\t g:iA') }}
                         <!-- 
                        here we use back slash to ignore the word at letters and then g it's use for 12H format and i for minutes and A for day or night (am/pm)
                         -->
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">CNSS</p>
                        <p class="font-medium">{{$patient->CNSS}}</p>
                    </div>
                </div>
            </div>
            
            <!-- Documents -->
            <!-- <div class="bg-white rounded-lg shadow-sm p-4">
                -->
                
                <!-- Documents Section -->
<div class="bg-white rounded-lg shadow-sm p-4">
    <div class="flex justify-between items-center mb-4">
        <h3 class="font-semibold">Documents</h3>
        <button class="flex items-center space-x-1 text-blue-600 text-sm">
            <i class="fas fa-plus"></i>
            <span>Add files</span>
        </button>
    </div>

    <div class="space-y-3">
        @forelse ($patient->documents as $document)
            <div class="flex justify-between items-center border-b pb-3">
                <div class="flex items-center space-x-2">
                    <i class="far fa-file-pdf text-gray-600"></i>
                    <span>{{ $document->file_name }}</span>
                </div>
                <div class="flex items-center space-x-2">
                    <!-- Download Button -->
                    <a href="{{ asset('storage/' . $document->file_path) }}" 
                       class="text-gray-500" 
                       download>
                        <i class="fas fa-download"></i>
                    </a>
                    <!-- More Options -->
                    <button class="text-gray-500">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                </div>
            </div>
        @empty
            <p class="text-gray-500 text-sm">No documents available.</p>
        @endforelse
    </div>
</div>

         
        </div>
        
        <!-- Medical Records -->
        <div class="mt-6 bg-white rounded-lg shadow-sm p-4">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-semibold">Medical Records</h3>
                <button class="flex items-center space-x-1 text-blue-600 text-sm">
                    <i class="fas fa-plus"></i>
                    <span>Add record</span>
                </button>
            </div>
            
            <div class="space-y-4">
                <div class="flex justify-between items-center border-b pb-4">
                    <div class="grid grid-cols-5 gap-4 flex-1">
                        <div>
                            <p class="text-gray-500 text-sm">Date</p>
                            <p class="font-medium">Mar 01, 2023 test</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Symptoms</p>
                            <p class="font-medium">Fatigue, Thirst test</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Specialist</p>
                            <p class="font-medium">Dr. John Smith test</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="text-gray-500">
                            <i class="fas fa-download"></i>
                        </button>
                        <button class="text-gray-500">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="mt-4 text-center">
                <button class="text-gray-500">See all</button>
            </div>
        </div>
        
        <!-- Appointments -->
        <div class="mt-6 bg-white rounded-lg shadow-sm p-4">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-semibold">Upcoming Appointments</h3>
            </div>
            
            <div class="space-y-4">
                <div class="flex items-start space-x-4 border-b pb-4">
                    <div class="flex flex-col items-center justify-center bg-indigo-100 rounded-lg px-2 py-3">
                        <span class="text-indigo-800 font-semibold">15 test</span>
                        <span class="text-xs text-indigo-600">Tue test</span>
                    </div>
                    
                    <div class="grid grid-cols-4 gap-4 flex-1">
                        <div>
                            <p class="text-gray-500 text-sm">Date</p>
                            <p class="font-medium">Mar 15, 2023 test</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Symptoms</p>
                            <p class="font-medium">Regular Checkup test</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Category</p>
                            <p class="font-medium">Routine test</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Doctor</p>
                            <p class="font-medium">test</p>

                        </div>
                    </div>
                    
                    <div class="flex flex-col items-end space-y-2">
                        <span class="px-3 py-1 bg-green-100 text-green-800 text-xs rounded-full">Confirmed</span>
                        <button class="text-gray-500">
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Assigned Staff -->
        <div class="mt-6 bg-white rounded-lg shadow-sm p-4">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-semibold">Assigned Healthcare Staff</h3>
            </div>
            
            <div class="space-y-4">
                <div class="flex justify-between items-center border-b pb-4">
                    <div class="grid grid-cols-5 gap-4 flex-1">
                        <div>
                            <p class="text-gray-500 text-sm">Doctor</p>
                            <p class="font-medium">
                        @if($patient->doctor && $patient->doctor->user)
                            Dr. {{$patient->doctor->user->first_name . ' ' . $patient->doctor->user->last_name}}
                        @else
                            <span class="text-red-500">Doctor not assigned</span>
                        @endif
                    </p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Specialty</p>
                            <p class="font-medium">
                            @if($patient->doctor && $patient->doctor->specialist)
                                {{$patient->doctor->specialist}}
                            @else
                                <span class="text-red-500">Specialist not assigned</span>
                            @endif
                        </p>

                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Nurse</p>
                            <p class="font-medium">
                            @if($patient->nurse && $patient->nurse->user)
                                {{$patient->nurse->user->first_name . ' ' . $patient->nurse->user->last_name}}
                            @else
                                <span class="text-red-500">Nurse not assigned</span>
                            @endif
                        </p>


                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Contact</p>
                            <p class="font-medium">
                            @if($patient->nurse && $patient->nurse->user)
                                {{$patient->nurse->user->phone}}
                            @else
                                <span class="text-red-500">available phone number</span>
                            @endif
                        </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>


<div class="flex-1 flex flex-col overflow-hidden bg-blue-300 p-2 rounded-lg mt-14">
        <!-- Patient Profile -->
        <main class="flex-1 overflow-y-auto bg-white rounded-lg shadow-sm p-6">
            <!-- Existing Patient Info Sections -->
            <div class="flex space-x-4 mb-6">
                <!-- Patient Info Content Here -->
            </div>

            <!-- Human Body Section -->
            <div class="mt-6 bg-white rounded-lg shadow-lg p-6 border border-gray-100">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">Human Body Overview</h3>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 bg-blue-100 text-blue-600 rounded-md hover:bg-blue-200 transition duration-200 text-sm flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            View All
                        </button>
                        <button class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-200 text-sm flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Note
                        </button>
                    </div>
                </div>

                <div class="flex">
                    <!-- Body Visualization -->
                    <div class="relative flex justify-center items-center w-1/3">
                        <img src="https://i.pinimg.com/736x/42/ca/88/42ca88190994b01ef27ba335ed9c39a4.jpg" alt="Human Body" class="max-h-96">
                        
                        <!-- Interactive Markers -->
                        <div class="absolute" style="top: 10%; left: 50%;">
                            <div class="relative group">
                                <div class="w-6 h-6 bg-red-500 rounded-full flex items-center justify-center cursor-pointer border-2 border-white shadow-md transform -translate-x-1/2 hover:scale-110 transition-transform duration-200">
                                    <span class="text-white font-bold">!</span>
                                </div>
                                <div class="absolute w-48 bg-white p-2 rounded-md shadow-lg z-10 hidden group-hover:block -translate-x-1/2 left-1/2 mt-2">
                                    <div class="font-semibold text-red-500">Head</div>
                                    <p class="text-sm text-gray-600">Patient reports recurring migraines and occasional dizziness.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="absolute" style="top: 20%; left: 50%;">
                            <div class="relative group">
                                <div class="w-6 h-6 bg-yellow-500 rounded-full flex items-center justify-center cursor-pointer border-2 border-white shadow-md transform -translate-x-1/2 hover:scale-110 transition-transform duration-200">
                                    <span class="text-white font-bold">!</span>
                                </div>
                                <div class="absolute w-48 bg-white p-2 rounded-md shadow-lg z-10 hidden group-hover:block -translate-x-1/2 left-1/2 mt-2">
                                    <div class="font-semibold text-yellow-500">Mouth</div>
                                    <p class="text-sm text-gray-600">Dental checkup needed. Last visit: 6 months ago.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="absolute" style="top: 32%; left: 50%;">
                            <div class="relative group">
                                <div class="w-6 h-6 bg-red-500 rounded-full flex items-center justify-center cursor-pointer border-2 border-white shadow-md transform -translate-x-1/2 hover:scale-110 transition-transform duration-200">
                                    <span class="text-white font-bold">!</span>
                                </div>
                                <div class="absolute w-48 bg-white p-2 rounded-md shadow-lg z-10 hidden group-hover:block -translate-x-1/2 left-1/2 mt-2">
                                    <div class="font-semibold text-red-500">Heart</div>
                                    <p class="text-sm text-gray-600">Slightly elevated blood pressure (140/90). Monitoring required.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="absolute" style="top: 42%; left: 40%;">
                            <div class="relative group">
                                <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center cursor-pointer border-2 border-white shadow-md transform -translate-x-1/2 hover:scale-110 transition-transform duration-200">
                                    <span class="text-white font-bold">✓</span>
                                </div>
                                <div class="absolute w-48 bg-white p-2 rounded-md shadow-lg z-10 hidden group-hover:block -translate-x-1/2 left-1/2 mt-2">
                                    <div class="font-semibold text-green-500">Liver</div>
                                    <p class="text-sm text-gray-600">Function tests normal. Last checked: 3 months ago.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="absolute" style="top: 50%; left: 50%;">
                            <div class="relative group">
                                <div class="w-6 h-6 bg-yellow-500 rounded-full flex items-center justify-center cursor-pointer border-2 border-white shadow-md transform -translate-x-1/2 hover:scale-110 transition-transform duration-200">
                                    <span class="text-white font-bold">!</span>
                                </div>
                                <div class="absolute w-48 bg-white p-2 rounded-md shadow-lg z-10 hidden group-hover:block -translate-x-1/2 left-1/2 mt-2">
                                    <div class="font-semibold text-yellow-500">Stomach</div>
                                    <p class="text-sm text-gray-600">Mild indigestion complaints. Diet adjustments recommended.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Body Status List -->
                    <div class="w-2/3 pl-8">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="font-medium text-gray-700 mb-3">Health Status Summary</h4>
                            
                            <div class="space-y-3">
                                <div class="flex items-center p-3 bg-white rounded-md shadow-sm border-l-4 border-red-500">
                                    <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h5 class="font-medium">Head - Migraine Issues</h5>
                                        <p class="text-sm text-gray-600">Persistent migraines occurring 3-4 times per week.</p>
                                    </div>
                                    <div class="ml-auto">
                                        <button class="text-blue-500 hover:text-blue-700">View Details</button>
                                    </div>
                                </div>
                                
                                <div class="flex items-center p-3 bg-white rounded-md shadow-sm border-l-4 border-red-500">
                                    <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h5 class="font-medium">Heart - Blood Pressure</h5>
                                        <p class="text-sm text-gray-600">140/90 measured on last two visits.</p>
                                    </div>
                                    <div class="ml-auto">
                                        <button class="text-blue-500 hover:text-blue-700">View Details</button>
                                    </div>
                                </div>
                                
                                <div class="flex items-center p-3 bg-white rounded-md shadow-sm border-l-4 border-yellow-500">
                                    <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h5 class="font-medium">Stomach - Digestion</h5>
                                        <p class="text-sm text-gray-600">Occasional discomfort after meals.</p>
                                    </div>
                                    <div class="ml-auto">
                                        <button class="text-blue-500 hover:text-blue-700">View Details</button>
                                    </div>
                                </div>
                                
                                <div class="flex items-center p-3 bg-white rounded-md shadow-sm border-l-4 border-green-500">
                                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h5 class="font-medium">Liver - Function</h5>
                                        <p class="text-sm text-gray-600">All tests within normal range.</p>
                                    </div>
                                    <div class="ml-auto">
                                        <button class="text-blue-500 hover:text-blue-700">View Details</button>
                                    </div>
                                </div>

                                <div class="flex items-center p-3 bg-white rounded-md shadow-sm border-l-4 border-yellow-500">
                                    <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h5 class="font-medium">Mouth - Dental</h5>
                                        <p class="text-sm text-gray-600">Routine checkup recommended. Last visit: 6 months ago.</p>
                                    </div>
                                    <div class="ml-auto">
                                        <button class="text-blue-500 hover:text-blue-700">View Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Other Sections (Documents, Medical Records, Appointments) -->
        </main>
    </div>
@endsection
