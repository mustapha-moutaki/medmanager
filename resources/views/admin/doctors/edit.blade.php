@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-blue-800 p-3 text-center">
            <h2 class="text-lg font-bold text-white">Edit Doctor Profile</h2>
        </div>

        <div class="p-6 text-center">
        @if($doctor->user->gender == 'male')
    <img src="{{ $doctor->user->profile_photo ? asset('storage/' . $doctor->user->profile_photo) : 'https://i.pinimg.com/736x/a4/65/fa/a465facd516872128b2129177ca4c354.jpg' }}" 
         alt="Dr. {{ $doctor->user->first_name }} {{ $doctor->user->last_name }}" 
         class="w-24 h-24 rounded-full mx-auto object-cover border-2 border-blue-500">
@else
    <img src="{{ $doctor->user->profile_photo ? asset('storage/' . $doctor->user->profile_photo) : 'https://i.pinimg.com/736x/41/bd/fc/41bdfcf77b854da843f843ccf594b3cf.jpg' }}" 
         alt="Dr. {{ $doctor->user->first_name }} {{ $doctor->user->last_name }}" 
         class="w-24 h-24 rounded-full mx-auto object-cover border-2 border-blue-500">
@endif
            <h3 class="text-lg font-semibold text-gray-800">{{ $doctor->user->first_name }}</h3>
        </div>

        <div class="p-6">
            <form action="{{ route('doctor.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Personal Info Section -->
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-user text-blue-600 mr-2"></i>
                        Personal Info
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <label class="text-xs text-gray-500" for="first_name">First Name</label>
                            <input type="text" id="first_name" name="first_name" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                   value="{{ old('first_name', $doctor->user->first_name) }}" required>
                        </div>
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <label class="text-xs text-gray-500" for="last_name">Last Name</label>
                            <input type="text" id="last_name" name="last_name" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                   value="{{ old('last_name', $doctor->user->last_name) }}" required>
                        </div>
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <label class="text-xs text-gray-500" for="birthdate">Birthdate</label>
                            <input type="date" id="birthdate" name="birthdate" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                   value="{{ old('birthdate', $doctor->user->birth_date) }}" required>
                        </div>
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <label class="text-xs text-gray-500" for="age">Age</label>
                            <input type="number" id="age" name="age" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                   value="{{ old('age', $doctor->user->age) }}" required>
                        </div>
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <label class="text-xs text-gray-500" for="gender">Gender</label>
                            <select id="gender" name="gender" 
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                <option value="male" {{ old('gender', $doctor->user->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender', $doctor->user->gender) == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <label class="text-xs text-gray-500" for="address">Address</label>
                            <input type="text" id="address" name="address" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                   value="{{ old('address', $doctor->user->address) }}" required>
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
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <label class="text-xs text-gray-500" for="phone_number">Phone Number</label>
                            <input type="tel" id="phone_number" name="phone" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                   value="{{ old('phone', $doctor->user->phone) }}" required>
                        </div>
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <label class="text-xs text-gray-500" for="email">Email</label>
                            <input type="email" id="email" name="email" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                   value="{{ old('email', $doctor->user->email) }}" required>
                        </div>
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <label class="text-xs text-gray-500" for="emergency_contact_phone">Emergency Contact Phone</label>
                            <input type="tel" id="emergency_contact_phone" name="emergency_contact_phone" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                   value="{{ old('emergency_contact_phone', $doctor->emergency_contact_phone) }}" required>
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
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <label class="text-xs text-gray-500" for="specialty">Specialty</label>
                            <input type="text" id="specialty" name="specialist" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                   value="{{ old('specialty', $doctor->specialist) }}" required>
                        </div>
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <label class="text-xs text-gray-500" for="years_of_experience">Years of Experience</label>
                            <input type="number" id="years_of_experience" name="years_of_experience" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                   value="{{ old('years_of_experience', $doctor->yearsOfExperience) }}" required>
                        </div>
                       
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <label class="text-xs text-gray-500" for="certificates">Certificates</label>
                            <input type="text" id="certificates" name="certificates" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                   value="{{ old('certificates', $doctor->certificate) }}" required>
                        </div>
                    </div>
                </div>

                <!-- Bio Section -->
                <div class="mt-6">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-file-alt text-blue-600 mr-2"></i>
                        Professional Bio
                    </h3>
                    <div class="bg-blue-50 p-4 rounded-lg">
                        <label class="text-xs text-gray-500" for="bio">Bio</label>
                        <textarea id="bio" name="bio" 
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                  rows="4">{{ old('bio', $doctor->user->bio) }}</textarea>
                    </div>
                </div>

                <!-- Photo Upload Section -->
                <div class="mt-6">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-camera text-blue-600 mr-2"></i>
                        Profile Photo
                    </h3>
                    <div class="bg-blue-50 p-4 rounded-lg">
                        <label class="text-xs text-gray-500" for="photo">Upload Photo</label>
                        <input type="file" id="photo" name="photo" 
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                               accept="image/*">
                        <p class="text-xs text-gray-500 mt-2">Current photo: {{ $doctor->user->profile_photo ?? 'No photo uploaded' }}</p>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-6 text-center">
                    <button type="submit" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700">
                        Update Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection