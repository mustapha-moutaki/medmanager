@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-6 w-full bg-gray-100">
    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-gradient-to-r from-purple-500 to-pink-500 p-6">
            <h1 class="text-3xl font-bold text-white flex items-center">
                <i class="fas fa-user-nurse mr-3"></i>
                @if($staff ->role =='Nurse')
                         Nurse {{$staff ->user->first_name}}
                         @elseif($staff ->role =='Receptionist')
                         Reception {{$staff->user->first_name}}
                         @elseif ($staff ->role =='Technician')
                         Technician {{$staff->user->first_name}}
                         @else
                         Other {{$staff->first_name}}
                        @endif Profile
            </h1>
            <p class="text-purple-200 mt-1">Details for <span class="font-semibold"> @if($staff ->role =='Nurse')
                         Nurse {{$staff ->user->first_name}}
                         @elseif($staff ->role =='Receptionist')
                         Reception {{$staff->user->first_name}}
                         @elseif ($staff ->role =='Technician')
                         Technician {{$staff->user->first_name}}
                         @else
                         Other {{$staff->first_name}}
                        @endif {{$staff->user->first_name}}</span></p>
        </div>

        <div class="p-8">
            <div class="grid grid-cols-1 gap-6">
                <!-- SECTION 1: Personal Information -->
                <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Personal Information</h2>
                    
                   <!-- Profile Image -->
                    <div class="flex justify-center mb-6">
                        <div class="w-40 h-40 rounded-full bg-gray-200 overflow-hidden border-2 border-blue-500 flex items-center justify-center">
                            <img src="
                                @if($staff->role == 'Nurse' && $staff->user->gender == 'male')
                                    https://i.pinimg.com/736x/8a/41/58/8a415815ff533071380d5990b4d04339.jpg
                                @elseif($staff->role == 'Nurse')
                                    https://i.pinimg.com/736x/cd/b3/97/cdb397bf1f0fb0e879e1db2379534379.jpg
                                @elseif($staff->role == 'Receptionist')
                                    https://i.pinimg.com/736x/dc/67/e8/dc67e889275e50a3f8b4348b291db2dc.jpg
                                @elseif($staff->role == 'Technician')
                                    https://i.pinimg.com/736x/a4/20/b4/a420b4500cbc95c274df0a059be7093f.jpg
                                @else
                                    /images/default.jpg
                                @endif
                            " alt="Staff Image" class="w-full h-full object-contain rounded-full">
                        </div>
                    </div>



                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- First Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-gray-100">{{$staff->user->first_name}}</div>
                        </div>
                        
                        <!-- Last Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-gray-100">{{$staff->user->last_name}}</div>
                        </div> 

                        <!-- gender -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-gray-100">{{$staff->user->gender}}</div>
                        </div> 
                        
                        <!-- birth date -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Birth date</label>
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-gray-100">{{\Carbon\Carbon::parse($staff->user->birth_date)->format('d/M/Y') }}</div>
                        </div>
                        
                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-gray-100">{{$staff->user->email}}</div>
                        </div>
                        
                        <!-- Phone -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-gray-100">{{$staff->user->phone}}</div>
                        </div>

                        <!-- address -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-gray-100">{{$staff->user->address}}</div>
                        </div>

                        <!-- CIN -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">CIN</label>
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-gray-100">{{$staff->user->CIN}}</div>
                        </div>
                    </div>  

                    <!-- bio -->
                    <div>
                            <label class="block text-sm font-medium text-gray-700 mt-1">Biography</label>
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-gray-100">{{$staff->user->bio}}</div>
                        </div>
                    
                </div>

                 

                <!-- SECTION 2: Professional Information -->
                <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Professional Information</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Specialization -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Specialization</label>
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-gray-100">{{$staff->specialist}}</div>
                        </div>
                        
                        <!-- Experience -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Years of Experience</label>
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-gray-100">{{$staff->years_of_experience}}</div>
                        </div>
                        
                        <!-- License Number -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">License Number</label>
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-gray-100">{{$staff->license_number}}
                            </div>
                        </div>
                        
                        <!-- License Expiry -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">License Expiry Date</label>
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-gray-100">{{\Carbon\Carbon::parse($staff->license_expiry_date)->format('d/M/Y') }}</div>
                        </div>

                         <!-- certificat -->
                         <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Certificate</label>
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-gray-100">{{$staff->certificate ? $staff->certificate : 'not available'}}</div>
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
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-gray-100">{{$staff->employment_status}}</div>
                        </div>
                        
                        
                        <!-- Join Date -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Join Date</label>
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-gray-100">{{\Carbon\Carbon::parse($staff->created_at)->format('d/M/Y')}}</div>
                        </div>
                        
                        <!-- Shift Preference -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Shift Preference</label>
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-gray-100">{{$staff->shift_preference}}</div>
                        </div>

                         <!-- emergency contact -->
                         <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Emergency Contact Phone</label>
                            <div class="border border-gray-300 rounded-md px-3 py-2 bg-red-100">{{$staff->emergency_contact_phone}}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back Button -->
            <div class="flex justify-end mt-6">
                <a href="{{route('stuffs')}}" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-md transition duration-200">
                    Back
                </a>
            </div>
        </div>
    </div>
</div>
@endsection