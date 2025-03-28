@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-6 w-full bg-gray-100">
    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-gradient-to-r from-purple-500 to-pink-500 p-6">
            <h1 class="text-3xl font-bold text-white flex items-center">
                <i class="fas fa-user-nurse mr-3"></i>
                Edit Nurse Profile
            </h1>
            <p class="text-purple-200 mt-1">Update the details for <span class="font-semibold">Nurse Name</span></p>
        </div>

        <form action="" method="POST" enctype="multipart/form-data" class="p-8">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6">
                <!-- SECTION 1: Personal Information -->
                <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Personal Information</h2>
                    
                    <!-- Profile Image -->
                    <div class="flex flex-col items-center mb-6">
                        <div class="h-40 w-40 rounded-full bg-gray-200 mb-4 overflow-hidden border-2 border-gray-300 flex items-center justify-center">
                            <i class="fas fa-user text-gray-500 text-5xl"></i>
                        </div>
                        <label for="profile_image" class="px-4 py-2 bg-purple-50 text-purple-700 rounded-md cursor-pointer hover:bg-purple-100 transition">
                            <i class="fas fa-camera mr-2"></i> Change Photo
                            <input type="file" name="profile_image" id="profile_image" class="hidden">
                        </label>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- First Name -->
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" required>
                        </div>
                        
                        <!-- Last Name -->
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" required>
                        </div>
                        
                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" required>
                        </div>
                        
                        <!-- Phone -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                            <input type="tel" name="phone" id="phone" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        </div>
                    </div>
                </div>

                <!-- SECTION 2: Professional Information -->
                <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Professional Information</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Specialization -->
                        <div>
                            <label for="specialization" class="block text-sm font-medium text-gray-700 mb-1">Specialization</label>
                            <select name="specialization" id="specialization" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" required>
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
                            <label for="experience_years" class="block text-sm font-medium text-gray-700 mb-1">Years of Experience</label>
                            <input type="number" name="experience_years" id="experience_years" min="0" max="50" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" required>
                        </div>
                        
                        <!-- License Number -->
                        <div>
                            <label for="license_number" class="block text-sm font-medium text-gray-700 mb-1">License Number</label>
                            <input type="text" name="license_number" id="license_number" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" required>
                        </div>
                        
                        <!-- License Expiry -->
                        <div>
                            <label for="license_expiry" class="block text-sm font-medium text-gray-700 mb-1">License Expiry Date</label>
                            <input type="date" name="license_expiry" id="license_expiry" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        </div>
                    </div>
                </div>

                <!-- SECTION 3: Employment Information -->
                <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Employment Information</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Employment Status -->
                        <div>
                            <label for="employment_status" class="block text-sm font-medium text-gray-700 mb-1">Employment Status</label>
                            <select name="employment_status" id="employment_status" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                <option value="full_time">Full Time</option>
                                <option value="part_time">Part Time</option>
                                <option value="contract">Contract</option>
                            </select>
                        </div>
                        
                        <!-- Department -->
                        <div>
                            <label for="department" class="block text-sm font-medium text-gray-700 mb-1">Department</label>
                            <select name="department" id="department" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
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
                        
                        <!-- Join Date -->
                        <div>
                            <label for="join_date" class="block text-sm font-medium text-gray-700 mb-1">Join Date</label>
                            <input type="date" name="join_date" id="join_date" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        </div>
                        
                        <!-- Shift Preference -->
                        <div>
                            <label for="shift_preference" class="block text-sm font-medium text-gray-700 mb-1">Shift Preference</label>
                            <select name="shift_preference" id="shift_preference" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                <option value="">Select Shift</option>
                                <option value="morning">Morning</option>
                                <option value="evening">Evening</option>
                                <option value="night">Night</option>
                                <option value="rotating">Rotating</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-4 mt-6 pt-4 border-t border-gray-200">
                <a href="" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-md transition duration-200">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-md shadow transition duration-200">
                    <i class="fas fa-save mr-2"></i>Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection