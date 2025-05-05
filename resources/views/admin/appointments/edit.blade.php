@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-full mx-auto">
        <div class="bg-white shadow-lg rounded-lg">
            <div class="bg-indigo-600 text-white rounded-t-lg p-4">
                <h4 class="mb-0 text-xl font-semibold">Edit Appointment</h4>
            </div>
            <div class="p-6">
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block text-sm text-gray-500">Date</label>
                            <input type="date" name="date" value="2025-03-17" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm text-gray-500">Time</label>
                            <input type="time" name="time" value="10:00" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm text-gray-500">Doctor</label>
                        <select name="doctor_id" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="1">Dr. Sarah Johnson</option>
                            <option value="2">Dr. Michael Smith</option>
                            <option value="3">Dr. Emma Brown</option>
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm text-gray-500">Location</label>
                        <input type="text" name="location" value="City General Hospital" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm text-gray-500">Reason for Visit</label>
                        <textarea name="reason" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">Routine check-up and follow-up on blood pressure.</textarea>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm text-gray-500">Additional Notes</label>
                        <textarea name="notes" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">Patient should arrive 15 minutes early for paperwork.</textarea>
                    </div>
                    
                    <div class="flex justify-end">
                        <button type="submit" class="btn btn-primary text-white bg-indigo-600 hover:bg-indigo-700 transition duration-150 px-4 py-2 rounded">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="mt-3 text-right">
            <a href="{{ route('appointments-list') }}" class="btn btn-primary text-white bg-indigo-600 hover:bg-indigo-700 transition duration-150">
                <i class="fas fa-arrow-left mr-1"></i> Back to All Appointments
            </a>
        </div>
    </div>
</div>
@endsection