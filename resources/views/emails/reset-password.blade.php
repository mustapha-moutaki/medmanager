<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <!-- Card with two sections -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <!-- Top Banner Section -->
                <div class="bg-gradient-to-r from-purple-500 to-indigo-600 p-6 text-white">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-white bg-opacity-30 rounded-lg">
                            <i class="fas fa-key text-xl"></i>
                        </div>
                        <h1 class="text-xl font-bold">Reset Your Password</h1>
                    </div>
                    <p class="mt-2 text-purple-100">Create a new password for your account.</p>
                </div>
                
                <!-- Form Section -->
                <div class="p-6">
                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                <p>{{ session('success') }}</p>
                            </div>
                        </div>
                    @endif
                    
                    @if (session('error'))
                        <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                            <div class="flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                <p>{{ session('error') }}</p>
                            </div>
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ url('reset-password', $token) }}?email={{ urlencode($email) }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        
                        <div class="mb-5">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                                <input 
                                    type="email" 
                                    name="email" 
                                    id="email" 
                                    value="{{ $email ?? old('email') }}"
                                    required 
                                    class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                    placeholder="your@email.com"
                                >
                            </div>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-5">
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <input 
                                    type="password" 
                                    name="password" 
                                    id="password" 
                                    required 
                                    class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                    placeholder="••••••••"
                                >
                            </div>
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-5">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <input 
                                    type="password" 
                                    name="password_confirmation" 
                                    id="password_confirmation" 
                                    required 
                                    class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                    placeholder="••••••••"
                                >
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <button 
                                type="submit" 
                                class="w-full flex justify-center items-center bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 px-4 rounded-lg transition duration-200 shadow-md hover:shadow-lg"
                            >
                                <i class="fas fa-key mr-2"></i>
                                Reset Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Info Box Below -->
            <div class="mt-6 bg-indigo-100 rounded-xl p-4 text-indigo-800">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-info-circle mt-0.5"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium">Password requirements:</h3>
                        <div class="mt-2 text-sm">
                            <ul class="list-disc pl-5 space-y-1">
                                <li>At least 8 characters long</li>
                                <li>Include at least one uppercase letter</li>
                                <li>Include at least one number</li>
                                <li>Include at least one special character</li>
                                <li>Should not contain your email address</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="mt-6 text-center text-sm text-gray-500">
                <p>Remember your password? <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800 font-medium">Sign in</a></p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Password validation
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('password_confirmation');
            const form = document.querySelector('form');
            
            form.addEventListener('submit', function(e) {
                // Check if passwords match
                if (passwordInput.value !== confirmPasswordInput.value) {
                    e.preventDefault();
                    // Create error message if it doesn't exist
                    if (!document.getElementById('password-match-error')) {
                        const errorMsg = document.createElement('p');
                        errorMsg.id = 'password-match-error';
                        errorMsg.className = 'mt-1 text-sm text-red-600';
                        errorMsg.textContent = 'Passwords do not match';
                        confirmPasswordInput.parentNode.parentNode.appendChild(errorMsg);
                    }
                    return false;
                }
                
                // Check password strength
                const password = passwordInput.value;
                const hasUpperCase = /[A-Z]/.test(password);
                const hasNumber = /[0-9]/.test(password);
                const hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/.test(password);
                
                if (password.length < 8 || !hasUpperCase || !hasNumber || !hasSpecialChar) {
                    e.preventDefault();
                    // Create error message if it doesn't exist
                    if (!document.getElementById('password-strength-error')) {
                        const errorMsg = document.createElement('p');
                        errorMsg.id = 'password-strength-error';
                        errorMsg.className = 'mt-1 text-sm text-red-600';
                        errorMsg.textContent = 'Password must meet all requirements';
                        passwordInput.parentNode.parentNode.appendChild(errorMsg);
                    }
                    return false;
                }
                
                return true;
            });
        });
    </script>
</body>
</html>