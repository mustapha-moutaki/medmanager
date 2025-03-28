@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-6 w-full bg-gray-50">
    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-5">
            <h1 class="text-2xl font-bold text-white flex items-center">
                <i class="fas fa-user-nurse mr-3"></i>
                Nurse Profile Registration
            </h1>
            <p class="text-indigo-100 mt-1">Complete the form below to register a new nursing professional</p>
        </div>

        <form action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- SECTION 1: Personal Information -->
                <div class="bg-white rounded-lg shadow-md border border-gray-100 p-6 hover:shadow-lg transition-shadow">
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
                        <div class="h-32 w-32 rounded-full bg-gray-100 mb-4 flex items-center justify-center border-2 border-dashed border-gray-300">
                            <i class="fas fa-user text-gray-400 text-4xl"></i>
                        </div>
                        <label for="profile_image" class="px-4 py-2 bg-blue-50 text-blue-700 rounded-md cursor-pointer hover:bg-blue-100 transition">
                            <i class="fas fa-camera mr-2"></i> Upload Photo
                            <input type="file" name="profile_image" id="profile_image" class="hidden">
                        </label>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- First Name -->
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-user mr-2 text-blue-500"></i>First Name
                            </label>
                            <input type="text" name="first_name" id="first_name" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        </div>
                        
                        <!-- Last Name -->
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-user mr-2 text-blue-500"></i>Last Name
                            </label>
                            <input type="text" name="last_name" id="last_name" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        </div>
                        
                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-envelope mr-2 text-blue-500"></i>Email Address
                            </label>
                            <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        </div>
                        
                        <!-- Phone -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-phone-alt mr-2 text-blue-500"></i>Phone Number
                            </label>
                            <input type="tel" name="phone" id="phone" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        
                        <!-- Date of Birth -->
                        <div>
                            <label for="dob" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-birthday-cake mr-2 text-blue-500"></i>Date of Birth
                            </label>
                            <input type="date" name="birth_date" id="dob" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        
                        <!-- Gender -->
                        <div>
                            <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-venus-mars mr-2 text-blue-500"></i>Gender
                            </label>
                            <select name="gender" id="gender" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <!-- SECTION 2: Professional Information -->
                <div class="bg-white rounded-lg shadow-md border border-gray-100 p-6 hover:shadow-lg transition-shadow">
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
                                <option value="">Select Role</option>
                                <option value="nurse">Nurse</option>
                                <option value="receptionist">Receptionist</option>
                                <option value="technician">Technician</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <!-- Specialization -->
                        <div>
                            <label for="specialization" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-briefcase-medical mr-2 text-green-500"></i>Specialization
                            </label>
                            <select name="specialization" id="specialization" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                                <option value="">Select Specialization</option>
                                <option value="cardiology">Cardiology</option>
                                <option value="emergency">Emergency</option>
                                <option value="pediatric">Pediatric</option>
                                <option value="icu">Intensive Care</option>
                                <option value="oncology">Oncology</option>
                                <option value="maternity">Maternity</option>
                                <option value="surgical">Surgical</option>
                                <option value="psychiatric">Psychiatric</option>
                                <option value="general">General</option>
                            </select>
                        </div>
                        
                        <!-- Experience -->
                        <div>
                            <label for="experience_years" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-history mr-2 text-green-500"></i>Years of Experience
                            </label>
                            <input type="number" name="experience_years" id="experience_years" min="0" max="50" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                        </div>
                        
                        <!-- License Number -->
                        <div>
                            <label for="license_number" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-id-badge mr-2 text-green-500"></i>License Number
                            </label>
                            <input type="text" name="license_number" id="license_number" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                        </div>
                        
                        <!-- License Expiry -->
                        <div>
                            <label for="license_expiry" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-calendar-check mr-2 text-green-500"></i>License Expiry Date
                            </label>
                            <input type="date" name="license_expiry" id="license_expiry" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>
                        
                        <!-- Certifications -->
                        <div class="md:col-span-2">
                            <label for="certifications" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-certificate mr-2 text-green-500"></i>Certification
                            </label>
                            <input type="text" name="certifications" id="certifications" placeholder="Ex: BLS, ACLS, PALS." class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>
                    </div>
                </div>
                
                <!-- SECTION 3: Employment Information -->
                <div class="bg-white rounded-lg shadow-md border border-gray-100 p-6 hover:shadow-lg transition-shadow">
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
                                <option value="full_time">Full Time</option>
                                <option value="part_time">Part Time</option>
                                <option value="contract">Contract</option>
                            </select>
                        </div>
                        
                        <!-- Department -->
                        <div>
                            <label for="department" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-hospital-symbol mr-2 text-amber-500"></i>Department
                            </label>
                            <select name="department" id="department" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                                <option value="">Select Department</option>
                                <option value="emergency">Emergency</option>
                                <option value="icu">ICU</option>
                                <option value="cardiology">Cardiology</option>
                                <option value="neurology">Neurology</option>
                                <option value="pediatrics">Pediatrics</option>
                                <option value="surgery">Surgery</option>
                                <option value="oncology">Oncology</option>
                                <option value="obstetrics">Obstetrics</option>
                            </select>
                        </div>
                        
                        <!-- Shift Preference -->
                        <div>
                            <label for="shift_preference" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-clock mr-2 text-amber-500"></i>Shift Preference
                            </label>
                            <select name="shift_preference" id="shift_preference" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                                <option value="">Select Shift</option>
                                <option value="morning">Morning</option>
                                <option value="evening">Evening</option>
                                <option value="night">Night</option>
                                <option value="rotating">Rotating</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <!-- SECTION 4: Additional Information -->
                <div class="bg-white rounded-lg shadow-md border border-gray-100 p-6 hover:shadow-lg transition-shadow">
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
                            placeholder="Describe your professional background, expertise and achievements..."></textarea>
                            <div class="text-xs text-gray-500 mt-1 text-right">Max 500 characters</div>
                        </div>
                    </div>
                    
                    <!-- Emergency Contact -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="emergency_contact_phone" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-phone mr-2 text-purple-500"></i>Emergency Contact Phone
                            </label>
                            <input type="tel" name="emergency_contact_phone" id="emergency_contact_phone" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Form Actions -->
            <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                <a href="" class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-md transition duration-200 flex items-center">
                    <i class="fas fa-times mr-2"></i> Cancel
                </a>
                <button type="submit" class="px-8 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white rounded-md shadow-md transition duration-200 flex items-center">
                    <i class="fas fa-save mr-2"></i> Save Nurse Profile
                </button>
            </div>
        </form>
    </div>
</div>
@endsection