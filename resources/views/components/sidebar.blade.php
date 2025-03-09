<aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-gray-200 shadow-sm hidden md:block lg:block">
                <div class="p-4">
                    <div class="flex items-center space-x-2 mb-6">
                        <div class="h-10 w-10 rounded-full bg-primary flex items-center justify-center">
                            <i class="fas fa-user-md text-white text-sm"></i>
                        </div>
                        <div>
                            <div class="text-sm font-medium text-gray-700">Dr. Smith</div>
                            <div class="text-xs text-gray-500">Medical Director</div>
                        </div>
                    </div>
                    <!-- for the admin and reception -->
                    <ul class="space-y-1">
                        <li class="sidebar-item sidebar-active">
                            <a href="#" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                                <i class="fas fa-tachometer-alt mr-3 text-primary"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('doctors') }}" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                                <i class="fas fa-user-md mr-3 text-gray-500"></i>
                                Doctors
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('patients-list') }}" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                                <i class="fas fa-procedures mr-3 text-gray-500"></i>
                                Patients
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="appointments-list" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                                <i class="fas fa-calendar-check mr-3 text-gray-500"></i>
                                Appointments
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                                <i class="fas fa-file-medical mr-3 text-gray-500"></i>
                                Medical Records
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                                <i class="fas fa-pills mr-3 text-gray-500"></i>
                                Prescriptions
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="patientbillingshow" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                                <i class="fas fa-money-bill-wave mr-3 text-gray-500"></i>
                                Billing
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                                <i class="fas fa-cog mr-3 text-gray-500"></i>
                                Settings
                            </a>
                        </li>
                    </ul>
                    <!-- end doctor and reception dashboard -->



                    <!-- patient dashboard -->
                    <ul class="space-y-1">
                        <li class="sidebar-item sidebar-active">
                            <a href="#" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                                <i class="fas fa-tachometer-alt mr-3 text-primary"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                                <i class="fas fa-user-md mr-3 text-gray-500"></i>
                                Diagnosis
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                                <i class="fas fa-microscope mr-3 text-gray-500"></i>
                                Medical Devices
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                                <i class="fas fa-notes-medical mr-3 text-gray-500"></i>
                                Treatment
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                                <i class="fas fa-calendar-alt mr-3 text-gray-500"></i>
                                My Schedule
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium">
                                <i class="fas fa-user-injured mr-3 text-gray-500"></i>
                                Healthcare Visits
                            </a>
                        </li>
                        <li class="sidebar-item">
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
                    <!--  end patient dashboard -->
                </div>
            </aside>