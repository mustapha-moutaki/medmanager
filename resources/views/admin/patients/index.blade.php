@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
<div class="mb-4 flex space-x-4 justify-between">
    <h2 class="text-xl font-bold mb-4">Patients List</h2>
   
    <form action="#" method="GET" class="flex items-center">
        <select name="gender" class="border border-gray-300 rounded-md p-2">
            <option value="">All Genders</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
    
        <select name="condition" class="border border-gray-300 rounded-md p-2">
            <option value="">All Conditions</option>
            <option value="hypertension">Hypertension</option>
            <option value="diabetes">Diabetes</option>
            <option value="asthma">Asthma</option>
            <!-- Add more conditions as needed -->
        </select>
        
        <button type="submit" class="bg-blue-600 text-white rounded-md py-2 px-4">Filter</button>
    </form>
</div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead>
                <tr class="bg-blue-800 text-white">
                    <th class="py-2 px-4 border-b text-left">Patient Name</th>
                    <th class="py-2 px-4 border-b text-left">Age</th>
                    <th class="py-2 px-4 border-b text-left">Gender</th>
                    <th class="py-2 px-4 border-b text-left">Condition</th>
                    <th class="py-2 px-4 border-b text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b">John Doe</td>
                    <td class="py-2 px-4 border-b">30</td>
                    <td class="py-2 px-4 border-b">Male</td>
                    <td class="py-2 px-4 border-b">Hypertension</td>
                    <td class="py-2 px-4 border-b">
                        <div class="flex justify-start space-x-3">
                            <a href="#" class="text-blue-500 hover:text-blue-700">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="#" class="text-green-500 hover:text-green-700">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="#" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b">Jane Smith</td>
                    <td class="py-2 px-4 border-b">25</td>
                    <td class="py-2 px-4 border-b">Female</td>
                    <td class="py-2 px-4 border-b">Diabetes</td>
                    <td class="py-2 px-4 border-b">
                        <div class="flex justify-start space-x-3">
                            <a href="#" class="text-blue-500 hover:text-blue-700">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="#" class="text-green-500 hover:text-green-700">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="#" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b">Emily Johnson</td>
                    <td class="py-2 px-4 border-b">40</td>
                    <td class="py-2 px-4 border-b">Female</td>
                    <td class="py-2 px-4 border-b">Asthma</td>
                    <td class="py-2 px-4 border-b">
                        <div class="flex justify-start space-x-3">
                            <a href="#" class="text-blue-500 hover:text-blue-700">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="#" class="text-green-500 hover:text-green-700">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="#" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection