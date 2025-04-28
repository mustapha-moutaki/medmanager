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
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Patient Type</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Date & Time</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Status</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($appointments as $appointment)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 text-sm text-gray-900">{{ $appointment->id }}</td>
                <td class="px-6 py-4 text-sm text-gray-900">
                    @if($appointment->patient && $appointment->patient->user)
                        {{ $appointment->patient->user->first_name }} {{ $appointment->patient->user->last_name }}
                    @else
                        <span class="text-red-500">Missing Patient Data</span>
                    @endif
                </td>
                <td class="px-6 py-4 text-sm text-gray-900">
                    @if($appointment->patient && $appointment->patient->doctor && $appointment->patient->doctor->user)
                        Dr. {{ $appointment->patient->doctor->user->first_name }} {{ $appointment->patient->doctor->user->last_name }}
                    @else
                        <span class="text-red-500">Missing Doctor Data</span>
                    @endif
                </td>
                <td class="px-6 py-4 text-sm text-gray-900">{{ $appointment->patient->doctor->specialist ?? 'N/A' }}</td>
                <td class="px-6 py-4 text-sm text-gray-900">
                    @if($appointment->patient && $appointment->patient->patient_type)
                        <span class="px-2 py-1 inline-flex text-xs font-semibold rounded-full
                            @if($appointment->patient->patient_type == 'New')
                                bg-blue-100 text-blue-800
                            @elseif($appointment->patient->patient_type == 'Regular')
                                bg-purple-100 text-purple-800
                            @elseif($appointment->patient->patient_type == 'VIP')
                                bg-amber-100 text-amber-800
                            @else
                                bg-gray-100 text-gray-800
                            @endif
                        ">
                            {{ $appointment->patient->patient_type ?? 'General' }}
                        </span>
                    @else
                        <span class="text-gray-500">General</span>
                    @endif
                </td>
                <td class="px-6 py-4 text-sm text-gray-900">
                    <div><i class="far fa-calendar-alt mr-1 text-blue-500"></i>{{ date('M d, Y', strtotime($appointment->date)) }}</div>
                    <div><i class="far fa-clock mr-1 text-green-500"></i>{{ date('h:i A', strtotime($appointment->start_time)) }} - {{ date('h:i A', strtotime($appointment->end_time)) }}</div>
                </td>
                <td class="px-6 py-4">
                    @php
                        $appointmentDate = strtotime($appointment->date);
                        $currentDate = strtotime(date('Y-m-d'));
                        $isPast = $appointmentDate < $currentDate;
                    @endphp
                    
                    @if($isPast)
                        <span class="px-2 py-1 inline-flex text-xs font-semibold rounded-full bg-green-100 text-green-800">
                            <i class="fas fa-check-circle mr-1"></i>Completed
                        </span>
                    @else
                        <span class="px-2 py-1 inline-flex text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                            <i class="fas fa-clock mr-1"></i>Upcoming
                        </span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="px-6 py-3 flex justify-center">
        {{ $appointments->links() }}
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