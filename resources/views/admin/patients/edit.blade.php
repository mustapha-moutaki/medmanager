@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-blue-600">Edit Patient Details</h2>
    </div>

    <form id="patient-form" class="bg-white shadow-lg rounded-lg overflow-hidden" action="{{ route('patients.update', $patient->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Personal Information Section -->
        <div class="p-6 bg-blue-100 border-l-4 border-blue-500 mb-4 rounded-lg shadow">
            <h3 class="text-xl font-semibold mb-4">
                <i class="fas fa-user-circle mr-2 text-blue-600"></i>
                Personal Information
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col space-y-6">
                    <!-- Profile Picture -->
                    <div class="flex items-center">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Profile Picture</label>
                        <div class="w-24 h-24 rounded-full overflow-hidden mr-4">
                            <img id="profileImage" src="{{ $patient->user->profile_photo ? asset('storage/' . $patient->user->profile_photo) : 'https://i.pinimg.com/736x/41/b5/fd/41b5fdeb11298a62c49a7af6dd000d75.jpg' }}" alt="Profile Picture" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <input type="file" id="profile_photo" name="profile_photo" class="hidden" accept="image/*">
                            <button type="button" onclick="document.getElementById('profile_photo').click()" class="bg-blue-100 text-blue-700 px-3 py-1 rounded-md text-sm mb-2">Change Photo</button>
                            <p class="text-xs text-gray-500">JPG, PNG or GIF. Max size 2MB</p>
                        </div>
                    </div>

                    <!-- First Name -->
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                        <input type="text" id="first_name" name="first_name" value="{{ $patient->user->first_name }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Last Name -->
                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                        <input type="text" id="last_name" name="last_name" value="{{ $patient->user->last_name }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Date of Birth -->
                    <div>
                        <label for="birth_date" class="block text-sm font-medium text-gray-700 mb-2">Date of Birth</label>
                        <input type="date" id="birth_date" name="birth_date" value="{{ $patient->user->birth_date }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Age -->
                    <div>
                        <label for="age" class="block text-sm font-medium text-gray-700 mb-2">Age</label>
                        <input type="number" id="age" name="age" value="{{ $patient->user->age }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Gender -->
                    <div>
                        <label for="gender" class="block text-sm font-medium text-gray-700 mb-2">Gender</label>
                        <select id="gender" name="gender" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="female" {{ $patient->user->gender == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="male" {{ $patient->user->gender == 'male' ? 'selected' : '' }}>Male</option>
                        </select>
                    </div>

                    <!-- Marital Status -->
                    <div>
                        <label for="marital_status" class="block text-sm font-medium text-gray-700 mb-2">Marital Status</label>
                        <select id="marital_status" name="marital_status" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="married" {{ $patient->marital_status == 'married' ? 'selected' : '' }}>Married</option>
                            <option value="single" {{ $patient->marital_status == 'single' ? 'selected' : '' }}>Single</option>
                            <option value="divorced" {{ $patient->marital_status == 'divorced' ? 'selected' : '' }}>Divorced</option>
                            <option value="widowed" {{ $patient->marital_status == 'widowed' ? 'selected' : '' }}>Widowed</option>
                        </select>
                    </div>
                </div>

                <div class="flex flex-col space-y-6">
                    <!-- CIN -->
                    <div>
                        <label for="CIN" class="block text-sm font-medium text-gray-700 mb-2">CIN (Identity Card Number)</label>
                        <input type="text" id="CIN" name="CIN" value="{{ $patient->user->CIN }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Social Security Number -->
                    <div>
                        <label for="CNSS" class="block text-sm font-medium text-gray-700 mb-2">CNSS Number</label>
                        <input type="text" id="CNSS" name="CNSS" value="{{ $patient->CNSS }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Patient Type -->
                    <div>
                        <label for="patient_type" class="block text-sm font-medium text-gray-700 mb-2">Patient Type</label>
                        <select id="patient_type" name="patient_type" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="outpatient" {{ $patient->patient_type == 'outpatient' ? 'selected' : '' }}>Outpatient</option>
                            <option value="inpatient" {{ $patient->patient_type == 'inpatient' ? 'selected' : '' }}>Inpatient</option>
                            <option value="emergency" {{ $patient->patient_type == 'emergency' ? 'selected' : '' }}>Emergency</option>
                        </select>
                    </div>

                    <!-- Registration Date -->
                    <div>
                        <label for="registration_date" class="block text-sm font-medium text-gray-700 mb-2">Registration Date</label>
                        <input type="date" id="registration_date" name="registration_date" value="{{ $patient->registration_date }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Insurance Provider -->
                    <div>
                        <label for="insurance" class="block text-sm font-medium text-gray-700 mb-2">Insurance Provider</label>
                        <input type="text" id="insurance" name="insurance" value="{{ $patient->insurance }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Bio -->
                    <div>
                        <label for="bio" class="block text-sm font-medium text-gray-700 mb-2">Bio / Notes</label>
                        <textarea id="bio" name="bio" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ $patient->user->bio }}</textarea>
                    </div>
                </div>
            </div>

            <div class="mt-6 border-t pt-6">
                <h4 class="text-lg font-medium mb-4">
                    <i class="fas fa-user-md mr-2 text-blue-600"></i>
                    Assigned Staff
                </h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Doctor Assignment -->
                    <div>
                        <label for="doctor_id" class="block text-sm font-medium text-gray-700 mb-2">Assigned Doctor</label>
                        <select id="doctor_id" name="doctor_id" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="" {{ is_null($patient->doctor_id) ? 'selected' : '' }}>No doctor assigned</option>
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}" {{ ($patient->doctor_id == $doctor->id) ? 'selected' : '' }}>
                                    Dr. {{$doctor->user->first_name . ' ' . $doctor->user->last_name}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Nurse Assignment -->
                    <div>
                        <label for="nurse_id" class="block text-sm font-medium text-gray-700 mb-2">Assigned Nurse</label>
                        <select id="nurse_id" name="nurse_id" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="" {{ is_null($patient->nurse_id) ? 'selected' : '' }}>No nurse assigned</option>
                            @foreach($staff as $nurse)
                                <option value="{{ $nurse->id }}" {{ ($patient->nurse_id == $nurse->id) ? 'selected' : '' }}>
                                    {{ $nurse->user->first_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Information Section -->
        <div class="p-6 bg-green-100 border-l-4 border-green-500 mb-4 rounded-lg shadow">
            <h3 class="text-xl font-semibold mb-4">
                <i class="fas fa-address-book mr-2 text-green-600"></i>
                Contact Information
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col space-y-6">
                    <!-- Address -->
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Street Address</label>
                        <input type="text" id="address" name="address" value="{{ $patient->user->address }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ $patient->user->email }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                    </div>
                </div>

                <div class="flex flex-col space-y-6">
                    <!-- Primary Phone Number -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                        <input type="tel" id="phone" name="phone" value="{{ $patient->user->phone }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                    </div>

                    <!-- Extra Phone Number -->
                    <div>
                        <label for="extra_phone_number" class="block text-sm font-medium text-gray-700 mb-2">Extra Phone Number</label>
                        <input type="tel" id="extra_phone_number" name="extra_phone_number" value="{{ $patient->extra_phone_number }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                    </div>
                </div>
            </div>
        </div>

        <!-- Medical Records Section -->
        <div class="p-6 bg-yellow-100 border-l-4 border-yellow-500 mb-4 rounded-lg shadow">
            <h3 class="text-xl font-semibold mb-4">
                <i class="fas fa-file-medical mr-2 text-yellow-600"></i>
                Medical Records
            </h3>
            <div class="overflow-x-auto">
                <table class="w-full bg-white border-collapse rounded-lg shadow">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Symptoms</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Diagnosis</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Specialist</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="px-4 py-3 text-sm">Mar 01, 2023</td>
                            <td class="px-4 py-3 text-sm">Fatigue, Thirst</td>
                            <td class="px-4 py-3 text-sm">Diabetes Type II</td>
                            <td class="px-4 py-3 text-sm">Dr. John Smith</td>
                            <td class="px-4 py-3 text-sm">
                                <div class="flex space-x-2">
                                    <button type="button" class="text-blue-600 hover:text-blue-800">Edit</button>
                                    <button type="button" class="text-red-600 hover:text-red-800">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-sm">Jan 15, 2023</td>
                            <td class="px-4 py-3 text-sm">Headache, Dizziness</td>
                            <td class="px-4 py-3 text-sm">Migraine</td>
                            <td class="px-4 py-3 text-sm">Dr. Sarah Johnson</td>
                            <td class="px-4 py-3 text-sm">
                                <div class="flex space-x-2">
                                    <button type="button" class="text-blue-600 hover:text-blue-800">Edit</button>
                                    <button type="button" class="text-red-600 hover:text-red-800">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-sm">Feb 10, 2023</td>
                            <td class="px-4 py-3 text-sm">Chest Pain</td>
                            <td class="px-4 py-3 text-sm">Anxiety</td>
                            <td class="px-4 py-3 text-sm">Dr. Emily White</td>
                            <td class="px-4 py-3 text-sm">
                                <div class="flex space-x-2">
                                    <button type="button" class="text-blue-600 hover:text-blue-800">Edit</button>
                                    <button type="button" class="text-red-600 hover:text-red-800">Delete</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Documents Section -->
        <div class="p-6 bg-purple-100 border-l-4 border-purple-500 mb-4 rounded-lg shadow">
            <h3 class="text-xl font-semibold mb-4">
                <i class="fas fa-file-alt mr-2 text-purple-600"></i>
                Documents
            </h3>
            <div class="space-y-4">
                @forelse ($patient->documents as $document)
                    <div class="flex justify-between items-center p-4 bg-gray-50 rounded-lg shadow">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 flex items-center justify-center bg-blue-100 text-blue-600 rounded-lg">
                                <i class="far fa-file-pdf text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-medium">{{ $document->file_name }}</h4
                                <p class="text-sm text-gray-500">Uploaded on {{ $document->created_at->format('M d, Y') }}</p>
                                <p class="text-sm text-gray-600">File size: {{ $document->file_size }} MB</p>
                                <p class="text-sm text-gray-600">Description: {{ $document->description }}</p>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ asset('storage/' . $document->file_path) }}" class="text-blue-600 hover:text-blue-800 px-2 py-1" download>
                                <i class="fas fa-download"></i>
                            </a>
                            <button type="button" class="text-red-600 hover:text-red-800 px-2 py-1">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-sm">No documents available.</p>
                @endforelse
            </div>
        </div>

        <!-- Appointments Section -->
        <div class="p-6 bg-orange-100 border-l-4 border-orange-500 mb-4 rounded-lg shadow">
            <h3 class="text-xl font-semibold mb-4">
                <i class="fas fa-calendar-alt mr-2 text-orange-600"></i>
                Upcoming Appointments
            </h3>
            <div class="overflow-x-auto">
                <table class="w-full bg-white border-collapse rounded-lg shadow">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Doctor</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="px-4 py-3 text-sm">Apr 10, 2025</td>
                            <td class="px-4 py-3 text-sm">10:00 AM</td>
                            <td class="px-4 py-3 text-sm">Check-up</td>
                            <td class="px-4 py-3 text-sm">Dr. John Smith</td>
                            <td class="px-4 py-3 text-sm">
                                <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Confirmed</span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <div class="flex space-x-2">
                                    <button type="button" class="text-blue-600 hover:text-blue-800">Edit</button>
                                    <button type="button" class="text-red-600 hover:text-red-800">Cancel</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-sm">Apr 15, 2025</td>
                            <td class="px-4 py-3 text-sm">2:30 PM</td>
                            <td class="px-4 py-3 text-sm">Follow-up</td>
                            <td class="px-4 py-3 text-sm">Dr. Sarah Johnson</td>
                            <td class="px-4 py-3 text-sm">
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">Pending</span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <div class="flex space-x-2">
                                    <button type="button" class="text-blue-600 hover:text-blue-800">Edit</button>
                                    <button type="button" class="text-red-600 hover:text-red-800">Cancel</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-sm">Apr 20, 2025</td>
                            <td class="px-4 py-3 text-sm">1:00 PM</td>
                            <td class="px-4 py-3 text-sm">Consultation</td>
                            <td class="px-4 py-3 text-sm">Dr. Emily White</td>
                            <td class="px-4 py-3 text-sm">
                                <span class="px-2 py-1 bg-red-100 text-red-800 text-xs rounded-full">Cancelled</span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <div class="flex space-x-2">
                                    <button type="button" class="text-blue-600 hover:text-blue-800">Edit</button>
                                    <button type="button" class="text-red-600 hover:text-red-800">Cancel</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="flex space-x-4 mt-6">
            <button type="submit" form="patient-form" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200">
                Save Changes
            </button>
            <a href="{{ route('patients-list')}}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg transition duration-200">
                Cancel
            </a>
            <a href="{{ route('patient.vitals', $patient->id) }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition duration-200">
                Add Patient Vitals
            </a>

        </div>
    </form>

    @if ($errors->any())
    <div class="p-4 mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg">
        <p class="font-bold">Please correct the following errors:</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<script>
    document.getElementById('profile_photo').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profileImage').src = e.target.result; 
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
