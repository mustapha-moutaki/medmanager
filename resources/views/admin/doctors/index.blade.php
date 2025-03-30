@extends('layouts.app')

@section('content')
<div class="container max-content px-4 py-1">
    {{-- Flash Messages --}}
    <div class="mb-2" id="flash-message" style="transition: all 0.3s ease;">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                {{ session('success') }} {{-- Example: 'Deleted successfully' --}}
            </div>
        @endif
        
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                {{ session('error') }} {{-- Example: 'Error deleting. Please try again.' --}}
            </div>
        @endif
    </div>
</div>


<div class="container mx-auto px-4 py-8">
    <!-- Add Doctor Button -->
    <div class="mb-6 flex justify-end">
        <a href="{{route('create.doctor')}}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg shadow flex items-center transition duration-300">
            <i class="fas fa-user-plus mr-2"></i>
            Add New Doctor
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @if($doctors && $doctors->count() > 0)
        @foreach($doctors as $doctor)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-blue-800 p-3 flex items-center">
                <i class="fas fa-user-md text-white text-xl mr-2"></i>
                <h2 class="text-sm font-bold text-white">Specialist Profile</h2>
            </div>
        
            <div class="p-4 text-center">
                <div class="mb-3">
                @if($doctor->user->gender == 'male')
    <img src="{{ $doctor->user->profile_image ? $doctor->user->profile_image : 'https://i.pinimg.com/736x/a4/65/fa/a465facd516872128b2129177ca4c354.jpg' }}" 
         alt="Dr. {{ $doctor->user->first_name }} {{ $doctor->user->last_name }}" 
         class="w-24 h-24 rounded-full mx-auto object-cover border-2 border-blue-500">
@else
    <img src="{{ $doctor->user->profile_image ? $doctor->user->profile_image : 'https://i.pinimg.com/736x/41/bd/fc/41bdfcf77b854da843f843ccf594b3cf.jpg' }}" 
         alt="Dr. {{ $doctor->user->first_name }} {{ $doctor->user->last_name }}" 
         class="w-24 h-24 rounded-full mx-auto object-cover border-2 border-blue-500">
@endif

                </div>
                
                <h3 class="text-lg font-semibold text-gray-800 mb-1">
                    Dr. {{ $doctor->user->first_name }} {{ $doctor->user->last_name }}
                </h3>
                
                <div class="flex justify-center items-center mb-3">
                    <i class="fas fa-stethoscope text-blue-500 mr-1"></i>
                    <p class="text-sm text-gray-600">{{ $doctor->specialist }}</p>
                   
                    @if($doctor->pediatrics)
                    <i class="fas fa-baby text-pink-500 mr-1"></i>
                        <i class="fas fa-brain text-green-500 mr-1"></i>
                    @endif
                </div>
                
                <div class="grid grid-cols-2 gap-2 mt-3">
                    <div class="bg-blue-50 p-2 rounded-lg">
                        <h4 class="text-xs text-gray-500">Experience</h4>
                        <p class="text-sm font-bold text-blue-800">{{ $doctor->yearsOfExperience }} Years</p>
                    </div>
                    
                    <div class="bg-blue-50 p-2 rounded-lg">
                        <h4 class="text-xs text-gray-500">Patients</h4>
                        <p class="text-sm font-bold text-blue-800">5,420+</p>
                    </div>
                </div>
                
                <div class="mt-3 flex justify-center space-x-3">
                    <a href="{{ route('admin.doctors.show', ['id' => $doctor->id]) }}" class="text-blue-500 hover:text-blue-700">
                        <i class="fas fa-eye text-lg"></i>
                    </a>
                    <a href="{{ route('doctor.edit', ['id'=>$doctor->id])}}" class="text-green-500 hover:text-green-700">
                        <i class="fas fa-edit text-lg"></i>
                    </a>
                    <form action="{{ route('doctor.destroy', ['id' => $doctor->id]) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this doctor?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700">
                        <i class="fas fa-trash text-lg"></i>
                    </button>
                </form>

                    
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="col-span-1 sm:col-span-2 lg:col-span-3 bg-gray-100 text-center p-5 rounded-lg border border-gray-300">
            <p class="text-lg text-gray-600">No doctors available</p>
        </div>
        @endif
    </div>
</div>
@endsection