@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-4 flex space-x-4 justify-between items-center">
        <h2 class="text-xl font-bold text-gray-800">Patients List</h2>
        <div class="flex items-center space-x-4">
        @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('reception'))
            <a href="{{ route('patient.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg shadow flex items-center transition duration-300">
                <i class="fas fa-user-plus mr-2"></i>
                Add New Patient
            </a>
    @endif
                <form id="filterForm" class="flex items-center space-x-2">
                <input type="text" id="searchInput" placeholder="Search by name" class="border border-gray-300 rounded-md p-1 text-sm" />
                    <select id="genderFilter" name="gender" class="border border-gray-300 rounded-md p-1 text-sm">
                        <option value="">All Genders</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <button type="button" id="filterButton" class="bg-blue-600 text-white rounded-md py-1 px-3 text-sm">Filter</button>
                  
                    
                </form>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md text-sm">
            <thead>
                <tr class="bg-blue-800 text-white">
                    <th class="py-2 px-3 border-b text-left">Profile Picture</th>
                    <th class="py-2 px-3 border-b text-left">Patient Name</th>
                    <th class="py-2 px-3 border-b text-left">Age</th>
                    <th class="py-2 px-3 border-b text-left">Gender</th>
                    <th class="py-2 px-3 border-b text-left">Contact Number</th>
                    <th class="py-2 px-3 border-b text-left">Email</th>
                    <th class="py-2 px-3 border-b text-left">Address</th>
                    <th class="py-2 px-3 border-b text-left">Birth Date</th>
                    <th class="py-2 px-3 border-b text-left">Doctor Name</th>
                    <th class="py-2 px-3 border-b text-left">Actions</th>
                </tr>
            </thead>
            <tbody id="patientTable">
                @foreach($patients as $patient)
                    <tr class="patient-row hover:bg-gray-100" data-gender="{{ $patient->user->gender }}">
                        <td class="py-1 px-2 border-b">
                            <img src="{{ $patient->user->profile_photo ? asset('storage/' . $patient->user->profile_photo) : 'https://i.pinimg.com/736x/82/ec/e8/82ece8cf2e8594aaffc5da278aaaf505.jpg' }}" alt="Profile Picture" class="w-8 h-8 rounded-full">
                        </td>
                        <td class="py-1 px-2 border-b">{{ $patient->user->first_name }} {{ $patient->user->last_name }}</td>
                        <td class="py-1 px-2 border-b">{{ \Carbon\Carbon::parse($patient->user->birth_date)->age }}</td>
                        <td class="py-1 px-2 border-b">{{ ucfirst($patient->user->gender) }}</td>
                        <td class="py-1 px-2 border-b">{{ $patient->user->phone }}</td>
                        <td class="py-1 px-2 border-b">{{ $patient->user->email }}</td>
                        <td class="py-1 px-2 border-b">{{ $patient->user->address }}</td>
                        <td class="py-1 px-2 border-b">{{ \Carbon\Carbon::parse($patient->user->birth_date)->format('Y-m-d') }}</td>
                        <td class="py-1 px-2 border-b">
                            {{ $patient->doctor ? $patient->doctor->user->first_name . ' ' . $patient->doctor->user->last_name : 'No Doctor Assigned' }}
                        </td>
                        <td class="py-1 px-2 border-b">
                            <div class="flex justify-start space-x-2">
                                <a href="{{ route('patient.show' ,$patient->id)}}" class="text-blue-500 hover:text-blue-700">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{route('patient.edit', $patient->id)}}" class="text-green-500 hover:text-green-700">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{route('patient.delete', $patient->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this patient?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
       
        function filterPatients() {
            const gender = $('#genderFilter').val().toLowerCase();
            const search = $('#searchInput').val().toLowerCase();

           
            $('.patient-row').each(function() {
                const patientName = $(this).find('td').eq(1).text().toLowerCase();
                const patientGender = $(this).data('gender').toLowerCase();

               
                if (patientName.includes(search) && (gender === '' || patientGender === gender)) {
                    // the admin and receptionest also can filter by name and gender in the same time
                    $(this).show();  
                } else {
                    $(this).hide();
                }
            });
        }

        // the function of filtration work on real time
        $('#searchInput').on('keyup', function() {
            filterPatients();
        });

        // Trigger filter when the filter button is clicked
        $('#filterButton').click(function() {
            filterPatients();
        });
        
        filterPatients();
    });
</script>
@endsection
