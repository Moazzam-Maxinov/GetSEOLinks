<nav class="bg-white border-gray-200 dark:bg-gray-900 border-b-2">
    <div class="container mx-auto px-6 lg:px-10 py-6 flex flex-wrap items-center justify-between">
        <a href="/" class="flex items-center space-x-1 rtl:space-x-reverse">
            <x-lucide-link class="w-7 h-7 text-primary" />
            <h6 class="text-3xl font-semibold whitespace-nowrap text-primary-dark dark:text-white">GetSEOLinks</h6>
        </a>
        <div class="flex md:hidden items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            {{-- <button type="button"
                class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                data-dropdown-placement="bottom-end">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="/images/user.svg" alt="user photo">
            </button>
            <!-- User Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600 border-2 w-48"
                id="user-dropdown">
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="flex items-center px-4 py-2 text-base text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            <x-lucide-house class="w-4 h-4 mr-2 text-gray-500" />
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center px-4 py-2 text-base text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            <x-lucide-contact class="w-4 h-4 mr-2 text-gray-500" />
                            Profile
                        </a>
                    </li>
                    <li class="divide-y divide-gray-100">
                        <a href="#"
                            class="flex items-center px-4 py-2 text-base text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            <x-lucide-wallet class="w-4 h-4 mr-2 text-gray-500" />
                            Wallet
                        </a>
                    </li>
                </ul>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" onclick="event.preventDefault(); this.closest('form').submit();"
                                class="flex items-center w-full px-4 py-2 text-base text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                <x-lucide-log-out class="w-4 h-4 mr-3 text-gray-500" />
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </li>
                </ul>
            </div> --}}
            <button data-collapse-toggle="navbar-user" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto" id="navbar-user">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="/"
                        class="block py-2 px-3 md:p-0 text-primary-dark hover:text-primary"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 md:p-0 text-primary-dark hover:text-primary"
                        aria-current="page">Link Insertions</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 md:p-0 text-primary-dark hover:text-primary"
                        aria-current="page">Guest Posts</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 md:p-0 text-primary-dark hover:text-primary"
                        aria-current="page">Packages</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 md:p-0 text-primary-dark hover:text-primary"
                        aria-current="page">About</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 md:p-0 text-primary-dark hover:text-primary"
                        aria-current="page">Contact</a>
                </li>
            </ul>
            <div class="mt-4 flex flex-col md:hidden gap-y-3">
                <a href="/register" class="bg-primary hover:bg-primary-dark text-white text-base font-medium py-2 px-6 border-2 border-primary hover:border-primary-dark rounded-lg transition duration-300 inline-flex justify-center items-center gap-2">
                    Create Account
                </a>
                <a href="/login" class="bg-transparent hover:bg-primary-dark text-primary-dark hover:text-white text-base font-medium py-2 px-6 border-2 border-primary-dark rounded-lg transition duration-300 inline-flex justify-center items-center gap-2">
                    Login
                </a>
    
            </div>
        </div>
        <div class="hidden md:flex items-center gap-x-3">
            <a href="/login" class="bg-primary hover:bg-primary-dark text-white text-base font-medium py-2 px-6 border-2 border-primary hover:border-primary-dark rounded-lg transition duration-300 inline-flex justify-center items-center gap-2">
                Login
            </a>
            <a href="/register" class="bg-transparent hover:bg-primary-dark text-primary-dark hover:text-white text-base font-medium py-2 px-6 border-2 border-primary-dark rounded-lg transition duration-300 inline-flex justify-center items-center gap-2">
                Sign Up
            </a>

        </div>
    </div>
</nav>
