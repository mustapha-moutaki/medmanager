@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-6 w-full bg-gray-100">
    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-gradient-to-r from-purple-500 to-pink-500 p-6">
            <h1 class="text-3xl font-bold text-white flex items-center">
                <i class="fas fa-user-staff mr-3"></i>
                Edit staff Profile
            </h1>
            <p class="text-purple-200 mt-1">Update the details for <span class="font-semibold">{{ $staff->user->first_name }} {{ $staff->user->last_name }}</span></p>
        </div>

        <form action="{{ route('staff.update', $staff->id) }}" method="POST" enctype="multipart/form-data" class="p-8">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- SECTION 1: Personal Information -->
                <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6">
                    <div class="flex items-center mb-4">
                        <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                            <i class="fas fa-id-card text-blue-600 text-xl"></i>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-800">
                            Personal Information
                        </h2>
                    </div>
                    <div class="border-b border-gray-200 mb-4"></div>
                    
                    <!-- Profile Image -->
                    <div class="flex flex-col items-center mb-6">
                        <div class="h-32 w-32 rounded-full bg-gray-200 mb-4 overflow-hidden border-2 border-gray-300 flex items-center justify-center">
                            @if($staff->profile_photo)
                                <img src="{{ asset('storage/'.$staff->user->profile_photo) }}" alt="{{ $staff->user->first_name }}" class="h-full w-full object-cover">
                            @else
                                <i class="fas fa-user text-gray-500 text-5xl"></i>
                            @endif
                        </div>
                        <label for="profile_image" class="px-4 py-2 bg-purple-50 text-purple-700 rounded-md cursor-pointer hover:bg-purple-100 transition">
                            <i class="fas fa-camera mr-2"></i> Change Photo
                            <input type="file" name="profile_photo" id="profile_image" class="hidden">
                        </label>
                        @error('profile_photo')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- First Name -->
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-user mr-2 text-blue-500"></i>First Name
                            </label>
                            <input type="text" name="first_name" id="first_name" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" value="{{ $staff->user->first_name }}" required>
                            @error('first_name')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Last Name -->
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-user mr-2 text-blue-500"></i>Last Name
                            </label>
                            <input type="text" name="last_name" id="last_name" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" value="{{ $staff->user->last_name }}" required>
                            @error('last_name')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-envelope mr-2 text-blue-500"></i>Email Address
                            </label>
                            <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" value="{{ $staff->user->email }}" required>
                            @error('email')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Phone -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-phone-alt mr-2 text-blue-500"></i>Phone Number
                            </label>
                            <input type="tel" name="phone" id="phone" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" value="{{ $staff->user->phone }}" placeholder="Ex: 06 XXX-XXXXX">
                            @error('phone')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- CIN -->
                        <div>
                            <label for="CIN" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-id-card mr-2 text-blue-500"></i>CIN
                            </label>
                            <input type="text" name="CIN" id="CIN" placeholder="CIN" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" value="{{ $staff->user->CIN }}">
                            @error('CIN')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Date of Birth -->
                        <div>
                            <label for="dob" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-birthday-cake mr-2 text-blue-500"></i>Date of Birth
                            </label>
                            <input type="date" name="birth_date" id="dob" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" value="{{ $staff->user->birth_date }}">
                            @error('birth_date')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Gender -->
                        <div>
                            <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-venus-mars mr-2 text-blue-500"></i>Gender
                            </label>
                            <select name="gender" id="gender" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                <option value="male" {{ $staff->user->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $staff->user->gender == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Age Input -->
                        <div>
                            <label for="age" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-birthday-cake mr-2 text-blue-500"></i>Age (optional)
                            </label>
                            <input type="number" name="age" id="age" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" value="{{ $staff->user->age }}">
                            @error('age')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="mt-6">
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-home mr-2 text-blue-500"></i>Address
                        </label>
                        <input type="text" id="address" name="address" placeholder="Enter your full address" 
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" value="{{ $staff->user->address }}">
                        @error('address')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <!-- SECTION 2: Professional Information -->
                <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6">
                    <div class="flex items-center mb-4">
                        <div class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center mr-3">
                            <i class="fas fa-stethoscope text-green-600 text-xl"></i>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-800">
                            Professional Information
                        </h2>
                    </div>
                    <div class="border-b border-gray-200 mb-4"></div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Role -->
                        <div>
                            <label for="role" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-user-tag mr-2 text-green-500"></i>Role
                            </label>
                            <select name="role" id="role" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                                <option value="Nurse" {{ $staff->role == 'nurse' ? 'selected' : '' }}>nurse</option>
                                <option value="Receptionist" {{ $staff->role == 'Receptionist' ? 'selected' : '' }}>Receptionist</option>
                                <option value="Technician" {{ $staff->role == 'Technician' ? 'selected' : '' }}>Technician</option>
                                <option value="Other" {{ $staff->role == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('role')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Specialization -->
                        <div>
                            <label for="specialization" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-briefcase-medical mr-2 text-green-500"></i>Specialization
                            </label>
                            <select name="specialist" id="specialization" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                                <option value="Cardiology" {{ $staff->specialist == 'Cardiology' ? 'selected' : '' }}>Cardiology</option>
                                <option value="Emergency" {{ $staff->specialist == 'Emergency' ? 'selected' : '' }}>Emergency</option>
                                <option value="Pediatric" {{ $staff->specialist == 'Pediatric' ? 'selected' : '' }}>Pediatric</option>
                                <option value="Icu" {{ $staff->specialist == 'Icu' ? 'selected' : '' }}>Intensive Care</option>
                                <option value="Oncology" {{ $staff->specialist == 'Oncology' ? 'selected' : '' }}>Oncology</option>
                                <option value="Maternity" {{ $staff->specialist == 'Maternity' ? 'selected' : '' }}>Maternity</option>
                                <option value="Surgical" {{ $staff->specialist == 'Surgical' ? 'selected' : '' }}>Surgical</option>
                                <option value="Psychiatric" {{ $staff->specialist == 'Psychiatric' ? 'selected' : '' }}>Psychiatric</option>
                                <option value="General" {{ $staff->specialist == 'General' ? 'selected' : '' }}>General</option>
                            </select>
                            @error('specialist')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Experience -->
                        <div>
                            <label for="experience_years" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-history mr-2 text-green-500"></i>Years of Experience
                            </label>
                            <input type="number" name="years_of_experience" id="experience_years" min="0" max="50" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" value="{{ $staff->years_of_experience }}" required>
                            @error('years_of_experience')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- License Number -->
                        <div>
                            <label for="license_number" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-id-badge mr-2 text-green-500"></i>License Number
                            </label>
                            <input type="text" name="license_number" id="license_number" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" value="{{ $staff->license_number }}" required>
                            @error('license_number')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- License Expiry -->
                        <div>
                            <label for="license_expiry" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-calendar-check mr-2 text-green-500"></i>License Expiry Date
                            </label>
                            <input type="date" name="license_expiry_date" id="license_expiry" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" value="{{ $staff->license_expiry_date }}">
                            @error('license_expiry_date')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Certifications -->
                        <div class="md:col-span-2">
                            <label for="certifications" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-certificate mr-2 text-green-500"></i>Certification
                            </label>
                            <input type="text" name="certificate" id="certifications" placeholder="Ex: BLS, ACLS, PALS." class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" value="{{ $staff->certificate }}">
                            @error('certificate')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <!-- SECTION 3: Employment Information -->
                <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6">
                    <div class="flex items-center mb-4">
                        <div class="h-10 w-10 rounded-full bg-amber-100 flex items-center justify-center mr-3">
                            <i class="fas fa-hospital-alt text-amber-600 text-xl"></i>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-800">
                            Employment Information
                        </h2>
                    </div>
                    <div class="border-b border-gray-200 mb-4"></div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Employment Status -->
                        <div>
                            <label for="employment_status" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-user-clock mr-2 text-amber-500"></i>Employment Status
                            </label>
                            <select name="employment_status" id="employment_status" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                                <option value="full_time" {{ $staff->employment_status == 'full_time' ? 'selected' : '' }}>Full Time</option>
                                <option value="part_time" {{ $staff->employment_status == 'part_time' ? 'selected' : '' }}>Part Time</option>
                                <option value="contract" {{ $staff->employment_status == 'contract' ? 'selected' : '' }}>Contract</option>
                            </select>
                            @error('employment_status')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        
                
                        
                        <!-- Shift Preference -->
                        <div>
                            <label for="shift_preference" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-clock mr-2 text-amber-500"></i>Shift Preference
                            </label>
                            <select name="shift_preference" id="shift_preference" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                                <option value="Morning" {{ $staff->shift_preference == 'Morning' ? 'selected' : '' }}>Morning</option>
                                <option value="Evening" {{ $staff->shift_preference == 'Evening' ? 'selected' : '' }}>Evening</option>
                                <option value="Night" {{ $staff->shift_preference == 'Night' ? 'selected' : '' }}>Night</option>
                                <option value="Rotating" {{ $staff->shift_preference == 'Rotating' ? 'selected' : '' }}>Rotating</option>
                            </select>
                            @error('shift_preference')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <!-- SECTION 4: Additional Information -->
                <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6">
                    <div class="flex items-center mb-4">
                        <div class="h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center mr-3">
                            <i class="fas fa-clipboard-list text-purple-600 text-xl"></i>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-800">
                            Additional Information
                        </h2>
                    </div>
                    <div class="border-b border-gray-200 mb-4"></div>
                    
                    <!-- Biography with character counter -->
                    <div class="mb-4">
                        <label for="bio" class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-address-card mr-2 text-purple-500"></i>Professional Biography
                        </label>
                        <div class="relative">
                            <textarea name="bio" id="bio" rows="4" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" 
                            placeholder="Describe your professional background, expertise and achievements...">{{ $staff->user->bio }}</textarea>
                            <div class="text-xs text-gray-500 mt-1 text-right">Max 500 characters</div>
                        </div>
                        @error('bio')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Emergency Contact -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="emergency_contact_phone" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-phone mr-2 text-purple-500"></i>Emergency Contact Phone
                            </label>
                            <input type="tel" name="emergency_contact_phone" id="emergency_contact_phone" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="Ex: 06 XXX-XXXXX" value="{{ $staff->emergency_contact_phone }}">
                            @error('emergency_contact_phone')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mt-6" role="alert">
                    <strong class="font-bold">There were errors with your submission!</strong>
                    <ul class="list-disc ml-5 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Actions -->
            <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('stuffs') }}" class="px-6 py-3 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-md transition duration-200 flex items-center">
                    <i class="fas fa-times mr-2"></i> Cancel
                </a>
                <button type="submit" class="px-8 py-3 bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white rounded-md shadow-md transition duration-200 flex items-center">
                    <i class="fas fa-save mr-2"></i> Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection