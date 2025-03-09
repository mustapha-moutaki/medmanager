@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

<!-- Chills -->
<div class="bg-white p-6 rounded-lg shadow-md flex items-center">
    <i class="fas fa-snowflake text-blue-500 text-4xl"></i>
    <div class="ml-4">
        <h2 class="text-lg font-semibold">Chills</h2>
        <p class="text-2xl font-bold">False</p>
        <p class="text-gray-500">Safe: False</p>
    </div>
</div>

<!-- Diastole BP -->
<div class="bg-white p-6 rounded-lg shadow-md flex items-center">
    <i class="fas fa-heartbeat text-green-500 text-4xl"></i>
    <div class="ml-4">
        <h2 class="text-lg font-semibold">Diastole BP</h2>
        <p class="text-2xl font-bold">75</p>
        <p class="text-gray-500">Safe [60 - 80 mm Hg]</p>
    </div>
</div>

<!-- Systole BP -->
<div class="bg-white p-6 rounded-lg shadow-md flex items-center">
    <i class="fas fa-heart text-red-500 text-4xl"></i>
    <div class="ml-4">
        <h2 class="text-lg font-semibold">Systole BP</h2>
        <p class="text-2xl font-bold">91</p>
        <p class="text-gray-500">Safe [90 - 120 mm Hg]</p>
    </div>
</div>

<!-- Heart Rate -->
<div class="bg-white p-6 rounded-lg shadow-md flex items-center">
    <i class="fas fa-heart text-red-500 text-4xl"></i>
    <div class="ml-4">
        <h2 class="text-lg font-semibold">Heart Rate</h2>
        <p class="text-2xl font-bold">69</p>
        <p class="text-gray-500">Safe [60 to 100 beats]</p>
    </div>
</div>

<!-- Respiration Rate -->
<div class="bg-white p-6 rounded-lg shadow-md flex items-center">
    <i class="fas fa-lungs text-green-500 text-4xl"></i>
    <div class="ml-4">
        <h2 class="text-lg font-semibold">Respiration Rate</h2>
        <p class="text-2xl font-bold">14</p>
        <p class="text-gray-500">Safe [12 to 16 breaths/min]</p>
    </div>
</div>

<!-- SpO2 -->
<div class="bg-white p-6 rounded-lg shadow-md flex items-center">
    <i class="fas fa-tint text-blue-500 text-4xl"></i>
    <div class="ml-4">
        <h2 class="text-lg font-semibold">SpO2</h2>
        <p class="text-2xl font-bold">98%</p>
        <p class="text-gray-500">Range [95% or higher]</p>
    </div>
</div>

<!-- Blood Group -->
<div class="bg-white p-6 rounded-lg shadow-md flex items-center">
    <i class="fas fa-tint text-red-500 text-4xl"></i>
    <div class="ml-4">
        <h2 class="text-lg font-semibold">Blood Group</h2>
        <p class="text-2xl font-bold">jhffg</p>
    </div>
</div>

<!-- Temperature -->
<div class="bg-white p-6 rounded-lg shadow-md flex items-center">
    <i class="fas fa-thermometer-half text-orange-500 text-4xl"></i>
    <div class="ml-4">
        <h2 class="text-lg font-semibold">Temperature</h2>
        <p class="text-2xl font-bold">95°F</p>
        <p class="text-gray-500">Range [97°F to 99°F]</p>
    </div>
</div>

<!-- Ambulation -->
<div class="bg-white p-6 rounded-lg shadow-md flex items-center">
    <i class="fas fa-walking text-gray-500 text-4xl"></i>
    <div class="ml-4">
        <h2 class="text-lg font-semibold">Ambulation</h2>
        <p class="text-2xl font-bold">False</p>
        <p class="text-gray-500">Values possible: True/False</p>
    </div>
</div>

<!-- Fever History -->
<div class="bg-white p-6 rounded-lg shadow-md flex items-center">
    <i class="fas fa-file-medical text-yellow-500 text-4xl"></i>
    <div class="ml-4">
        <h2 class="text-lg font-semibold">Fever History</h2>
        <p class="text-2xl font-bold">Never</p>
        <p class="text-gray-500">Values possible: Yes/No/Other</p>
    </div>
</div>

<!-- BMI -->
<div class="bg-white p-6 rounded-lg shadow-md flex items-center">
    <i class="fas fa-weight text-purple-500 text-4xl"></i>
    <div class="ml-4">
        <h2 class="text-lg font-semibold">BMI</h2>
        <p class="text-2xl font-bold">18.5</p>
        <p class="text-gray-500">Range [18.5 to 24.9]</p>
    </div>
</div>

<!-- FiO2 -->
<div class="bg-white p-6 rounded-lg shadow-md flex items-center">
    <i class="fas fa-lungs text-green-500 text-4xl"></i>
    <div class="ml-4">
        <h2 class="text-lg font-semibold">FiO2</h2>
        <p class="text-2xl font-bold">66</p>
        <p class="text-gray-500">Range [50 to 100]</p>
    </div>
</div>

</div>

<div class="treatment dashboard p-6 bg-gray-100 min-h-screen">
    <div class="treat-list box bg-white shadow-lg rounded-lg p-4">
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200 shadow-md">
                <thead>
                    <tr class="bg-blue-800 text-white text-left">
                        <th class="p-3 border border-gray-300">Date</th>
                        <th class="p-3 border border-gray-300">Doctor</th>
                        <th class="p-3 border border-gray-300">Category</th>
                        <th class="p-3 border border-gray-300">Medical Description</th>
                        <th class="p-3 border border-gray-300">Status</th>
                        <th class="p-3 border border-gray-300">Report</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <tr class="border border-gray-200 hover:bg-gray-100">
                        <td class="p-3 border border-gray-300">2022-09-29</td>
                        <td class="p-3 border border-gray-300">Dr. Vignesh Kumar</td>
                        <td class="p-3 border border-gray-300">Orthopedic</td>
                        <td class="p-3 border border-gray-300">Arthroscopy, right knee, with partial medial meniscectomy and partial lateral meniscectomy</td>
                        <td class="p-3 border border-gray-300 text-green-600 font-semibold">Updated</td>
                        <td class="p-3 border border-gray-300">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Download</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
    </div>
    

<div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
    <div class="mb-2 border-solid border-blue-300 rounded border shadow-sm w-full">
        <div class="bg-blue-800 text-white px-2 py-3 border-solid border-blue-900 border-b">
            <h2 class="text-lg font-semibold">Appointment Form</h2>
        </div>
        <div class="p-3">
            <form class="w-full">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-blue-700 text-sm font-semibold mb-1"
                               for="grid-first-name">
                            First Name
                        </label>
                        <input class="appearance-none block w-full bg-blue-100 text-gray-700 border border-blue-800 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-blue-800"
                               id="grid-first-name" type="text" placeholder="Jane" required>
                        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-blue-700 text-sm font-semibold mb-1"
                               for="grid-last-name">
                            Last Name
                        </label>
                        <input class="appearance-none block w-full bg-blue-100 text-gray-700 border border-blue-800 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-800"
                               id="grid-last-name" type="text" placeholder="Doe">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-blue-700 text-sm font-semibold mb-1"
                               for="grid-password">
                            Password
                        </label>
                        <input class="appearance-none block w-full bg-blue-100 text-gray-700 border border-blue-800 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-blue-600"
                               id="grid-password" type="password" placeholder="******************">
                        <p class="text-gray-700 text-xs italic">Make it as long and as crazy as you'd like</p>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-blue-700 text-sm font-semibold mb-1"
                               for="grid-city">
                            City
                        </label>
                        <input class="appearance-none block w-full bg-blue-100 text-gray-700 border border-blue-800 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-600"
                               id="grid-city" type="text" placeholder="Albuquerque">
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-blue-700 text-sm font-semibold mb-1"
                               for="grid-state">
                            State
                        </label>
                        <div class="relative">
                            <select class="block appearance-none w-full bg-blue-100 border border-blue-800 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-blue-600"
                                    id="grid-state">
                                <option>New Mexico</option>
                                <option>Missouri</option>
                                <option>Texas</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                  
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-blue-700 text-sm font-semibold mb-1"
                           for="emergency-type">
                        Type of Emergency
                    </label>
                    <select class="block appearance-none w-full bg-blue-100 border border-blue-800 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-blue-600"
                            id="emergency-type">
                        <option>None</option>
                        <option>Urgent Care</option>
                        <option>Life-threatening</option>
                        <option>Non-urgent</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

        </div>
    </div>
</div>

@endsection