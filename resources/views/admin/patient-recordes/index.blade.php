@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Navigation Bar -->
    <nav class="bg-indigo-600 p-4 rounded-lg mb-6">
        <div class="flex justify-between items-center">
            <div class="text-white font-bold text-lg">Patient Management</div>
            <div class="text-white">
                <a href="{{ route('logout') }}" class="text-white hover:underline">Logout</a>
            </div>
        </div>
        <div class="mt-4">
            <ul class="flex space-x-4">
                <li><a href="#" onclick="showSection('create')" class="text-white hover:underline">Create Record</a></li>
                <li><a href="#" onclick="showSection('records')" class="text-white hover:underline">All Records</a></li>
                <li><a href="#" onclick="showForm('settings')" class="text-white hover:underline">Settings</a></li>
            </ul>
        </div>
    </nav>

    <!-- Create Record Section -->
    <div id="create-section" class="mb-6 hidden">
        <h3 class="text-lg font-semibold mb-4">Create New Patient Record</h3>
        <form>
            <div class="mb-4">
                <label class="block text-sm text-gray-500">Patient Name</label>
                <input type="text" class="border rounded-md p-2 w-full" placeholder="Enter patient name">
            </div>
            <div class="mb-4">
                <label class="block text-sm text-gray-500">Date of Birth</label>
                <input type="date" class="border rounded-md p-2 w-full">
            </div>
            <div class="mb-4">
                <label class="block text-sm text-gray-500">Gender</label>
                <select class="border rounded-md p-2 w-full">
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary text-white bg-indigo-600 hover:bg-indigo-700 transition duration-150">Save Record</button>
        </form>
    </div>

    <!-- Search Bar -->
    <div class="mb-4">
        <input type="text" id="search" placeholder="Search Patient Records..." class="border rounded-md p-2 w-full" onkeyup="searchRecords()">
    </div>

    <!-- Patient Records Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-6" id="patient-cards">
        <div class="bg-white shadow-md rounded-lg p-4 flex flex-col items-center">
            <h5 class="font-medium text-lg">John Doe</h5>
            <p class="text-gray-500">Patient Number: 001</p>
            <p class="text-gray-500">Date of Birth: 1985-06-15</p>
            <p class="text-gray-500">Gender: Male</p>
            <div class="mt-4">
                <a href="#" class="text-indigo-600 hover:underline">View</a> |
                <a href="#" class="text-indigo-600 hover:underline">Edit</a> |
                <form action="#" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                </form>
                <button class="text-indigo-600 hover:underline" onclick="downloadPDF('001')">Download PDF</button>
            </div>
        </div>

        <div class="bg-white shadow-md rounded-lg p-4 flex flex-col items-center">
            <h5 class="font-medium text-lg">Jane Smith</h5>
            <p class="text-gray-500">Patient Number: 002</p>
            <p class="text-gray-500">Date of Birth: 1990-03-22</p>
            <p class="text-gray-500">Gender: Female</p>
            <div class="mt-4">
                <a href="#" class="text-indigo-600 hover:underline">View</a> |
                <a href="#" class="text-indigo-600 hover:underline">Edit</a> |
                <form action="#" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                </form>
                <button class="text-indigo-600 hover:underline" onclick="downloadPDF('002')">Download PDF</button>
            </div>
        </div>

        <!-- Add more patient cards as needed -->
    </div>
</div>

<script>
    function showSection(section) {
        document.getElementById('create-section').classList.toggle('hidden', section !== 'create');
        document.getElementById('patient-cards').classList.toggle('hidden', section !== 'records');
    }

    function showForm(formId) {
        document.getElementById('settings-form').classList.toggle('hidden', formId !== 'settings');
    }

    function searchRecords() {
        const input = document.getElementById('search').value.toLowerCase();
        const cards = document.querySelectorAll('#patient-cards > div');

        cards.forEach(card => {
            const name = card.querySelector('h5').textContent.toLowerCase();
            if (name.includes(input)) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    }

    function downloadPDF(patientNumber) {
        alert('Download functionality for patient ' + patientNumber + ' is not implemented yet.'); // Placeholder for actual PDF download logic
    }
</script>

<style>
    body {
        background-image: url('your-background-image-url.jpg'); /* Add your background image here */
        background-size: cover;
        background-position: center;
    }
</style>
@endsection