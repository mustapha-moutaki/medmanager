<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body class="h-screen bg-gray-50 overflow-hidden">
    <div class="flex flex-col lg:flex-row h-full">
        <!-- Left Section (Form) -->
        <div class="w-full lg:w-1/2 bg-white flex flex-col justify-center px-8 md:px-20 lg:px-16 xl:px-28 py-8 z-10 relative">
            <!-- Logo -->
            <div class="mb-10">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-lock text-white"></i>
                    </div>
                    <span class="ml-3 text-xl font-bold text-gray-800">SecureApp</span>
                </div>
            </div>
            
            <!-- Form Container -->
            <div class="max-w-md w-full mx-auto">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Forgot Password?</h1>
                <p class="text-gray-500 mb-8">Enter your email address and we'll send you a link to reset your password.</p>
                
                <!-- Success Message Display -->
                @if (session('status'))
                <div id="success-message" class="text-center py-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mb-4">
                        <i class="fas fa-check text-green-500 text-2xl"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Check Your Email</h2>
                    <p class="text-gray-600 mb-4">We've sent a password reset link to:</p>
                    <p class="text-blue-600 font-medium mb-6">{{ session('email', 'your email address') }}</p>
                    <p class="text-sm text-gray-500">Didn't receive an email? Check your spam folder or 
                        <a href="{{ route('password.forgot') }}" class="text-blue-600 hover:underline">try again</a>
                    </p>
                </div>
                @endif

                <!-- Error Message For Email Not Found -->
                @if (session('error'))
                <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline"> {{ session('error') }}</span>
                </div>
                @endif
                
                <!-- Only show form if no success message -->
                @if (!session('status'))
                <form method="POST" action="{{ route('password.forgot.post') }}" id="forgot-form">
                    @csrf
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400 transition duration-200"
                                placeholder="name@example.com">
                        </div>
                        @if ($errors->has('email'))
                            <p class="mt-1 text-sm text-red-600">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="mb-6">
                        <button type="submit" id="submit-btn"
                            class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200 font-medium">
                            Send Reset Link
                        </button>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center transition duration-200">
                            <i class="fas fa-arrow-left mr-2 text-sm"></i> Back to Login
                        </a>
                    </div>
                </form>
                @endif
            </div>
            
            <!-- Bottom Decoration -->
            <div class="absolute bottom-0 left-0 right-0 h-2 bg-gradient-to-r from-blue-400 via-blue-600 to-indigo-600"></div>
        </div>
        
        <!-- Right Section (Blue Background) -->
        <div class="hidden lg:block w-1/2 bg-gradient-to-br from-blue-600 to-indigo-800 relative overflow-hidden">
            <!-- Decorative Elements -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-0 left-0 w-full h-full">
                    <div class="absolute top-1/4 left-1/4 w-40 h-40 bg-white rounded-full"></div>
                    <div class="absolute bottom-1/4 right-1/3 w-60 h-60 bg-white rounded-full"></div>
                    <div class="absolute top-1/3 right-1/4 w-20 h-20 bg-white rounded-full"></div>
                </div>
            </div>
            
            <!-- Content -->
            <div class="absolute inset-0 flex items-center justify-center p-12">
                <div class="text-center text-white max-w-md">
                    <div class="mb-6 inline-flex items-center justify-center w-16 h-16 bg-white bg-opacity-20 rounded-full">
                        <i class="fas fa-envelope text-white text-2xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold mb-4">Check Your Email</h2>
                    <p class="text-lg mb-6">We'll send you a password reset link to your registered email address.</p>
                    <div class="flex items-center justify-center space-x-3 text-sm">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle mr-1"></i>
                            <span>Secure</span>
                        </div>
                        <div class="w-1 h-1 bg-white rounded-full"></div>
                        <div class="flex items-center">
                            <i class="fas fa-bolt mr-1"></i>
                            <span>Fast</span>
                        </div>
                        <div class="w-1 h-1 bg-white rounded-full"></div>
                        <div class="flex items-center">
                            <i class="fas fa-shield-alt mr-1"></i>
                            <span>Protected</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Mobile Blue Section (Visible on smaller screens) -->
        <div class="lg:hidden w-full bg-gradient-to-b from-blue-600 to-indigo-800 p-8 flex-1 flex items-center justify-center">
            <div class="text-center text-white max-w-md">
                <div class="mb-4 inline-flex items-center justify-center w-12 h-12 bg-white bg-opacity-20 rounded-full">
                    <i class="fas fa-envelope text-white text-xl"></i>
                </div>
                <h2 class="text-2xl font-bold mb-2">Check Your Email</h2>
                <p class="text-sm mb-4">We'll send you a password reset link to your registered email address.</p>
                <div class="flex items-center justify-center space-x-3 text-xs">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-1"></i>
                        <span>Secure</span>
                    </div>
                    <div class="w-1 h-1 bg-white rounded-full"></div>
                    <div class="flex items-center">
                        <i class="fas fa-bolt mr-1"></i>
                        <span>Fast</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>      
document.addEventListener('DOMContentLoaded', function() {
    // Get the form and button elements
    const form = document.getElementById('forgot-form');
    if (!form) return; // Exit if form doesn't exist (success state)
    
    const submitButton = form.querySelector('button[type="submit"]');
    
    // Add event listener to the form
    form.addEventListener('submit', function() {
        // Change button text to show loading state
        submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Processing...';
        submitButton.disabled = true;
        
        // Let the form submit naturally to the server
        return true;
    });
});
    </script>
</body>
</html>