<nav class="flex justify-between bg-gray-900 text-white w-screen ">
    <div class="px-5 xl:px-12 py-6 flex w-full items-center justify-between">
        <a class="text-3xl font-bold font-heading" href="#">
            <img class="h-12 w-12 rounded-full" alt="logo" src="{{ asset('Images/icon.png') }}">

        </a>
        <!-- Header Icons -->
        <div class="flex items-center space-x-5  ">
            <div class="relative flex justify-center mx-4">
                <a class="flex items-center hover:text-gray-200 cursor-pointer" id="dropdownToggle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </a>

                <!-- Dropdown Menu -->
                <div id="dropdownMenu" class="absolute right-0 mt-8 w-48 bg-white rounded-md shadow-lg z-20 hidden">
                    <div class="py-1">
                        <a href="{{ route('merchant.profile') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                            <i class="mr-2 fas fa-user"></i> Profile
                        </a>
                        <a href="{{ route('login') }}" onclick="return confirm('Are you sure you want to logout?')"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                            <i class="mr-2 fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</nav>
