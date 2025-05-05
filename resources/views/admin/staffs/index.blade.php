@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Page Header with Add Nurse Button -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Nursing Staff</h1>
        <a href="{{route('stuff.create')}}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg shadow flex items-center transition duration-300">
            <i class="fas fa-user-plus mr-2"></i>
            Add New Nurse
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Nurse Card 1 - Redesigned -->
        @if($staffs && $staffs->count() > 0)
        @foreach($staffs as $staff)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition duration-300">
            <div class="bg-gradient-to-r from-blue-500 to-blue-700 p-4">
                <div class="flex justify-between items-start">
                    <div class="flex items-center">
                        <div class="bg-white p-2 rounded-full mr-3">
                            <i class="fas fa-user-nurse text-blue-600 text-lg"></i>
                        </div>
                       
                        <h2 class="text-lg font-bold text-white">
                         @if($staff ->role =='Nurse')
                         Nurse {{$staff ->user->first_name}}
                         @elseif($staff ->role =='Receptionist')
                         Reception {{$staff->user->first_name}}
                         @elseif ($staff ->role =='Technician')
                         Technician {{$staff->user->first_name}}
                         @else
                         Other {{$staff->first_name}}
                        @endif
                        </h2>
                    </div>
                    <span class="bg-blue-200 text-blue-800 text-xs font-bold px-2 py-1 rounded-full">{{$staff->specialist}}</span>
                </div>
            </div>
            
            <div class="p-5">
                <div class="flex items-center mb-4">
                    <img src="
                        @if($staff->role == 'Nurse' && $staff->user->gender == 'male')
                        https://i.pinimg.com/736x/a4/f5/2e/a4f52e9a492142061623230867cca043.jpg
                          
                        @elseif($staff->role == 'Nurse')
                              https://i.pinimg.com/736x/cd/b3/97/cdb397bf1f0fb0e879e1db2379534379.jpg
                        @elseif($staff->role == 'Receptionist')
                            https://i.pinimg.com/736x/dc/67/e8/dc67e889275e50a3f8b4348b291db2dc.jpg
                        @elseif($staff->role == 'Technician')
                            https://i.pinimg.com/736x/a4/20/b4/a420b4500cbc95c274df0a059be7093f.jpg
                        @else
                            /images/default.jpg
                        @endif
                    " alt="Staff Image" class="w-20 h-20 rounded-full object-contain border-2 border-blue-500 mr-4">
                    <div>
                        <div class="flex items-center mb-1">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <p class="text-sm text-gray-600">
                                {{$staff->years_of_experience ? $staff->years_of_experience . ' Years Experience' : 'Not available'}}</p>
                        </div>
                        <div class="flex items-center">    
                            @if($staff->role =='Nurse')
                            <i class="fas fa-users text-blue-500 mr-1"></i>
                            <p class="text-sm text-gray-600">123+ patient</p>
                            @else
                            <i class="fas fa-phone text-blue-500 mr-1"></i>
                            <p class="text-sm text-gray-600">{{ $staff->emergency_contact_phone}}</p>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="border-t border-gray-200 pt-4">
                    <p class="text-sm text-gray-600 mb-4">
                        {{$staff ->user->bio ? $staff ->user->bio : 'not available'}}
                    </p>
                    
                    <div class="flex justify-between items-center">
                        <div class="flex space-x-2">
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">{{ $staff->shift_preference}}</span>
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">{{ $staff->employment_status}}</span>
                        </div>
                        
                        <div class="flex space-x-3">
                            <a href="{{route('stuff.show', ['id' =>$staff->id])}}" class="text-blue-500 hover:text-blue-700 transition duration-200">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('stuff.edit', $staff->id) }}" class="text-blue-500 hover:text-blue-700 transition duration-200">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{route('stuff.delete', ['id' =>$staff->id])}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this staff?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 transition duration-200">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="col-span-1 sm:col-span-2 lg:col-span-3 bg-gray-100 text-center p-5 rounded-lg border border-gray-300">
            <p class="text-lg text-gray-600">No nurse available or other staff found</p>
        </div>
        @endif
    </div>
</div>
@endsection