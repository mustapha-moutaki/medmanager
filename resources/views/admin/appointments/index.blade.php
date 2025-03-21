@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Page Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-indigo-600">Manage Appointments</h2>
        <a href="{{route('appointment.create')}}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md transition duration-150 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
           Quick New Appointment
        </a>
    </div>

    <!-- Filters & Search -->
    <div class="bg-white shadow rounded-lg mb-6 p-6">
        <form action="" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Date Range</label>
                <div class="flex">
                    <input type="date" class="flex-1 rounded-l-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="date_from">
                    <span class="bg-gray-100 px-2 border border-gray-300">to</span>
                    <input type="date" class="flex-1 rounded-r-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="date_to">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Department</label>
                <select class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="department">
                    <option value="">All Departments</option>
                    <option value="cardiology">Cardiology</option>
                    <option value="neurology">Neurology</option>
                    <option value="pediatrics">Pediatrics</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Doctor</label>
                <select class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="doctor_id">
                    <option value="">All Doctors</option>
                    <option value="1">Dr. Sarah Johnson</option>
                    <option value="2">Dr. Michael Chen</option>
                </select>
            </div>
            <div class="md:col-span-3">
                <label class="block text-sm font-medium text-gray-700">Search by Name</label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="First Name" name="first_name">
                    <input type="text" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Last Name" name="last_name">
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-2 rounded-md flex items-center transition duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <span class="ml-1">Search</span>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Appointment List -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Patient</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Doctor</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Department</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Time</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">APT-1001</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">John Doe</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Dr. Sarah Johnson</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Cardiology</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Mar 17, 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">10:00 AM - 10:30 AM</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Booked</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <button class="text-indigo-600 hover:text-indigo-900">View</button>
                        <button class="text-green-600 hover:text-green-900">Edit</button>
                        <button class="text-red-600 hover:text-red-900">Cancel</button>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">APT-1002</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Jane Smith</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Dr. Michael Chen</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Neurology</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Mar 18, 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">11:00 AM - 11:30 AM</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Available</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <button class="text-indigo-600 hover:text-indigo-900">View</button>
                        <button class="text-green-600 hover:text-green-900">Book</button>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="flex justify-between items-center mt-4">
        <span class="text-sm text-gray-700">Showing 1 to 2 of 24 results</span>
        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                <span class="sr-only">Previous</span>
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
            <a href="#" class="bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">1</a>
            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">2</a>
            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                <span class="sr-only">Next</span>
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
        </nav>
    </div>
</div>
@endsection