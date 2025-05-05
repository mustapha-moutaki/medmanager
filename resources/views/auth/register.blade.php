<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    
    <title>Create Account</title>
    <style>
        body {
            background-color: #f0f4f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }
        .form-container {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .input-field:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }
        .btn-primary {
            background: linear-gradient(to right, #4f46e5, #2563eb);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2);
        }
        .nurse-image {
            background-image: url('https://img.freepik.com/free-photo/front-view-smiley-male-doctor_23-2148453484.jpg?t=st=1741483500~exp=1741487100~hmac=d686ac601a6367851d6371710665d668da638e2fe176d833cb9e404a44a5d9b9&w=740');
            background-size: cover;
            background-position: center;
        }
        @media (max-width: 768px) {
            .nurse-image {
                min-height: 200px;
            }
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">
    <div class="form-container bg-white w-full flex flex-col md:flex-row min-h-screen">
        <!-- Nurse Image Section -->
        <div class="nurse-image w-full md:w-1/3 lg:w-2/5 flex items-center justify-center relative">
            <div class="absolute inset-0 bg-gradient-to-b from-indigo-700/70 to-blue-900/70 flex flex-col items-center justify-center text-white p-8">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-center">Healthcare Registration</h2>
                <p class="text-xl mb-6 text-center">Join our community of healthcare professionals and patients</p>
                <div class="flex flex-col space-y-4 items-center">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-400 mr-2 text-xl"></i>
                        <span>24/7 Professional Support</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-400 mr-2 text-xl"></i>
                        <span>Secure Patient Records</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-400 mr-2 text-xl"></i>
                        <span>Easy Appointment Scheduling</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Form Section -->
        <div class="w-full md:w-2/3 lg:w-3/5 p-6 md:p-10 lg:p-12 overflow-y-auto">
            <div class="max-w-2xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Create Your Account</h2>
                <p class="text-gray-600 mb-8">Fill in your information to get started</p>
                
                <form action="{{ route('register.store') }}" method="POST">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- First Name -->
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                                <input type="text" id="first_name" name="first_name" placeholder="Enter first name" 
                                    class="input-field pl-10 block w-full border border-gray-300 rounded-lg py-3 px-4 focus:outline-none transition duration-200">
                            </div>
                            @error('first_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        </div>

                        <!-- Last Name -->
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                                <input type="text" id="last_name" name="last_name" placeholder="Enter last name" 
                                    class="input-field pl-10 block w-full border border-gray-300 rounded-lg py-3 px-4 focus:outline-none transition duration-200">
                            </div>
                        </div>
                        @error('last_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mt-6">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" id="email" name="email" placeholder="your.email@example.com" 
                                class="input-field pl-10 block w-full border border-gray-300 rounded-lg py-3 px-4 focus:outline-none transition duration-200">
                        </div>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div class="mt-6">
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-phone-alt text-gray-400"></i>
                            </div>
                            <input type="text" id="phone" name="phone" placeholder="+1 (555) 000-0000" 
                                class="input-field pl-10 block w-full border border-gray-300 rounded-lg py-3 px-4 focus:outline-none transition duration-200">
                        </div>
                        @error('phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div class="mt-6">
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-map-marker-alt text-gray-400"></i>
                            </div>
                            <input type="text" id="address" name="address" placeholder="Enter your full address" 
                                class="input-field pl-10 block w-full border border-gray-300 rounded-lg py-3 px-4 focus:outline-none transition duration-200">
                        </div>
                        @error('address')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                        <!-- CIN -->
                        <div>
                            <label for="CIN" class="block text-sm font-medium text-gray-700 mb-1">CIN</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-id-card text-gray-400"></i>
                                </div>
                                <input type="text" id="CIN" name="CIN" placeholder="ID Number" 
                                    class="input-field pl-10 block w-full border border-gray-300 rounded-lg py-3 px-4 focus:outline-none transition duration-200">
                            </div>
                            @error('CIN')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        </div>

                        <!-- Age -->
                        <div>
                            <label for="age" class="block text-sm font-medium text-gray-700 mb-1">Age</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-calendar-alt text-gray-400"></i>
                                </div>
                                <input type="number" id="age" name="age" placeholder="Age" 
                                    class="input-field pl-10 block w-full border border-gray-300 rounded-lg py-3 px-4 focus:outline-none transition duration-200">
                            </div>
                            @error('age')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        </div>
           
                        <!-- Gender -->
                        <div>
                            <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-venus-mars text-gray-400"></i>
                                </div>
                                <select id="gender" name="gender" 
                                    class="input-field pl-10 block w-full border border-gray-300 rounded-lg py-3 px-4 focus:outline-none transition duration-200 appearance-none">
                                    <option value="" selected disabled>Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <i class="fas fa-chevron-down text-gray-400"></i>
                                </div>
                            </div>
                            @error('gender')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mt-6">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input type="password" id="password" name="password" placeholder="Create a strong password" 
                                class="input-field pl-10 block w-full border border-gray-300 rounded-lg py-3 px-4 focus:outline-none transition duration-200">
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Password must be at least 8 characters long</p>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-8">
                        <button type="submit" class="btn-primary w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-white font-medium focus:outline-none">
                            Create Account
                        </button>
                    </div>

                    <!-- Login Link -->
                    <div class="text-center mt-6">
                        <p class="text-sm text-gray-600">
                            Already have an account? 
                            <a href="/login" class="font-medium text-indigo-600 hover:text-indigo-500 transition duration-200">
                                Sign in
                            </a>
                        </p>
                    </div>
                </form>

                <!-- Error Handling -->
                <div id="errors" class="mt-4 hidden">
                    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                        <ul class="list-disc pl-5 space-y-1 text-sm"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>