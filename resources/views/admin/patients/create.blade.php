@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-blue-600">Create New Patient</h2>
    </div>

    <form action="{{ route('patient.store') }}" method="POST" id="patient-form" enctype="multipart/form-data" class="bg-white shadow-lg rounded-lg overflow-hidden">
        @csrf

        <!-- Personal and Contact Information Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">
            <!-- Personal Information -->
            <div class="flex flex-col space-y-6">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-user-circle text-2xl text-blue-600"></i>
                    <h3 class="text-xl font-semibold">Personal Information</h3>
                </div>

                <!-- Profile Photo -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Profile Photo</label>
                    <div class="flex items-center">
                        <div class="w-24 h-24 rounded-full overflow-hidden mr-4">
                            <img id="profile-image" src="https://i.pinimg.com/736x/96/47/ac/9647acd03f0e4608b35675b3c3861116.jpg" alt="Profile Picture" class="w-full h-full object-cover" >
                        </div>
                        <div>
                            <input type="file" id="profile-upload" accept="image/*" class="hidden" name="profile_photo">
                            <button type="button" id="upload-button" class="bg-blue-100 text-blue-700 px-3 py-1 rounded-md text-sm mb-2">Upload Photo</button>
                            <p class="text-xs text-gray-500">JPG, PNG or GIF. Max size 2MB</p>
                        </div>
                    </div>
                </div>

                <!-- First Name -->
                <div>
                    <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                    <input type="text" id="first_name" name="first_name" placeholder="Enter first name" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <!-- Last Name -->
                <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                    <input type="text" id="last_name" name="last_name" placeholder="Enter last name" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <!-- Age -->
                <div>
                    <label for="age" class="block text-sm font-medium text-gray-700 mb-2">Age</label>
                    <input type="number" id="age" name="age" placeholder="Enter age" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <!-- Gender -->
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700 mb-2">Gender</label>
                    <select id="gender" name="gender" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                    </select>
                </div>

                <!-- CIN -->
                <div>
                    <label for="cin" class="block text-sm font-medium text-gray-700 mb-2">CIN (ID Card Number)</label>
                    <input type="text" id="cin" name="CIN" placeholder="Enter CIN number" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <!-- Birth Date -->
                <div>
                    <label for="birth_date" class="block text-sm font-medium text-gray-700 mb-2">Date of Birth</label>
                    <input type="date" id="birth_date" name="birth_date" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <!-- Bio -->
                <div>
                    <label for="bio" class="block text-sm font-medium text-gray-700 mb-2">Bio</label>
                    <textarea id="bio" name="bio" rows="3" placeholder="Tell us about yourself" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter password" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <!-- Marital Status -->
                <div>
                    <label for="marital_status" class="block text-sm font-medium text-gray-700 mb-2">Marital Status</label>
                    <select id="marital_status" name="marital_status" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="divorced">Divorced</option>
                        <option value="widowed">Widowed</option>
                    </select>
                </div>

                    <!-- assign doctor-->

                <div class="mb-4">
                    <label for="doctor_id" class="block text-gray-700">Assign Doctor</label>
                    <select name="doctor_id" id="doctor_id" class="border border-gray-300 rounded-md p-2 w-full">
                        <option value="" disabled selected>Select a Doctor</option>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}">DR.{{ $doctor->user->first_name }} {{ $doctor->user->last_name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- assign nurse-->

                    <div class="mb-4">
                <label for="nurse_id" class="block text-gray-700">Assign Nurse</label>
                <select name="nurse_id" id="nurse_id" class="border border-gray-300 rounded-md p-2 w-full">
                    <option value="">Select a Nurse</option>
                    @foreach($nurses as $nurse)
                        <option value="{{ $nurse->id }}">{{ $nurse->user->first_name }} {{ $nurse->user->last_name }}</option>
                    @endforeach
                </select>
            </div>
                    </div>


             


            <!-- Contact Information -->
            <div class="flex flex-col space-y-6">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-address-card text-2xl text-blue-600"></i>
                    <h3 class="text-xl font-semibold">Contact Information</h3>
                </div>

                <!-- CNSS -->
                <div>
                    <label for="cnss" class="block text-sm font-medium text-gray-700 mb-2">CNSS Number</label>
                    <input type="text" id="cnss" name="CNSS" placeholder="Enter CNSS number" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Insurance Provider -->
                <div>
                    <label for="insurance" class="block text-sm font-medium text-gray-700 mb-2">Insurance Provider</label>
                    <input type="text" id="insurance" name="insurance" placeholder="Enter insurance provider" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Patient Type -->
                <div>
                    <label for="patient_type" class="block text-sm font-medium text-gray-700 mb-2">Patient Type</label>
                    <select id="patient_type" name="patient_type" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="outpatient">Outpatient</option>
                        <option value="inpatient">Inpatient</option>
                        <option value="emergency">Emergency</option>
                    </select>
                </div>

                <!-- Registration Date -->
                <div>
                    <label for="registration_date" class="block text-sm font-medium text-gray-700 mb-2">Registration Date</label>
                    <input type="date" id="registration_date" name="registration_date" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <!-- Address -->
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Street Address</label>
                    <input type="text" id="address" name="address" placeholder="Enter street address" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter email address" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Phone Number -->
                <div>
                    <label for="phoneNumber" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                    <input type="tel" id="phoneNumber" name="phone" placeholder="Enter phone number" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Extra Phone Number -->
                <div>
                    <label for="extra_phone_number" class="block text-sm font-medium text-gray-700 mb-2">Extra Phone Number (optional)</label>
                    <input type="tel" id="extra_phone_number" name="extra_phone_number" placeholder="Enter extra phone number" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
        </div>
    
        <!-- Documents Section -->
        <div class="p-6 border-t border-gray-200">
            <div class="flex items-center space-x-2 mb-4">
                <i class="fas fa-file-upload text-2xl text-blue-600"></i>
                <h3 class="text-xl font-semibold">Documents</h3>
            </div>
            <div class="flex justify-between items-center mb-4">
                <button type="button" id="add-document" class="flex items-center space-x-1 text-blue-600 text-sm px-3 py-1 bg-blue-100 rounded-md">
                    <i class="fas fa-plus"></i>
                    <span>Add New Document</span>
                </button>
            </div>

            <input type="file" id="document-upload" name="documents[]" multiple class="hidden" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
            <div id="uploaded-documents" class="space-y-4">
                <!-- Uploaded documents will be displayed here -->
            </div>
            <p class="text-red-500">
                <i>Please make sure that all documents are combined into a single PDF file before uploading. Accepted file types: .pdf, .doc, .docx, .jpg, .jpeg, .png.</i>
            </p>
            <div class="flex space-x-4">
                <button type="submit" form="patient-form" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200">
                    Save Patient
                </button>
                <a href="{{ route('patients-list') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg transition duration-200">
                    Cancel
                </a>
            </div>
        </div>
    </form>

    @if ($errors->any())
    <div class="bg-red-200 text-red-600 p-4 rounded-md mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Profile Picture Upload
        const uploadButton = document.getElementById('upload-button');
        const fileInput = document.getElementById('profile-upload');
        const profileImage = document.getElementById('profile-image');

        uploadButton.addEventListener('click', function() {
            fileInput.click();
        });

        fileInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const file = this.files[0];

                // Check file size (max 2MB)
                if (file.size > 2 * 1024 * 1024) {
                    alert('File is too large. Maximum size is 2MB.');
                    return;
                }

                // Check file type
                if (!file.type.match('image/*')) {
                    alert('Only image files are allowed.');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    profileImage.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });

        // Document Upload
        const addDocumentButton = document.getElementById('add-document');
        const documentInput = document.getElementById('document-upload');
        const uploadedDocumentsContainer = document.getElementById('uploaded-documents');

        addDocumentButton.addEventListener('click', function() {
            documentInput.click();
        });

        documentInput.addEventListener('change', function() {
            const files = Array.from(this.files);
            
            files.forEach(file => {
                // Check file size
                if (file.size > 2 * 1024 * 1024) {
                    alert(`File ${file.name} is too large. Maximum size is 2MB.`);
                    return;
                }

                // Check file type
                const validTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'image/jpeg', 'image/png'];
                if (!validTypes.includes(file.type)) {
                    alert(`File ${file.name} is not a valid type. Allowed types: PDF, DOC, DOCX, JPG, JPEG, PNG.`);
                    return;
                }

                // Create a new document display element
                const documentDiv = document.createElement('div');
                documentDiv.className = 'flex justify-between items-center p-4 bg-gray-50 rounded-lg';
                documentDiv.innerHTML = `
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 flex items-center justify-center bg-blue-100 text-blue-600 rounded-lg">
                            <i class="far fa-file-pdf text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-medium">${file.name}</h4>
                            <p class="text-sm text-gray-500">Uploaded</p>
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <button type="button" class="text-blue-600 hover:text-blue-800 px-2 py-1">
                            <i class="fas fa-download"></i>
                        </button>
                        <button type="button" class="text-red-600 hover:text-red-800 px-2 py-1">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                `;
                uploadedDocumentsContainer.appendChild(documentDiv);
            });
        });
    });
</script>
@endsection