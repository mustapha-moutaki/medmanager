@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-blue-800 p-3 text-center">
            <h2 class="text-lg font-bold text-white">Create Doctor Profile</h2>
        </div>

        <div class="p-6 text-center">
            <h3 class="text-lg font-semibold text-gray-800">Add Doctor Information</h3>
        </div>

        <div class="p-6">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Image Upload Section -->
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-image text-blue-600 mr-2"></i>
                        Upload Image
                    </h3>
                    <div class="p-4">
                        <label class="text-xs text-gray-500" for="image">Profile Image</label>
                        <input type="file" id="image" name="image" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm h-10 focus:ring focus:ring-blue-200 bg-blue-100" accept="image/*" required>
                    </div>
                </div>

                <!-- Personal Info Section -->
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-user text-blue-600 mr-2"></i>
                        Personal Info
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                        <div class="p-4">
                            <label class="text-xs text-gray-500" for="first_name">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm h-10 focus:ring focus:ring-blue-200 bg-blue-100" required>
                        </div>
                        <div class="p-4">
                            <label class="text-xs text-gray-500" for="last_name">Last Name</label>
                            <input type="text" id="last_name" name="last_name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm h-10 focus:ring focus:ring-blue-200 bg-blue-100" required>
                        </div>
                        <div class="p-4">
                            <label class="text-xs text-gray-500" for="birthdate">Birthdate</label>
                            <input type="date" id="birthdate" name="birthdate" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm h-10 focus:ring focus:ring-blue-200 bg-blue-100" required>
                        </div>
                        <div class="p-4">
                            <label class="text-xs text-gray-500" for="gender">Gender</label>
                            <select id="gender" name="gender" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm h-10 focus:ring focus:ring-blue-200 bg-blue-100" required>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Contact Info Section -->
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-phone-alt text-blue-600 mr-2"></i>
                        Contact Info
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                        <div class="p-4">
                            <label class="text-xs text-gray-500" for="phone_number">Phone Number</label>
                            <input type="tel" id="phone_number" name="phone_number" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm h-10 focus:ring focus:ring-blue-200 bg-blue-100" required>
                        </div>
                        <div class="p-4">
                            <label class="text-xs text-gray-500" for="email">Email</label>
                            <input type="email" id="email" name="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm h-10 focus:ring focus:ring-blue-200 bg-blue-100" required>
                        </div>
                    </div>
                </div>

                <!-- Additional Info Section -->
                <div class="mt-6">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                        Additional Info
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                        <div class="p-4">
                            <label class="text-xs text-gray-500" for="specialty">Specialty</label>
                            <input type="text" id="specialty" name="specialty" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm h-10 focus:ring focus:ring-blue-200 bg-blue-100" required>
                        </div>
                        <div class="p-4">
                            <label class="text-xs text-gray-500" for="years_of_experience">Years of Experience</label>
                            <input type="number" id="years_of_experience" name="years_of_experience" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm h-10 focus:ring focus:ring-blue-200 bg-blue-100" required>
                        </div>
                        <div class="p-4">
                            <label class="text-xs text-gray-500" for="patients_treated">Patients Treated</label>
                            <input type="number" id="patients_treated" name="patients_treated" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm h-10 focus:ring focus:ring-blue-200 bg-blue-100" required>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-6 text-center">
                    <button type="submit" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700">
                        Create Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
