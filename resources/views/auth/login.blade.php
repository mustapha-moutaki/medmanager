<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">

    <title>Login - Healthcare Portal</title>
    <style>
        body {
            background-color: #f0f4f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh; /* Full height */
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
        .login-image {
            border-top-left-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
            height: 100vh; /* Full height */
            position: relative; /* For positioning overlay and icons */
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.1); /* Dark overlay */
            z-index: 1; /* Ensure overlay is above the image */
        }

        .animated-icons {
            z-index: 999;
            position: absolute;
            top: 70%; /* Center vertically */
            left: 50%; /* Center horizontally */
            transform: translate(-50%, -50%); /* Adjust position to center */
            display: flex;
            justify-content: space-around;
            width: 60%; /* Adjust width */
            pointer-events: none; /* Prevent interaction with icons */
        }

        .icon {
           
            font-size: 40px; /* Size of icons */
            opacity: 0.8; /* Slightly more visible */
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0% { transform: translatey(0); }
            50% { transform: translatey(-10px); }
            100% { transform: translatey(0); }
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">
    <div class="flex flex-col md:flex-row w-full h-full relative">
        <!-- Image Section -->
        <div class="hidden md:block md:w-1/2">
            <div class="login-image">
                <img src="https://img.freepik.com/free-photo/young-doctor-supporting-his-patient_1098-2237.jpg?t=st=1741479763~exp=1741483363~hmac=73f3fc7c22e1b2f0888de36cc0e9248efc75cf60cf9a3a244d30322011e8c93f&w=1380" alt="Healthcare Illustration" class="w-full h-full object-cover">
                <div class="overlay"></div> <!-- Colored overlay -->
                <div class="animated-icons">
                    <i class="fas fa-heart icon text-red-600"></i>
                    <i class="fas fa-stethoscope icon text-green-600"></i>
                    <i class="fas fa-user-md icon text-blue-600"></i>
                    <i class="fas fa-notes-medical icon text-purple-600"></i>
                    <i class="fas fa-hospital icon text-orange-600"></i>
                </div>
            </div>
        </div>
        
        <!-- Login Form Section -->
        <div class="w-full md:w-1/2 h-full p-8 md:p-12 flex items-center justify-center relative">
            <div class="w-full max-w-md z-10"> <!-- Ensure form is above overlay -->
                <div class="text-center mb-10">
                    <div class="inline-block p-4 rounded-full bg-blue-100 mb-4">
                        <i class="fas fa-hospital text-3xl text-blue-600"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800">Welcome Back</h2>
                    <p class="text-gray-600 mt-2">Login to your healthcare account</p>
                </div>
             
                <form action="{{ route('login') }}" method="POST">
                @csrf
                    <!-- Email Input -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2" for="email">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                placeholder="your.email@example.com"
                                required 
                                class="input-field pl-10 block w-full border border-gray-300 rounded-lg py-3 px-4 focus:outline-none transition duration-200"
                            >
                        </div>
                    </div>
                    
                    <!-- Password Input -->
                    <div class="mb-6">
                        <div class="flex items-center justify-between mb-2">
                            <label class="block text-sm font-medium text-gray-700" for="password">Password</label>
                        
                            <a href="{{ route('password.forgot')}}" class="text-sm text-indigo-600 hover:text-indigo-500 transition duration-200">Forgot password?</a>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                placeholder="Enter your password"
                                required 
                                class="input-field pl-10 block w-full border border-gray-300 rounded-lg py-3 px-4 focus:outline-none transition duration-200"
                            >
                        </div>
                    </div>
                    
                    <!-- Error Message -->
                    @if (session('error'))
                    <div class="text-red-500 mb-4">
                        {{ session('error') }}
                    </div>
                    @endif

                    <!-- Remember Me -->
                    <div class="flex items-center mb-6">
                        <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
                    </div>
                    
                    <!-- Login Button -->
                    <div class="mb-6">
                        <button type="submit" class="btn-primary w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-white font-medium focus:outline-none">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Sign In
                        </button>
                    </div>
                    
                    <!-- Divider -->
                    <div class="relative flex items-center my-6">
                        <div class="flex-grow border-t border-gray-300"></div>
                        <span class="flex-shrink mx-4 text-gray-600 text-sm">Or continue with</span>
                        <div class="flex-grow border-t border-gray-300"></div>
                    </div>
                    
                    <!-- Social Login Buttons -->
                    <div class="grid grid-cols-1 gap-3 mb-6">
                    <button type="button" class="flex justify-center items-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white hover:bg-gray-50 transition duration-200">
                        <a href="{{ route('auth.google')}}">
                            <i class="fab fa-google text-red-600"></i>
                        </a>
                    </button>
                </div>

                    
                    <!-- Sign Up Link -->
                    <div class="text-center">
                        <p class="text-sm text-gray-600">
                            Don't have an account? 
                            <a href="/register" class="font-medium text-indigo-600 hover:text-indigo-500 transition duration-200">
                                Create account
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>