<header class="bg-primary shadow-md">
            <div class="flex justify-between items-center py-3 px-6">
                <div class="flex items-center space-x-3">
                    <!-- <i class="fas fa-bars text-white cursor-pointer" onclick="sidebarToggle()"></i> -->
                    <div class="flex items-center">
                        <i class="fas fa-heartbeat text-white text-2xl mr-2"></i>
                        <h1 class="text-white font-semibold text-xl">MedManager</h1>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative hidden md:block">
                        <input type="text" placeholder="Search..." class="px-4 py-2 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 w-64">
                        <i class="fas fa-search absolute right-3 top-2.5 text-gray-400"></i>
                    </div>
                    <div class="relative">
                        <i class="fas fa-bell text-white text-xl cursor-pointer"></i>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
                    </div>
                    <div class="relative">
                        <img onclick="profileToggle()" class="h-10 w-10 rounded-full object-cover border-2 border-blue-400 cursor-pointer" src="https://avatars0.githubusercontent.com/u/4323180?s=460&v=4" alt="">
                        <div id="ProfileDropDown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                            <div class="py-1">
                                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">My account</a>
                                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Notifications</a>
                                <div class="border-t border-gray-200"></div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full py-3 px-4 bg-red-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>