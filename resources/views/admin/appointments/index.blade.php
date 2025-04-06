@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Page Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-blue-600">
            <i class="fas fa-calendar-check mr-2"></i>Manage Appointments
        </h2>
        <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2.5 rounded-md transition duration-150 flex items-center">
            <i class="fas fa-plus-circle mr-2"></i>New Appointment
        </a>
    </div>

    <!-- Filters Card -->
    <div class="bg-white shadow rounded-lg mb-6 p-5 border-t-4 border-blue-500">
        <h3 class="text-lg font-semibold mb-4 text-gray-700">
            <i class="fas fa-filter mr-2"></i>Search & Filter
        </h3>
        <form method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Date Range</label>
                <div class="flex">
                    <input type="date" class="flex-1 rounded-l-md border-gray-300 shadow-sm" name="date_from">
                    <span class="bg-gray-100 flex items-center px-2 border border-gray-300 text-gray-500">to</span>
                    <input type="date" class="flex-1 rounded-r-md border-gray-300 shadow-sm" name="date_to">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Department</label>
                <select class="w-full rounded-md border-gray-300 shadow-sm" name="department">
                    <option>All Departments</option>
                    <option>Cardiology</option>
                    <option>Neurology</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Doctor</label>
                <select class="w-full rounded-md border-gray-300 shadow-sm" name="doctor_id">
                    <option>All Doctors</option>
                    <option>Dr. John</option>
                    <option>Dr. Smith</option>
                </select>
            </div>
            <div class="md:col-span-3">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <input type="text" class="rounded-md border-gray-300 shadow-sm" placeholder="First Name" name="first_name">
                    <input type="text" class="rounded-md border-gray-300 shadow-sm" placeholder="Last Name" name="last_name">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md flex items-center justify-center">
                        <i class="fas fa-search mr-2"></i>Search
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Business Hours Section -->
    <div class="bg-white shadow rounded-lg p-5 mb-6 border-t-4 border-green-500">
        <h3 class="text-lg font-semibold mb-4 text-gray-700 flex items-center">
            <i class="fas fa-clock mr-2"></i>Business Hours
        </h3>
        
        <div class="mb-4 p-3 bg-blue-50 rounded-md border border-blue-100 text-blue-700 text-sm">
            <i class="fas fa-info-circle mr-2"></i>Time Slot Duration (minutes): 30min default
        </div>
        
        <form method="post" action="{{route('businessHour.update')}}">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @php
                    $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                @endphp

                @foreach($days as $day)
                <div class="border p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow bg-gray-50">
                    <h4 class="text-md font-semibold mb-2 text-gray-700">
                        <i class="far fa-calendar-day mr-1"></i>{{ $day }}
                    </h4>
                    <input type="hidden" name="data[{{ $day }}][day]" value="{{ $day }}">
                    <div class="grid grid-cols-2 gap-3 mb-2">
                        <div class="flex items-center">
                            <i class="far fa-clock text-green-600 mr-2"></i>
                            <input type="text" class="timepicker border p-2 rounded w-full" name="data[{{ $day }}][from]" placeholder="From" value="09:00">
                        </div>
                        <div class="flex items-center">
                            <i class="far fa-clock text-red-600 mr-2"></i>
                            <input type="text" class="timepicker border p-2 rounded w-full" name="data[{{ $day }}][to]" placeholder="To" value="17:00">
                        </div>
                    </div>
                    <div class="mb-2 flex items-center">
                        <i class="fas fa-hourglass-half text-blue-600 mr-2"></i>
                        <input type="number" class="border p-2 rounded w-full" name="data[{{ $day }}][step]" placeholder="Step (mins)" value="30">
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="data[{{ $day }}][off]" class="form-checkbox text-red-500" value="true">
                            <span class="ml-2">Day Off</span>
                        </label>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-6">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-md">
                    <i class="fas fa-save mr-2"></i>Save Hours
                </button>
            </div>
        </form>
    </div>

    <!-- Appointment List -->
    <div class="bg-white shadow rounded-lg overflow-hidden border-t-4 border-purple-500">
        <div class="bg-purple-500 text-white py-3 px-6">
            <h3 class="font-semibold">
                <i class="fas fa-list-alt mr-2"></i>Appointments List
            </h3>
        </div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Patient</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Doctor</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Department</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Date & Time</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-600 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-900">APT-1001</td>
                    <td class="px-6 py-4 text-sm text-gray-900">John Doe</td>
                    <td class="px-6 py-4 text-sm text-gray-900">Dr. Smith</td>
                    <td class="px-6 py-4 text-sm text-gray-900">Cardiology</td>
                    <td class="px-6 py-4 text-sm text-gray-900">
                        <div><i class="far fa-calendar-alt mr-1 text-blue-500"></i>Apr 10, 2025</div>
                        <div><i class="far fa-clock mr-1 text-green-500"></i>09:00 - 09:30 AM</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 inline-flex text-xs font-semibold rounded-full bg-green-100 text-green-800">
                            <i class="fas fa-check-circle mr-1"></i>Booked
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right text-sm font-medium">
                        <button class="text-blue-600 hover:text-blue-900 mr-2">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="text-green-600 hover:text-green-900 mr-2">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="text-red-600 hover:text-red-900">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                <!-- More rows would go here -->
            </tbody>
        </table>
        <div class="px-6 py-3 flex justify-center">
            <!-- Pagination would go here -->
            <nav class="inline-flex rounded-md shadow">
                <a href="#" class="py-2 px-4 bg-white border border-gray-300 text-sm leading-5 font-medium text-gray-700 hover:bg-gray-50">Previous</a>
                <a href="#" class="py-2 px-4 bg-blue-500 border border-blue-500 text-sm leading-5 font-medium text-white">1</a>
                <a href="#" class="py-2 px-4 bg-white border border-gray-300 text-sm leading-5 font-medium text-gray-700 hover:bg-gray-50">2</a>
                <a href="#" class="py-2 px-4 bg-white border border-gray-300 text-sm leading-5 font-medium text-gray-700 hover:bg-gray-50">Next</a>
            </nav>
        </div>
    </div>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- Simple Timepicker Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('.timepicker');
        // Simple timepicker function
        elems.forEach(el => {
            el.addEventListener('focus', function() {
                // A placeholder for your preferred timepicker
                console.log('Timepicker triggered');
                // You can integrate a simple timepicker here
            });
        });
    });
</script>
@endsection