@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-blue-600">Edit Patient Details</h2>
        <div class="flex space-x-4">
            <button type="submit" form="patient-form" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200">
                Save Changes
            </button>
            <a href="#" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg transition duration-200">
                Cancel
            </a>
        </div>
    </div>

    <form id="patient-form" class="bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Form Tabs -->
        <div class="bg-gray-100 px-6 py-4 border-b">
            <div class="flex space-x-6">
                <button type="button" class="text-blue-600 font-medium border-b-2 border-blue-600 pb-2">Personal Info</button>
                <button type="button" class="text-gray-600 hover:text-blue-600 font-medium pb-2">Contact Info</button>
                <button type="button" class="text-gray-600 hover:text-blue-600 font-medium pb-2">Medical Records</button>
                <button type="button" class="text-gray-600 hover:text-blue-600 font-medium pb-2">Documents</button>
                <button type="button" class="text-gray-600 hover:text-blue-600 font-medium pb-2">Appointments</button>
            </div>
        </div>

        <!-- Personal Information Section -->
        <div class="p-6">
            <h3 class="text-xl font-semibold mb-4">Personal Information</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col space-y-6">
                    <!-- Profile Picture -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Profile Picture</label>
                        <div class="flex items-center">
                            <div class="w-24 h-24 rounded-full overflow-hidden mr-4">
                                <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Profile Picture" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <button type="button" class="bg-blue-100 text-blue-700 px-3 py-1 rounded-md text-sm mb-2">Change Photo</button>
                                <p class="text-xs text-gray-500">JPG, PNG or GIF. Max size 2MB</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Full Name -->
                    <div>
                        <label for="fullName" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                        <input type="text" id="fullName" name="fullName" value="Jane Doe" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                
                    <!-- Date of Birth -->
                    <div>
                        <label for="dateOfBirth" class="block text-sm font-medium text-gray-700 mb-2">Date of Birth</label>
                        <input type="date" id="dateOfBirth" name="dateOfBirth" value="1985-01-15" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                
                    <!-- Gender -->
                    <div>
                        <label for="gender" class="block text-sm font-medium text-gray-700 mb-2">Gender</label>
                        <select id="gender" name="gender" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="female" selected>Female</option>
                            <option value="male">Male</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                
                    <!-- Marital Status -->
                    <div>
                        <label for="maritalStatus" class="block text-sm font-medium text-gray-700 mb-2">Marital Status</label>
                        <select id="maritalStatus" name="maritalStatus" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="married" selected>Married</option>
                            <option value="single">Single</option>
                            <option value="divorced">Divorced</option>
                            <option value="widowed">Widowed</option>
                        </select>
                    </div>
                </div>
                
                <div class="flex flex-col space-y-6">
                    <!-- Social Security Number -->
                    <div>
                        <label for="socialNumber" class="block text-sm font-medium text-gray-700 mb-2">Social Security Number</label>
                        <input type="text" id="socialNumber" name="socialNumber" value="123-45-6789" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                
                    <!-- Patient Type -->
                    <div>
                        <label for="patientType" class="block text-sm font-medium text-gray-700 mb-2">Patient Type</label>
                        <select id="patientType" name="patientType" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="outpatient" selected>Outpatient</option>
                            <option value="inpatient">Inpatient</option>
                            <option value="emergency">Emergency</option>
                        </select>
                    </div>
                
                    <!-- Registration Date -->
                    <div>
                        <label for="registrationDate" class="block text-sm font-medium text-gray-700 mb-2">Registration Date</label>
                        <input type="date" id="registrationDate" name="registrationDate" value="2020-02-10" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                
                    <!-- Insurance Provider -->
                    <div>
                        <label for="insurance" class="block text-sm font-medium text-gray-700 mb-2">Insurance Provider</label>
                        <input type="text" id="insurance" name="insurance" value="HealthPlus Insurance" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                
                    <!-- Insurance ID -->
                    <div>
                        <label for="insuranceId" class="block text-sm font-medium text-gray-700 mb-2">Insurance ID</label>
                        <input type="text" id="insuranceId" name="insuranceId" value="HP12345678" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Information Section -->
        <div class="p-6 border-t border-gray-200 hidden">
            <h3 class="text-xl font-semibold mb-4">Contact Information</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col space-y-6">
                    <!-- Address -->
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Street Address</label>
                        <input type="text" id="address" name="address" value="123 Main St" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                
                    <!-- City -->
                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700 mb-2">City</label>
                        <input type="text" id="city" name="city" value="Anytown" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                
                    <!-- State -->
                    <div>
                        <label for="state" class="block text-sm font-medium text-gray-700 mb-2">State</label>
                        <input type="text" id="state" name="state" value="CA" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>
                
                <div class="flex flex-col space-y-6">
                    <!-- Zip Code -->
                    <div>
                        <label for="zipCode" class="block text-sm font-medium text-gray-700 mb-2">Zip Code</label>
                        <input type="text" id="zipCode" name="zipCode" value="12345" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                
                    <!-- Phone Number -->
                    <div>
                        <label for="phoneNumber" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                        <input type="tel" id="phoneNumber" name="phoneNumber" value="(555) 123-4567" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <input type="email" id="email" name="email" value="jane.doe@example.com" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>
            </div>
        </div>

        <!-- Medical Records Section -->
        <div class="p-6 border-t border-gray-200 hidden">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold">Medical Records</h3>
                <button type="button" class="flex items-center space-x-1 text-blue-600 text-sm px-3 py-1 bg-blue-100 rounded-md">
                    <i class="fas fa-plus"></i>
                    <span>Add New Record</span>
                </button>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full bg-white border-collapse">
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
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Documents Section -->
        <div class="p-6 border-t border-gray-200 hidden">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold">Documents</h3>
                <div class="flex space-x-2">
                    <button type="button" class="flex items-center space-x-1 text-blue-600 text-sm px-3 py-1 bg-blue-100 rounded-md">
                        <i class="fas fa-plus"></i>
                        <span>Add New Document</span>
                    </button>
                    <button type="button" class="flex items-center space-x-1 text-green-600 text-sm px-3 py-1 bg-green-100 rounded-md">
                        <i class="fas fa-file-upload"></i>
                        <span>Upload Files</span>
                    </button>
                </div>
            </div>
            
            <div class="space-y-4">
                <div class="flex justify-between items-center p-4 bg-gray-50 rounded-lg">
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 flex items-center justify-center bg-blue-100 text-blue-600 rounded-lg">
                            <i class="far fa-file-pdf text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-medium">Blood Test Results.pdf</h4>
                            <p class="text-sm text-gray-500">Uploaded on Feb 15, 2023</p>
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <button type="button" class="text-blue-600 hover:text-blue-800 px-2 py-1">
                            <i class="fas fa-download"></i>
                        </button>
                        <button type="button" class="text-blue-600 hover:text-blue-800 px-2 py-1">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="text-red-600 hover:text-red-800 px-2 py-1">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
                
                <div class="flex justify-between items-center p-4 bg-gray-50 rounded-lg">
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 flex items-center justify-center bg-blue-100 text-blue-600 rounded-lg">
                            <i class="far fa-file-pdf text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-medium">Prescription.pdf</h4>
                            <p class="text-sm text-gray-500">Uploaded on Feb 20, 2023</p>
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <button type="button" class="text-blue-600 hover:text-blue-800 px-2 py-1">
                            <i class="fas fa-download"></i>
                        </button>
                        <button type="button" class="text-blue-600 hover:text-blue-800 px-2 py-1">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="text-red-600 hover:text-red-800 px-2 py-1">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Appointments Section -->
        <div class="p-6 border-t border-gray-200 hidden">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold">Upcoming Appointments</h3>
                <button type="button" class="flex items-center space-x-1 text-blue-600 text-sm px-3 py-1 bg-blue-100 rounded-md">
                    <i class="fas fa-plus"></i>
                    <span>Schedule New Appointment</span>
                </button>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full bg-white border-collapse">
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
                            <td class="px-4 py-3 text-sm">Mar 15, 2023</td>
                            <td class="px-4 py-3 text-sm">10:00 AM</td>
                            <td class="px-4 py-3 text-sm">Regular Checkup</td>
                            <td class="px-4 py-3 text-sm">Dr. Lisa White</td>
                            <td class="px-4 py-3 text-sm">
                                <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">
                                    Confirmed
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <div class="flex space-x-2">
                                    <button type="button" class="text-blue-600 hover:text-blue-800">Edit</button>
                                    <button type="button" class="text-red-600 hover:text-red-800">Cancel</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-sm">Apr 05, 2023</td>
                            <td class="px-4 py-3 text-sm">2:30 PM</td>
                            <td class="px-4 py-3 text-sm">Follow-up</td>
                            <td class="px-4 py-3 text-sm">Dr. John Smith</td>
                            <td class="px-4 py-3 text-sm">
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">
                                    Pending
                                </span>
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
    </form>
</div>

<script>
    // Tab switching functionality
    document.addEventListener('DOMContentLoaded', function() {
        const tabButtons = document.querySelectorAll('.bg-gray-100 button');
        const tabContents = document.querySelectorAll('#patient-form > div:not(:first-child)');
        
        tabButtons.forEach((button, index) => {
            button.addEventListener('click', () => {
                // Reset all tab styles
                tabButtons.forEach(btn => {
                    btn.classList.remove('text-blue-600', 'border-b-2', 'border-blue-600');
                    btn.classList.add('text-gray-600', 'hover:text-blue-600');
                });
                
                // Activate selected tab
                button.classList.remove('text-gray-600', 'hover:text-blue-600');
                button.classList.add('text-blue-600', 'border-b-2', 'border-blue-600');
                
                // Hide all tab contents
                tabContents.forEach(content => {
                    content.classList.add('hidden');
                });
                
                // Show selected tab content
                tabContents[index].classList.remove('hidden');
            });
        });
    });
</script>
@endsection