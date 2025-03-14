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
                
                <form method="POST" action="{{ route('password.email') }}">
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
                        <button type="submit"
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
    const form = document.querySelector('form');
    const submitButton = form.querySelector('button[type="submit"]');
    
    // Add event listener to the form
    form.addEventListener('submit', function(event) {
        // Prevent the default form submission
        event.preventDefault();
        
        // Change button text to show loading state
        submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Processing...';
        submitButton.disabled = true;
        
        // Get the email input value
        const emailInput = document.getElementById('email');
        const emailValue = emailInput.value;
        
        // Validate email (simple validation)
        if (!emailValue || !emailValue.includes('@')) {
            // Show error
            if (!document.querySelector('.email-error')) {
                const errorMessage = document.createElement('p');
                errorMessage.className = 'mt-1 text-sm text-red-600 email-error';
                errorMessage.textContent = 'Please enter a valid email address';
                emailInput.parentNode.appendChild(errorMessage);
            }
            
            // Reset button
            submitButton.innerHTML = 'Send Reset Link';
            submitButton.disabled = false;
            return;
        }
        
        // Simulate API call (you would replace this with your actual form submission)
        setTimeout(function() {
            // Hide the form
            form.style.opacity = '0';
            form.style.height = '0';
            form.style.overflow = 'hidden';
            form.style.transition = 'all 0.5s ease';
            
            // Create success message
            const successMessage = document.createElement('div');
            successMessage.className = 'text-center py-8';
            successMessage.innerHTML = `
                <div class="inline-flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mb-4">
                    <i class="fas fa-check text-green-500 text-2xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Check Your Email</h2>
                <p class="text-gray-600 mb-4">We've sent a password reset link to:</p>
                <p class="text-blue-600 font-medium mb-6">${emailValue}</p>
                <p class="text-sm text-gray-500">Didn't receive an email? Check your spam folder or <button id="resendBtn" class="text-blue-600 hover:underline">resend the link</button></p>
            `;
            
            // Insert the success message where the form was
            form.parentNode.insertBefore(successMessage, form);
            
            // Add event listener to resend button
            document.getElementById('resendBtn').addEventListener('click', function() {
                this.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i>Sending...';
                this.disabled = true;
                
                // Simulate resending
                setTimeout(() => {
                    this.innerHTML = 'Link resent!';
                    this.className = 'text-green-600 hover:underline';
                }, 1500);
            });
            
        }, 1500);
    });
});

    </script>
</body>

</html>