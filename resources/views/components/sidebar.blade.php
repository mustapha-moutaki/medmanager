<aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-gray-200 shadow-sm hidden md:block lg:block">
    <div class="p-4">
        <div class="flex items-center space-x-2 mb-6">
            <div class="h-10 w-10 rounded-full bg-primary flex items-center justify-center">
                <i class="fas fa-user-md text-white text-sm"></i>
            </div>
            <div>
            <div class="text-sm font-medium text-gray-700">
            {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
        </div>
                <div class="text-xs text-gray-500">Medical Director</div>
            </div>
        </div>
        <!--admin sidebar --start--  -->
      
        <!-- for the admin and reception -->
        <ul class="space-y-1">

              @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('reception'))

            <!-- routeIs :comparing between the routes in url and the section route if they are match giving a class attribute  -->
            <li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'sidebar-active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                    <i class="fas fa-tachometer-alt mr-3 text-primary"></i>
                    Dashboard
                </a>
            </li>
           
            <li class="sidebar-item {{ request()->routeIs('doctors') ? 'sidebar-active' : '' }}">
                <a href="{{ route('doctors') }}" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                    <i class="fas fa-user-md mr-3 text-gray-500"></i>
                    Doctors
                </a>
              
            </li>
          @endif
            @if(auth()->user()->hasRole('doctor') || auth()->user()->hasRole('admin') || auth()->user()->hasRole('reception'))
            <li class="sidebar-item {{ request()->routeIs('patients-list') ? 'sidebar-active' : '' }}">
                <a href="{{ route('patients-list') }}" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                    <i class="fas fa-procedures mr-3 text-gray-500"></i>
                    Patients
                </a>
            </li>
            @endif
            @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('reception'))
            <li class="sidebar-item {{ request()->routeIs('stuffs') ? 'sidebar-active' : '' }}">
                <a href="{{ route('stuffs') }}" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                    <i class="fas fa-user-nurse mr-3 text-gray-500"></i>
                    Staff / Nurses
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('abusinessHour-list') ? 'sidebar-active' : '' }}">
                <a href="{{ route('businessHour-list') }}" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                    <i class="fas fa-calendar-check mr-3 text-gray-500"></i>
                    Appointments
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('medical-records') ? 'sidebar-active' : '' }}">
                <a href="{{route('recordes.index')}}" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                    <i class="fas fa-file-medical mr-3 text-gray-500"></i>
                    Medical Records
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('prescriptions') ? 'sidebar-active' : '' }}">
                <a href="#" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                    <i class="fas fa-pills mr-3 text-gray-500"></i>
                    Prescriptions
                </a>
            </li>
            @if(!auth()->user()->hasRole('admin') || auth()->user()->hasRole('doctor'))
            <li class="sidebar-item {{ request()->routeIs('patientbillingshow') ? 'sidebar-active' : '' }}">
                <a href="{{ route('patientbillingshow') }}" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                    <i class="fas fa-money-bill-wave mr-3 text-gray-500"></i>
                    Billing
                </a>
            </li>
            @endif
            @if(auth()->user()->hasRole('admin'))
            <li class="sidebar-item {{ request()->routeIs('settings') ? 'sidebar-active' : '' }}">
                <a href="#" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                    <i class="fas fa-cog mr-3 text-gray-500"></i>
                    Settings
                </a>
            </li>
            @endif
            @endif
        </ul>
    
        <!-- admin dashboard end -->

        <!-- end doctor and reception dashboard -->
        <!-- @if(auth()->user()->hasRole('doctor'))
        <ul class="space-y-1">
            <li class="sidebar-item {{ request()->routeIs('patient.dashboard') ? 'sidebar-active' : '' }}">
                <a href="#" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                    <i class="fas fa-tachometer-alt mr-3 text-primary"></i>
                    Dashboard
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('diagnosis') ? 'sidebar-active' : '' }}">
                <a href="#" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                    <i class="fas fa-user-md mr-3 text-gray-500"></i>
                    Diagnosis
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('medical-devices') ? 'sidebar-active' : '' }}">
                <a href="#" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                    <i class="fas fa-microscope mr-3 text-gray-500"></i>
                    Medical Devices
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('treatment') ? 'sidebar-active' : '' }}">
                <a href="#" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                    <i class="fas fa-notes-medical mr-3 text-gray-500"></i>
                    Treatment
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('my-schedule') ? 'sidebar-active' : '' }}">
                <a href="#" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                    <i class="fas fa-calendar-alt mr-3 text-gray-500"></i>
                    My Schedule
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('healthcare-visits') ? 'sidebar-active' : '' }}">
                <a href="#" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                    <i class="fas fa-user-injured mr-3 text-gray-500"></i>
                    Healthcare Visits
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('symptoms-chatbot') ? 'sidebar-active' : '' }}">
                <a href="#" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                    <i class="fas fa-comments mr-3 text-gray-500"></i>
                    Symptoms ChatBot
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                    <i class="fas fa-sign-out-alt mr-3 text-gray-500"></i>
                    Logout
                </a>
            </li>
        </ul>
        @endif -->
        <!-- end patient dashboard -->
    </div>
</aside>
