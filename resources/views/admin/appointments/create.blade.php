@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 w-full">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-blue-800 p-4 text-center">
            <h2 class="text-2xl font-bold text-white">Create Appointment</h2>
        </div>

        <div class="p-6 text-center">
            <h3 class="text-lg font-semibold text-gray-800">Search for Patient by Name or Phone Number</h3>
            <form action="" method="GET" class="mt-4">
                <input type="text" name="search" placeholder="Enter patient name or phone number" class="border border-gray-300 rounded-md shadow-sm h-10 focus:ring focus:ring-blue-200 bg-blue-50 w-1/2" required>
                <button type="submit" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200">
                    Search
                </button>
            </form>
        </div>

        <div class="p-6 text-center">
            <h3 class="text-lg font-semibold text-gray-800">Add Appointment Information</h3>
        </div>

        <div class="p-6">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Appointment Details Section -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-calendar-alt text-blue-600 mr-2"></i>
                        <span>Appointment Details</span>
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                        <div>
                            <label class="text-sm text-gray-500" for="date">Date</label>
                            <input type="date" id="date" name="date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm h-10 focus:ring focus:ring-blue-200 bg-blue-50" required>
                        </div>
                        <div>
                            <label class="text-sm text-gray-500" for="time">Time</label>
                            <input type="time" id="time" name="time" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm h-10 focus:ring focus:ring-blue-200 bg-blue-50" required>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-6 text-center">
                    <button type="submit" class="bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg hover:bg-blue-700 transition duration-200">
                        Create Appointment
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Include Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
