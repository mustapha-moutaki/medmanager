@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-6 w-full bg-gray-50">
    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-5">
            <h1 class="text-2xl font-bold text-white flex items-center">
                <i class="fas fa-user-md mr-3"></i>
                Doctor Profile Registration
            </h1>
            <p class="text-blue-100 mt-1">Complete the form below to register a new medical professional</p>
        </div>

        <form action="{{ route('doctor.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- SECTION 1: Personal Information -->
                <div class="bg-white rounded-lg shadow-md border border-gray-100 p-6 hover:shadow-lg transition-shadow">
                    <div class="flex items-center mb-4">
                        <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                            <i class="fas fa-user text-blue-600 text-xl"></i>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-800">
                            Personal Information
                        </h2>
                    </div>
                    <div class="border-b border-gray-200 mb-4"></div>
                    
                    <!-- Profile Image -->
                    <div class="flex flex-col items-center mb-6">
                        <div class="h-32 w-32 rounded-full bg-gray-100 mb-4 flex items-center justify-center border-2 border-dashed border-gray-300">
                            <i class="fas fa-user-md text-gray-400 text-4xl"></i>
                        </div>
                        <label for="image" class="px-4 py-2 bg-blue-50 text-blue-700 rounded-md cursor-pointer hover:bg-blue-100 transition">
                            <i class="fas fa-camera mr-2"></i> Upload Photo
                            <input type="file" name="profile_photo" id="image" class="hidden" accept="image/*">
                        </label>
                        @error('image')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- First Name -->
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-user mr-2 text-blue-500"></i>First Name
                            </label>
                            <input type="text" name="first_name" id="first_name" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-blue-50" required>
                            @error('first_name')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Last Name -->
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-user mr-2 text-blue-500"></i>Last Name
                            </label>
                            <input type="text" name="last_name" id="last_name" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-blue-50" required>
                            @error('last_name')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Age Input -->
                        <div>
                            <label for="age" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-birthday-cake mr-2 text-blue-500"></i>Age
                            </label>
                            <input type="number" name="age" id="age" placeholder="Age" class="input-field pl-10 block w-full border border-gray-300 rounded-lg py-3 px-4 focus:outline-none transition duration-200" required>
                            @error('age')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-lock mr-2 text-blue-500"></i>
                            Password
                            </label>
                            <input type="password" name="password" id="password" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent bg-amber-50" required>
                            @error('password')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        
                        <div>
                            <label for="CIN" class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-id-card mr-2 text-blue-500"></i>
                            CIN
                            </label>
                            <input type="number" name="CIN" id="CIN" placeholder="CIN" class="input-field pl-10 block w-full border border-gray-300 rounded-lg py-3 px-4 focus:outline-none transition duration-200" required>
                            @error('CIN')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>


                        <!-- Date of Birth -->
                        <div>
                            <label for="birthdate" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-birthday-cake mr-2 text-blue-500"></i>Date of Birth
                            </label>
                            <input type="date" name="birth_date" id="birth_date" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-blue-50" required>
                            @error('birth_date')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Gender -->
                        <div>
                            <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-venus-mars mr-2 text-blue-500"></i>Gender
                            </label>
                            <select name="gender" id="gender" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-blue-50" aria-label="Select Gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            @error('gender')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                    </div>
                        <!-- Address -->
                        <div class="mt-6">
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-home mr-2 text-blue-500"></i>

                            </div>
                            <input type="text" id="address" name="address" placeholder="Enter your full address" 
                                class="input-field pl-10 block w-full border border-gray-300 rounded-lg py-3 px-4 focus:outline-none transition duration-200">
                        </div>
                        @error('address')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                
                
                <!-- SECTION 2: Contact Information -->
                <div class="bg-white rounded-lg shadow-md border border-gray-100 p-6 hover:shadow-lg transition-shadow">
                    <div class="flex items-center mb-4">
                        <div class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center mr-3">
                            <i class="fas fa-phone-alt text-green-600 text-xl"></i>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-800">
                            Contact Information
                        </h2>
                    </div>
                    <div class="border-b border-gray-200 mb-4"></div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Phone Number -->
                        <div>
                            <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-phone-alt mr-2 text-green-500"></i>Phone Number
                            </label>
                            <input type="tel" name="phone" id="phone_number" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent bg-green-50" required>
                            @error('phone_number')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-envelope mr-2 text-green-500"></i>Email Address
                            </label>
                            <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent bg-green-50" required>
                            @error('email')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- Emergency Contact (Added as part of expanded contact section) -->
                    <div class="mt-6">
                        <h3 class="text-md font-medium text-gray-700 mb-3 pb-2 border-b border-gray-100">
                            <i class="fas fa-exclamation-circle mr-2 text-green-500"></i>Emergency Contact
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="emergency_contact_phone" class="block text-sm font-medium text-gray-700 mb-1">
                                    <i class="fas fa-phone mr-2 text-green-500"></i>Contact Phone
                                </label>
                                <input type="tel" name="emergency_contact_phone" id="emergency_contact_phone" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent bg-green-50">
                                @error('emergency_contact_phone')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- SECTION 3: Professional Information -->
                <div class="bg-white rounded-lg shadow-md border border-gray-100 p-6 hover:shadow-lg transition-shadow">
                    <div class="flex items-center mb-4">
                        <div class="h-10 w-10 rounded-full bg-amber-100 flex items-center justify-center mr-3">
                            <i class="fas fa-stethoscope text-amber-600 text-xl"></i>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-800">
                            Professional Information
                        </h2>
                    </div>
                    <div class="border-b border-gray-200 mb-4"></div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Specialty -->
                        <div>
                            <label for="specialty" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-briefcase-medical mr-2 text-amber-500"></i>Specialty
                            </label>
                            <input type="text" name="specialist" id="specialty" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent bg-amber-50" required>
                            @error('specialty')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Years of Experience -->
                        <div>
                            <label for="years_of_experience" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-history mr-2 text-amber-500"></i>Years of Experience
                            </label>
                            <input type="number" name="yearsOfExperience" id="years_of_experience" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent bg-amber-50" required>
                            @error('years_of_experience')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <!-- SECTION 4: Additional Information -->
                <div class="bg-white rounded-lg shadow-md border border-gray-100 p-6 hover:shadow-lg transition-shadow">
                    <div class="flex items-center mb-4">
                        <div class="h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center mr-3">
                            <i class="fas fa-info-circle text-purple-600 text-xl"></i>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-800">
                            Additional Information
                        </h2>
                    </div>
                    <div class="border-b border-gray-200 mb-4"></div>
                    
                    <!-- Education -->
                    <div class="mb-4">
                        <label for="education" class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-graduation-cap mr-2 text-purple-500"></i>Education
                        </label>
                        <input type="text" name="certificate" id="education" placeholder="e.g., MD from Harvard Medical School" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-purple-50">
                        @error('education')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Biography -->
                    <div>
                        <label for="bio" class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-address-card mr-2 text-purple-500"></i>Professional Biography
                        </label>
                        <textarea name="bio" id="bio" rows="3" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-purple-50" placeholder="Brief description of professional background and expertise..."></textarea>
                        <div class="text-xs text-gray-500 mt-1 text-right">Max 500 characters</div>
                        @error('bio')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <!-- Form Actions -->
            <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                <a href="" class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-md transition duration-200 flex items-center">
                    <i class="fas fa-times mr-2"></i> Cancel
                </a>
                <button type="submit" class="px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white rounded-md shadow-md transition duration-200 flex items-center">
                    <i class="fas fa-save mr-2"></i> Create Doctor Profile
                </button>
            </div>
        </form>
        
        <!-- Remove the general error section since we're now showing errors under each field -->
    </div>
</div>
@endsection