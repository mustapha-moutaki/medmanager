@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold mb-8 text-center text-blue-600">Edit Patient Details</h2>
    
    <div class="bg-white rounded-lg shadow-lg p-6">
        <form action="" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="p-4 border border-gray-300 rounded-lg bg-blue-50">
                    <h3 class="text-xl font-semibold mb-2 text-blue-600">Patient Information</h3>
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="patient-name">Name</label>
                        <input type="text" id="patient-name" name="patient-name" value="" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                    </div>
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700" for="age">Age</label>
                        <input type="number" id="age" name="age" value="" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                    </div>
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700">Gender</label>
                        <select id="gender" name="gender" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                            <option value="male">Male</option>
                            <option value="female" >Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700" for="condition">Medical Condition</label>
                        <textarea id="condition" name="condition" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" rows="3" required></textarea>
                    </div>
                </div>

                <div class="p-4 border border-gray-300 rounded-lg bg-green-50">
                    <h3 class="text-xl font-semibold mb-2 text-green-600">Contact Information</h3>
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="contact">Contact Number</label>
                        <input type="tel" id="contact" name="contact" value="" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="p-4 border border-gray-300 rounded-lg bg-yellow-50">
                    <h3 class="text-xl font-semibold mb-2 text-yellow-600">Assigned Doctor</h3>
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="doctor">Doctor's Name</label>
                        <input type="text" id="doctor" name="doctor" value="" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                    </div>
                </div>
                <div class="p-4 border border-gray-300 rounded-lg bg-pink-50">
                    <h3 class="text-xl font-semibold mb-2 text-pink-600">Assigned Nurse</h3>
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="nurse">Nurse's Name</label>
                        <input type="text" id="nurse" name="nurse" value="" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                    </div>
                </div>
            </div>

            <div class="text-center mt-6">
                <button type="submit" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition">
                    <i class="fas fa-save mr-2"></i> Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection